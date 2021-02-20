<?php
/**
 * Main plugin file.
 *
 * @package AwesomeMotive\Miusage
 */

/**
 * A simple plugin for Awesome Motive
 *
 * @package AwesomeMotive\Miusage
 *
 * @wordpress-plugin
 * Plugin Name: Miusage - A simple plugin for Awesome Motive
 * Plugin URI: https://awesomemotive.com
 * Description: A simple plugin for Awesome Motive
 * Version: 1.0.0
 * Author: AwesomeMotive
 * Author URI: https://awesomemotive.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: miusage
 * Domain Path: /languages
 * Requires at least: 5.3
 * Requires PHP: 5.6
 */

use AwesomeMotive\Miusage\Miusage;

defined( 'ABSPATH' ) || exit;
defined( 'MIUSAGE_FILE' ) || define( 'MIUSAGE_FILE', __FILE__ );

require_once __DIR__ . '/vendor/autoload.php';

if ( ! function_exists( 'miusage' ) ) {

	/**
	 * Get the main instance of the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return Miusage;
	 */
	function miusage() {
		return Miusage::instance();
	}
}

// Kick off the plugin.
miusage();
