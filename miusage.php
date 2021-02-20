<?php
/**
 * Main plugin file.
 *
 * @package AwesomeMotive\Miusage
 */

declare(strict_types=1);

/**
 * A simple plugin for AwesomeMotive
 *
 * @package wpMonstar
 *
 * @wordpress-plugin
 * Plugin Name: Miusage -  A simple plugin for AwesomeMotive
 * Plugin URI: https://awesomemotive.com
 * Description: A Multi-vendor Marketplace for WooCommerce
 * Version: 1.0.0
 * Author: AwesomeMotive
 * Author URI: https://awesomemotive.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: bazaar
 * Domain Path: /languages
 * Requires at least: 5.3
 * Requires PHP: 5.6
 * WC requires at least: 3.0.0
 * WC tested up to: 4.8
 */

use AwesomeMotive\Miusage;

defined( 'ABSPATH' ) || exit;
defined( 'BAZAAR_FILE' ) || define( 'BAZAAR_FILE', __FILE__ );

require_once __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'bazaar' ) ) {

	/**
	 * Get the main instance of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return Awesomemotive
	 */
	function bazaar(): Awesomemotive {
		return Awesomemotive::instance();
	}

	// Kick off the plugin.
	bazaar();
}

