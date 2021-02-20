<?php
/**
 * ControllerInvoker setup.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage;

use AwesomeMotive\Miusage\Controllers\AjaxUserController;
use AwesomeMotive\Miusage\Controllers\MenuController;
use AwesomeMotive\Miusage\Controllers\ShortcodeController;
use AwesomeMotive\Miusage\Helpers\Request;

defined( 'ABSPATH' ) || exit;

/**
 * Class ControllerInvoker
 *
 * @package AwesomeMotive\Miusage\Providers
 */
class ControllerInvoker {
	/**
	 * Request instance.
	 *
	 * @var Request instance.
	 */
	private static $request;

	/**
	 * Invoke all the controllers
	 *
	 * @return void
	 */
	public static function invoke() {
		self::$request = new Request();
		new MenuController();
		new ShortcodeController();
		new AjaxUserController( self::$request );
	}
}
