<?php
/**
 * Miusage setup.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage;

use AwesomeMotive\Miusage\CLI\CLI;
use AwesomeMotive\Miusage\Traits\Hooker;
use AwesomeMotive\Miusage\Helpers\Assets;
use AwesomeMotive\Miusage\Traits\Singleton;
use AwesomeMotive\Miusage\Helpers\Constants;
use AwesomeMotive\Miusage\ServiceProviders\Template;
use AwesomeMotive\Miusage\ServiceProviders\ShortCode;
use AwesomeMotive\Miusage\ServiceProviders\UserLoader;
use AwesomeMotive\Miusage\ServiceProviders\AdminMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Class Miusage
 *
 * @package AwesomeMotive\Miusage
 */
final class Miusage {
	use Hooker;
	use Singleton;

	const VERSION = '1.0.0';

	/**
	 * AdminMenu Instance
	 *
	 * @var UserLoader
	 */
	public $user_loader;

	/**
	 * UserLoader Instance
	 *
	 * @var AdminMenu
	 */
	public $admin_menu;

	/**
	 * ShortCode Instance
	 *
	 * @var ShortCode
	 */
	public $short_code;

	/**
	 * CLI Instance
	 *
	 * @var CLI
	 */
	public $cli;

	/**
	 * Template Instance
	 *
	 * @var Template
	 */
	public $template;

	/**
	 * Miusage constructor.
	 */
	public function __construct() {
		Constants::defines();
		Assets::register();
		add_action( 'plugins_loaded', [ $this, 'init' ] );
		add_action( 'init', [ $this, 'set_text_domain' ] );
	}

	/**
	 * Init the plugin
	 *
	 * @return void
	 */
	public function init() {
		ServiceProviders::register( $this );
		ControllerInvoker::invoke();
		$this->cli();
	}

	/**
	 * Set text domain
	 *
	 * @return void
	 */
	public function set_text_domain() {
		load_plugin_textdomain( 'miusage', false, MIUSAGE_LANGUAGE );
	}

	/**
	 * Run CLI commands
	 *
	 * @return void
	 */
	private function cli() {
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			miusage()->cli->run();
		}
	}
}
