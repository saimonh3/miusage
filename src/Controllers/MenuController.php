<?php
/**
 * Admin Menu setup
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Controllers;

use AwesomeMotive\Miusage\Abstracts\Controller;
use AwesomeMotive\Miusage\ServiceProviders\AdminMenu;

defined( 'ABSPATH' ) || exit;

/**
 * Class Menu
 *
 * @package WAwesomeMotive\Miusage\ControllerInvoker
 */
class MenuController extends Controller {

	/**
	 * MenuController constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		$this->action( 'admin_menu', [ $this, 'render' ] );
	}

	/**
	 * Render admin page
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render() {
		miusage()->admin_menu->render();
	}
}
