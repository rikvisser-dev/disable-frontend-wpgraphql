<?php
/**
 * Plugin Name: Disable Frontend for WPGraphQL
 * Description: Disables the frontend for WPGraphQL, allowing only GraphQL requests. All other request will redirect to the real (decoupled) homepage.
 * Version: 1.0.0
 * Author: Rik Visser
 * Author URI: https://sonicverse.nl
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: DFWPG
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Tested up to: 6.3
 */

// Prevent direct access to the file
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


// Define the plugin version
define('DFWPG_VERSION', '1.0.0');


// Define the plugin path
define('DFWPG_PATH', plugin_dir_path(__FILE__));

// Register main class
require_once DFWPG_PATH . 'includes/main.php';

// Initialize the main class with the plugin file path
$DFWPG_main = new main(__FILE__);


// Activation hook
register_activation_hook(__FILE__, 'DFWPG_activate');
function DFWPG_activate()
{
    // Set default options on activation
    $default_options = array(
        'enable_frontend' => false,
        'redirect_url' => home_url(),
        'redirect_status' => 302,
    );
    add_option('DFWPG_settings', $default_options);
}

register_deactivation_hook(__FILE__, 'DFWPG_deactivate');
function DFWPG_deactivate()
{
    // Optionally, you can remove the options on deactivation
    // delete_option( 'DFWPG_settings' );
}

// Uninstall hook
register_uninstall_hook(__FILE__, 'DFWPG_uninstall');
function DFWPG_uninstall()
{
    // Remove the options on uninstall
    delete_option('DFWPG_settings');
}