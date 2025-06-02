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

        // Dont't redirect if the request is for the GraphQL endpoint
        if (!defined('GRAPHQL_NAMESPACE') || !preg_match('/^\/' . GRAPHQL_NAMESPACE . '/', $_SERVER['REQUEST_URI'])) {
            // If the request is not for the GraphQL endpoint, redirect to the specified URL
            $this->frontend_redirect();
        } else {
            // If the request is for the GraphQL endpoint, do nothing
            return;
        }

    }
}

