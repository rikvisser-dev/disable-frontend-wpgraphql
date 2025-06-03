<?php
class settings
{
    private $DFWPG_settings;

    public function __construct()
    {
        $this->DFWPG_settings = get_option('DFWPG_settings', array());
        
    }

    /**
     * Initialize the settings
     */
    public function settings_init()
    {
        // Register settings
        register_setting('DFWPG_settings_group', 'DFWPG_settings');

        // Add settings section
        add_settings_section(
            'DFWPG_main_section',
            __('Main Settings', 'DFWPG'),
            array($this, 'main_section_callback'),
            'DFWPG_settings'
        );

        // Add settings fields
        add_settings_field(
            'DFWPG_enable_frontend',
            __('Enable Frontend', 'DFWPG'),
            array($this, 'enable_frontend_callback'),
            'DFWPG_settings',
            'DFWPG_main_section'
        );

        add_settings_field(
            'DFWPG_redirect_url',
            __('Redirect URL', 'DFWPG'),
            array($this, 'redirect_url_callback'),
            'DFWPG_settings',
            'DFWPG_main_section'
        );

        add_settings_field(
            'DFWPG_redirect_status',
            __('Redirect Status', 'DFWPG'),
            array($this, 'redirect_status_callback'),
            'DFWPG_settings',
            'DFWPG_main_section'
        );
    }


    /**
     * Callback for main section
     */
    public function main_section_callback()
    {
        echo '<p>' . __('Configure the settings for the Disable Frontend for WPGraphQL plugin.', 'DFWPG') . '</p>';
    }

    /**
     * Render redirect URL field
     */
    public function redirect_url_callback()
    {
        $redirect_url = isset($this->DFWPG_settings['redirect_url']) ? esc_url($this->DFWPG_settings['redirect_url']) : '';
        echo '<input type="text" id="DFWPG_redirect_url" name="DFWPG_settings[redirect_url]" value="' . $redirect_url . '" class="regular-text" />';
        echo '<p class="description">' . __('Enter the URL to redirect non-GraphQL requests.', 'DFWPG') . '</p>';
    }

    /**
     * Render enable frontend field
     */
    public function enable_frontend_callback()
    {
        $enable_frontend = isset($this->DFWPG_settings['enable_frontend']) ? (bool) $this->DFWPG_settings['enable_frontend'] : false;
        echo '<input type="checkbox" id="DFWPG_enable_frontend" name="DFWPG_settings[enable_frontend]" value="1"' . checked($enable_frontend, true, false) . ' />';
        echo '<label for="DFWPG_enable_frontend">' . __('Enable Frontend', 'DFWPG') . '</label>';
        echo '<p class="description">' . __('Check this box to enable the frontend for non-GraphQL requests.', 'DFWPG') . '</p>';
    }

    /**
     * Render redirect status field
     */
    public function redirect_status_callback()
    {
        $redirect_status = isset($this->DFWPG_settings['redirect_status']) ? esc_attr($this->DFWPG_settings['redirect_status']) : '302';
        echo '<select id="DFWPG_redirect_status" name="DFWPG_settings[redirect_status]">';
        echo '<option value="301"' . selected($redirect_status, '301', false) . '>301 Moved Permanently</option>';
        echo '<option value="302"' . selected($redirect_status, '302', false) . '>302 Found</option>';
        echo '</select>';
        echo '<p class="description">' . __('Select the HTTP status code for the redirect.', 'DFWPG') . '</p>';
    }

    /**
     * Register admin menu and settings
     */
    public function register_admin_menu()
    {
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'settings_init'));
    }

    /**
     * Add admin menu items
     */
    public function add_admin_menu()
    {
        add_options_page(
            __('Disable Frontend for WPGraphQL', 'DFWPG'),
            __('DFWPG Settings', 'DFWPG'),
            'manage_options',
            'DFWPG_settings', // This should match the page slug used in main.php
            array($this, 'settings_page')
        );
    }

    /**
     * Render the settings page
     */
    public function settings_page()
    {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Disable Frontend for WPGraphQL Settings', 'DFWPG'); ?></h1>
            <form action="options.php" method="post">
                <?php
                settings_fields('DFWPG_settings_group');
                do_settings_sections('DFWPG_settings');
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

}

