<?php
/**
 * Controller Class
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Abstracts;

use AwesomeMotive\Miusage\Helpers\Request;

defined( 'ABSPATH' ) || exit;

/**
 * Class AjaxController
 *
 * @package AwesomeMotive\Miusage\Abstracts
 */
abstract class AjaxController extends Controller {

	/**
	 * Validate the nonce check
	 *
	 * @param Request $request HTTP Request.
	 * @param string  $action Action while created the nonce.
	 */
	public function validate( Request $request, $action = 'miusage-nonce' ) {
		$nonce = $request->post( 'nonce' );

		if ( ! $nonce || ! wp_verify_nonce( $nonce, $action ) ) {
			wp_send_json(
				__( 'Sorry, seems your are not allowed to make the request.', 'miusage' )
			);
		}
	}
}
