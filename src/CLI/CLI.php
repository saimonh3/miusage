<?php
/**
 * CLI Class
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\CLI;

use WP_CLI;
use AwesomeMotive\Miusage\Traits\Singleton;
use AwesomeMotive\Miusage\CLI\Commands\RefreshUsers;

defined( 'ABSPATH' ) || exit;

/**
 * Class CLI
 *
 * @package AwesomeMotive\Miusage\CLI
 *
 * @since 1.0.0
 */
class CLI {
	use Singleton;

	const BASE = 'miusage ';

	/**
	 * Get all the commands
	 *
	 * @return array
	 */
	public function get_cli_commands() {
		return apply_filters(
			'miusage_get_cli_commands',
			[
				'refresh' => RefreshUsers::class,
			]
		);
	}

	/**
	 * Run the commands
	 *
	 * @return void
	 */
	public function run() {
		foreach ( $this->get_cli_commands() as $command => $class ) {
			WP_CLI::add_command( self::BASE . $command, $class );
		}
	}
}
