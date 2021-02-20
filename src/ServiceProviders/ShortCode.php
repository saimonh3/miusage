<?php
/**
 * Shortcode provider
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\ServiceProviders;

use AwesomeMotive\Miusage\ShortCodes\Users;
use AwesomeMotive\Miusage\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class ShortCode
 *
 * @package AwesomeMotive\Miusage\ServiceProviders
 */
class ShortCode {
	use Singleton;

	/**
	 * Register all the shortcodes
	 *
	 * @return void
	 */
	public function register() {
		foreach ( $this->all() as $shortcode ) {
			add_shortcode( $shortcode::NAME, [ $shortcode, 'render' ] );
		}
	}

	/**
	 * Get all shortcode classes
	 *
	 * @return array
	 */
	public function all() {
		return apply_filters(
			'miusage_get_shortcodes',
			[
				Users::class,
			]
		);
	}
}
