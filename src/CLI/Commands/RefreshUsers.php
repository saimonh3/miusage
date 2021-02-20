<?php
/**
 * Refresh command
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\CLI\Commands;

use WP_CLI;
use AwesomeMotive\Miusage\ServiceProviders\UserLoader;

defined( 'ABSPATH' ) || exit;

/**
 * Class RefreshUsers
 *
 * @package AwesomeMotive\Miusage\CLI\Commands
 */
class RefreshUsers {

	/**
	 * Invoke method
	 *
	 * @return mixed
	 */
	public function __invoke() {
		$has_transient = get_transient( UserLoader::CACHE_KEY );

		if ( ! $has_transient ) {
			return WP_CLI::error( __( 'There is nothing to be cleared.', 'miusage' ) );
		}

		$delete = delete_transient( UserLoader::CACHE_KEY );

		if ( ! $delete ) {
			WP_CLI::error( __( 'Something went wrong! Please try again', 'miusage' ) );
		}

		WP_CLI::success( __( 'Refreshed User Lists!', 'miusage' ) );
	}
}
