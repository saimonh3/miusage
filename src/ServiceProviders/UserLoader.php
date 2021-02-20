<?php
/**
 * Users class
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\ServiceProviders;

use AwesomeMotive\Miusage\Interfaces\DataLoader;
use AwesomeMotive\Miusage\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class UserLoader
 *
 * @package AwesomeMotive\Miusage\ServiceProviders
 */
class UserLoader implements DataLoader {
	use Singleton;

	const CACHE_KEY          = 'miusage_users';
	const ENDPOINT           = 'https://miusage.com/v1/challenge/1';
	const TIMEOUT_IN_SECONDS = HOUR_IN_SECONDS;

	/**
	 * Load the users
	 *
	 * @return mixed|void
	 */
	public function load() {
		return apply_filters( 'miusage_get_users', $this->request() );
	}

	/**
	 * Request users from the REST API
	 *
	 * @return array
	 */
	private function request() {
		$json_response = get_transient( self::CACHE_KEY );

		if ( false !== $json_response ) {
			return json_decode( $json_response, true );
		}

		$request = wp_safe_remote_get( self::ENDPOINT );

		if ( is_wp_error( $request ) || 200 !== wp_remote_retrieve_response_code( $request ) ) {
			return [];
		}

		$json_response  = wp_remote_retrieve_body( $request );
		$response_array = json_decode( $json_response, true );

		if ( ! is_array( $response_array ) ) {
			$response_array = [];
		}

		set_transient( self::CACHE_KEY, $json_response, self::TIMEOUT_IN_SECONDS );

		return $response_array;
	}
}
