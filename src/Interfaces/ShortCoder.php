<?php
/**
 * ShortCoder Interface
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Interfaces;

defined( 'ABSPATH' ) || exit;

/**
 * Interface DataLoader
 *
 * @package AwesomeMotive\Miusage\Interfaces
 */
interface ShortCoder {

	/**
	 * Render shortcode
	 *
	 * @param array $attributes array of attributes.
	 * @param null  $content content to return.
	 *
	 * @return mixed
	 */
	public static function render( $attributes = [], $content = null );
}
