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
        load_plugin_textdomain('DFWPG', false, dirname(plugin_basename(__FILE__)) . '/languages');
    }

    public function register_settings()
    {
        // Include settings class
        require_once plugin_dir_path(__FILE__) . 'includes/settings.php';
    }

    public function add_setting_link()
    {
        $settings_link = '<a href="' . admin_url('options-general.php?page=DFWPG_settings') . '">' . __('Settings', 'DFWPG') . '</a>';
        $actions = array(
            'settings' => $settings_link,
        );
        return $actions;
    }
}

// Initialize the main class
$DFWPG_main = new main();

