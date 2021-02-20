<?php
/**
 * AJAX Controller
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Controllers;

use AwesomeMotive\Miusage\Abstracts\AjaxController;
use AwesomeMotive\Miusage\Helpers\Request;
use AwesomeMotive\Miusage\Models\Users;

defined( 'ABSPATH' ) || exit;

/**
 * Class Menu
 *
 * @package WAwesomeMotive\Miusage\ControllerInvoker
 */
class AjaxUserController extends AjaxController {

	/**
	 * Request Instance
	 *
	 * @var Request object.
	 */
	private $request;

	/**
	 * MenuController constructor.
	 *
	 * @param Request $request Request instance.
	 *
	 * @since 1.0.0
	 */
	public function __construct( Request $request ) {
		$this->request = $request;

		$this->action( 'wp_ajax_' . $this->request->post( 'action' ), [ $this, 'get_users' ] );
		$this->action( 'wp_ajax_nopriv_' . $this->request->post( 'action' ), [ $this, 'get_users' ] );
	}

	/**
	 * Get users
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function get_users() {
		$this->validate( $this->request );
		$users = new Users( miusage()->user_loader );

		$this->request->json( $users->all() );
	}
}
