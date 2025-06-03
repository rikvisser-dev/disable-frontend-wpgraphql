<?php

class main
{
    public function __construct()
    {
        add_action('init', array($this, 'init'));
        add_action('admin_init', array($this, 'register_settings'));
        add_filter('plugin_action_links_' . plugin_basename(__FILE__), array($this, 'add_setting_link'));
    }

    /**
     * Initialize the plugin
     */
    public function init()
    {
        // Load plugin text domain
        load_plugin_textdomain('DFWPG', false, DFWPG_DOMAIN_PATH);
    }

    public function register_settings()
    {
        // Include settings class
        require_once plugin_dir_path(__FILE__) . 'settings.php';
        
        // Instantiate and initialize settings
        $settings = new settings();
        $settings->register_admin_menu();
        
        // Include and initialize frontend redirect functionality
        require_once plugin_dir_path(__FILE__) . 'frontend-redirect.php';
        new frontend_disable_redirect();
    }

    public function add_setting_link($links)
    {
        $settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=DFWPG_settings')) . '">' . esc_html__('Settings', 'DFWPG') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}

// Initialize the main class
$DFWPG_main = new main();

