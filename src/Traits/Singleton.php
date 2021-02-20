<?php
/**
 * Assets helper class.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Trait Singleton
 *
 * @package AwesomeMotive\Miusage\Traits
 */
trait Singleton {
	/**
	 * Class instance holder
	 *
	 * @var null Singleton instance.
	 */
	private static $instance;

	/**
	 * Get the instance
	 *
	 * @return static
	 */
	public static function instance() {
		if ( ( null === static::$instance ) || ( ! static::$instance instanceof static ) ) {
			static::$instance = new static();
		}

		if ( method_exists( static::$instance, 'boot' ) ) {
			static::$instance->boot();
		}

		return static::$instance;
	}

	/**
	 * Singleton constructor.
	 */
	private function __construct() {}

	/**
	 * Disable the magic clone method.
	 */
	private function __clone() {}

	/**
	 * Disable the magic wakeup method
	 */
	final public function __wakeup() {
		exit;
	}
}
