<?php
/**
 * Plugin Name: Disable Frontend for WPGraphQL
 * Description: Disables the frontend for WPGraphQL, allowing only GraphQL requests. All other request will redirect to the real (decoupled) homepage.
 * Version: 1.0.0
 * Author: Rik Visser
 * Author URI: https://sonicverse.nl
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: disable-frontend-wpgraphql
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Tested up to: 6.3
 */

 // Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Define the plugin version
define( 'DISABLE_FRONTEND_WPGRAPHQL_VERSION', '1.0.0' );

// Define the plugin directory
define( 'DISABLE_FRONTEND_WPGRAPHQL_DIR', plugin_dir_path( __FILE__ ) );

// Define the plugin URL
define( 'DISABLE_FRONTEND_WPGRAPHQL_URL', plugin_dir_url( __FILE__ ) );


