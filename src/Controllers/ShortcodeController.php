<?php
/**
 * Admin Menu setup
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Controllers;

use AwesomeMotive\Miusage\Abstracts\Controller;
use AwesomeMotive\Miusage\ServiceProviders\ShortCode;
use AwesomeMotive\Miusage\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Class Menu
 *
 * @package WAwesomeMotive\Miusage\ControllerInvoker
 */
class ShortcodeController extends Controller {

	/**
	 * MenuController constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->action( 'init', [ $this, 'register' ] );
	}

	/**
	 * Register Shortcodes
	 *
	 * @return void
	 */
	public function register() {
		miusage()->short_code->register();
	}
}
