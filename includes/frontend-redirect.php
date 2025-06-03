<?php

class frontend_disable_redirect
{
    public function __construct()
    {
        add_action('template_redirect', array($this, 'redirect_non_graphql_requests'));
    }

    public function frontend_redirect()
    {
        // Get the settings
        $settings = get_option('DFWPG_settings', array());
        $redirect_url = isset($settings['redirect_url']) ? esc_url($settings['redirect_url']) : home_url();
        $redirect_status = isset($settings['redirect_status']) ? intval($settings['redirect_status']) : 302;

        // Redirect to the specified URL
        wp_redirect($redirect_url, $redirect_status);
        exit;
    }

    public function redirect_non_graphql_requests()
    {
        // Don't redirect if we're in admin, doing AJAX, or if it's a cron job
        if (is_admin() || wp_doing_ajax() || wp_doing_cron()) {
            return;
        }

        // Get the settings
        $settings = get_option('DFWPG_settings', array());
        $enable_frontend = isset($settings['enable_frontend']) ? (bool) $settings['enable_frontend'] : false;
        
        // If frontend is enabled, don't redirect
        if ($enable_frontend) {
            return;
        }

        // Check if this is a GraphQL request
        $is_graphql_request = false;
        
        // Check for WPGraphQL endpoint
        if (class_exists('WPGraphQL')) {
            $graphql_endpoint = get_option('graphql_endpoint', 'graphql');
            $request_uri = trim($_SERVER['REQUEST_URI'], '/');
            if (strpos($request_uri, $graphql_endpoint) === 0) {
                $is_graphql_request = true;
            }
        }
        
        // Also check for GraphQL in the request (POST with query parameter)
        if (!$is_graphql_request && $_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = file_get_contents('php://input');
            if (strpos($input, 'query') !== false || strpos($input, 'mutation') !== false) {
                $is_graphql_request = true;
            }
        }

        // If this is not a GraphQL request, redirect
        if (!$is_graphql_request) {
            $this->frontend_redirect();
        }
    }
}

