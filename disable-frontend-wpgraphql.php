<?php
/**
 * Plugin Name: Disable Frontend for WPGraphQL
 * Description: Disables the frontend for WPGraphQL, allowing only GraphQL requests. All other request will redirect to the real (decoupled) homepage.
 * Version: 1.0.0
 * Author: Rik Visser
 * Author URI: https://sonicverse.nl
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: DFWPG
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.0
 * Tested up to: 6.3
 */

 // Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}




