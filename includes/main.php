<?php

class main
{
    private $plugin_file;
    
    public function __construct($plugin_file = '')
    {
        $this->plugin_file = $plugin_file;
        add_action('init', array($this, 'init'));
        
        // Initialize settings early
        $this->register_settings();
        
        // Only add the settings link if we have the plugin file path
        if (!empty($this->plugin_file)) {
            add_filter('plugin_action_links_' . plugin_basename($this->plugin_file), array($this, 'add_settings_link'));
        }
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

    }
}

