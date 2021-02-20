<?php
/**
 * Setup plugin constants.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Helpers;

use AwesomeMotive\Miusage\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class Constants
 *
 * @package AwesomeMotive\Miusage\Helpers
 */
class Constants {

	use Singleton;

	/**
	 * Constants constructor
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function __construct() {
		$this->define_constants();
	}

	/**
	 * Create an instance
	 *
	 * @since 1.0.0
	 */
	public static function defines() {
		self::instance();
	}

	/**
	 * Define constants for the plugin
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	private function define_constants() {
		$this->define( 'MIUSAGE_PATH', dirname( MIUSAGE_FILE ) );
		$this->define( 'MIUSAGE_ASSETS', plugin_dir_url( MIUSAGE_FILE ) . 'assets/' );
		$this->define( 'MIUSAGE_LANGUAGE', plugin_basename( MIUSAGE_PATH ) . '/languages' );
		$this->define( 'MIUSAGE_TEMPLATE', dirname( MIUSAGE_FILE ) . '/src/Templates/' );
	}

	/**
	 * Define constant
	 *
	 * @since 1.0.0
	 *
	 * @param string $key constant name.
	 * @param string $value constant value.
	 *
	 * @return void
	 */
	private function define( $key, $value ) {
		defined( $key ) || define( $key, $value );
	}
}
