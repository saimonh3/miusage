<?php
/**
 * Template class
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\ServiceProviders;

use AwesomeMotive\Miusage\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class UserLoader
 *
 * @package AwesomeMotive\Miusage\ServiceProviders
 */
class Template {
	use Singleton;

	/**
	 * Render the template
	 *
	 * @param string $template template name.
	 * @param array  $args array of arguments.
	 *
	 * @return void
	 */
	public function render( $template, $args = [] ) {
		ob_start();
		$template_path = MIUSAGE_TEMPLATE . $template . '.php';
		extract( $args, EXTR_SKIP ); // phpcs:ignore

		if ( is_readable( $template_path ) ) {
			require_once $template_path;
		}

		echo wp_kses_post( ob_get_clean() );
	}
}
