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
        load_plugin_textdomain('DFWPG', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    public function register_settings()
    {
        // Include settings class only once
        static $settings_loaded = false;
        if (!$settings_loaded) {
            require_once plugin_dir_path(__FILE__) . 'settings.php';
            $settings_loaded = true;
        }
        
        // Instantiate and initialize settings
        $settings = new settings();
        $settings->register_admin_menu();
        
        // Include and initialize frontend redirect functionality
        require_once plugin_dir_path(__FILE__) . 'frontend-redirect.php';
        new frontend_disable_redirect();
    }
    
    public function add_settings_link($links)
    {
        $settings_link = '<a href="' . admin_url('options-general.php?page=DFWPG_settings') . '">' . __('Settings', 'DFWPG') . '</a>';
        array_unshift($links, $settings_link);
        return $links;
    }
}

