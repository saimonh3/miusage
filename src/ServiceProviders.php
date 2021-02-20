<?php
/**
 * Vendor setup.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage;

use AwesomeMotive\Miusage\CLI\CLI;
use AwesomeMotive\Miusage\Traits\Hooker;
use AwesomeMotive\Miusage\Traits\Singleton;
use AwesomeMotive\Miusage\ServiceProviders\Template;
use AwesomeMotive\Miusage\ServiceProviders\ShortCode;
use AwesomeMotive\Miusage\ServiceProviders\AdminMenu;
use AwesomeMotive\Miusage\ServiceProviders\UserLoader;
use AwesomeMotive\Miusage\Exceptions\ClassNotFoundException;

defined( 'ABSPATH' ) || exit;

/**
 * Class ServiceProviders
 *
 * @package AwesomeMotive\Miusage
 */
class ServiceProviders {
	use Hooker;
	use Singleton;

	/**
	 * Main app instance holder.
	 *
	 * @var Miusage instance
	 */
	public static $app;

	/**
	 * Register service provider to the App
	 *
	 * @param Miusage $app Main app instance.
	 */
	public static function register( Miusage $app ) {
		static::$app = $app;
		self::instance();
	}

	/**
	 * ServiceProviders constructor.
	 *
	 * @throws ClassNotFoundException Throw an exception.
	 */
	public function __construct() {
		$this->set_providers();
	}

	/**
	 * Set service providers
	 *
	 * @throws ClassNotFoundException Throw an exception.
	 */
	private function set_providers() {
		foreach ( $this->get_providers() as $provider => $provider_class ) {
			if ( ! class_exists( $provider_class ) ) {
				throw new ClassNotFoundException( sprintf( '%s not found.', $provider_class ) );
			}

			static::$app->{$provider} = $provider_class::instance();
		}
	}

	/**
	 * Get a list of service providers
	 *
	 * @return array
	 */
	public function get_providers() {
		return $this->apply_filters(
			'miusage_get_service_providers',
			[
				'admin_menu'  => AdminMenu::class,
				'user_loader' => UserLoader::class,
				'short_code'  => ShortCode::class,
				'template'    => Template::class,
				'cli'         => CLI::class,
			]
		);
	}
}
