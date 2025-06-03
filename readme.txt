=== Disable Frontend for WPGraphQL ===
Contributors: rikvisser
Donate link: https://example.com/donate
Tags: headless, frontend, redirect, decoupled, utility
Requires at least: 4.7
Tested up to: 6.8.1
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Disable WordPress frontend and redirect visitors to your headless app. Perfect for WPGraphQL headless setups.

== Description ==

**Disable Frontend for WPGraphQL** is a lightweight WordPress plugin designed specifically for headless WordPress implementations. When you're using WordPress as a content management system with WPGraphQL as your API layer, you often don't want visitors accessing your WordPress frontend directly.

This plugin provides a clean, efficient solution by:

* **Disabling frontend access** to all WordPress pages, posts, and archives
* **Redirecting visitors** to your preferred destination (your headless app, custom URL, or maintenance page)
* **Preserving admin access** – WordPress admin area remains fully functional
* **Maintaining API endpoints** – WPGraphQL and REST API continue to work normally
* **Customizable redirect behavior** with multiple redirect options

### Perfect for Headless WordPress Setups

If you're building modern web applications using:
– **React** with Next.js, Gatsby, or Create React App
– **Vue.js** with Nuxt.js or Gridsome
– **Angular**, **Svelte**, or other modern frameworks
– **Static site generators** like Eleventy or Hugo
– **JAMstack** architectures

This plugin ensures your WordPress installation serves purely as a content API while your frontend application handles all user-facing interactions.

### Key Features

* 🚀 **One-click frontend disable** – Instant setup with sensible defaults
* 🎯 **Flexible redirect options** – Redirect to any URL, show maintenance page, or return 404
* ⚡ **Lightweight and fast** – Minimal impact on performance
* 🛡️ **Admin area protection** – WordPress dashboard remains accessible
* 🔌 **API preservation** – WPGraphQL, REST API, and other endpoints continue working
* ⚙️ **Customizable behavior** – Fine-tune redirect logic for your needs
* 🔧 **Developer-friendly** – Hooks and filters for advanced customization

### Use Cases

* **Headless WordPress** implementations with React, Vue, Angular, etc.
* **API-only WordPress** installations for mobile apps
* **Staging environments** where frontend isn't ready
* **Migration periods** during frontend rebuilds
* **Development setups** where frontend runs separately

== Installation ==

### Automatic Installation

1. Log in to your WordPress admin dashboard
2. Navigate to **Plugins > Add New**
3. Search for "Disable Frontend for WPGraphQL"
4. Click **Install Now** and then **Activate**

### Manual Installation

1. Download the plugin ZIP file
2. Upload it via **Plugins > Add New > Upload Plugin**
3. Activate the plugin through the **Plugins** menu

### FTP Installation

1. Download and extract the plugin files
2. Upload the `disable-frontend-wpgraphql` folder to `/wp-content/plugins/`
3. Activate the plugin through the WordPress **Plugins** menu

== Configuration ==

After activation:

1. Go to **Settings > FGWPG**
2. Choose your redirect destination:
   – **Custom URL** – Redirect to your headless app
3. Configure additional options as needed
4. Save settings

The plugin works immediately with default settings, redirecting all frontend traffic to a basic maintenance page.

== Frequently Asked Questions ==

= Will this break my WordPress admin area? =

No! The plugin specifically preserves access to:
– WordPress admin dashboard (`/wp-admin/`)
– Login pages (`/wp-login.php`)
– Administrative AJAX calls
– WPGraphQL endpoints
– REST API endpoints

= Can I still use WPGraphQL after installing this plugin? =

Absolutely! This plugin is designed specifically for WPGraphQL users. All GraphQL endpoints remain fully functional – only the frontend theme output is disabled.

= What happens to my REST API? =

The WordPress REST API continues to work normally. Only frontend theme rendering is affected.

= Can I customize which pages get redirected? =

Yes! The plugin provides hooks and filters for developers to customize redirect behavior. You can exclude specific pages, user roles, or URL patterns.

= Will this affect my SEO? =

Since you're likely moving to a headless setup, your new frontend application will handle SEO. The plugin can be configured to return appropriate HTTP status codes for search engines.

= Can I temporarily disable the plugin's redirect? =

Yes! You can add `?disable_redirect=1` to any URL (with proper authentication) to bypass the redirect for testing purposes.

== Screenshots ==

1. **Settings Page** – Simple configuration interface
2. **Maintenance Mode** – Default redirect page shown to visitors
3. **Admin Access** – WordPress admin remains fully functional
4. **GraphQL Endpoint** – WPGraphQL continues working normally

== Changelog ==

= 1.0.0 =
* Initial release
* Basic frontend disable functionality
* Configurable redirect options
* Admin area preservation
* WPGraphQL compatibility
* REST API preservation

== Upgrade Notice ==

= 1.0.0 =
Initial release of Disable Frontend for WPGraphQL plugin.


== Privacy ==

This plugin does not collect, store, or transmit any personal data. It only modifies redirect behavior on your WordPress installation.