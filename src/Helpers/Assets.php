<?php
/**
 * Assets helper class.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Helpers;

defined( 'ABSPATH' ) || exit;

/**
 * Class Assets
 *
 * @package AwesomeMotive\Helpers
 */
class Assets {
	const SCRIPT_HANDLE = 'miusage-script';
	const STYLE_HANDLE  = 'miusage-style';
	const OBJECT_NAME   = 'miusageAssets';

	/**
	 * Register all the scripts
	 *
	 * @return void
	 */
	public static function register() {
		add_action( 'admin_enqueue_scripts', [ self::class, 'register_scripts' ] );
		add_action( 'wp_enqueue_scripts', [ self::class, 'register_scripts' ] );
	}

	/**
	 * Register scripts
	 *
	 * @return void
	 */
	public static function register_scripts() {
		$script     = require MIUSAGE_PATH . '/assets/build/main.asset.php';
		$dependency = array_merge(
			$script['dependencies'],
			[ 'jquery' ]
		);
		$version    = $script['version'];

		wp_register_script( self::SCRIPT_HANDLE, MIUSAGE_ASSETS . 'build/main.js', $dependency, $version, true );
		wp_register_style( self::STYLE_HANDLE, MIUSAGE_ASSETS . 'build/style-main.css', [], $version );
		wp_localize_script(
			self::SCRIPT_HANDLE,
			self::OBJECT_NAME,
			[
				'ajax_url' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( 'miusage-nonce' ),
			]
		);
	}

	/**
	 * Enqueue the registered script
	 *
	 * @param string $script_name script name.
	 *
	 * @return void
	 */
	public static function enqueue_script( $script_name = self::SCRIPT_HANDLE ) {
		wp_enqueue_script( $script_name );
	}

	/**
	 * Enqueue the registered style
	 *
	 * @param string $style_name style name.
	 *
	 * @return void
	 */
	public static function enqueue_style( $style_name = self::STYLE_HANDLE ) {
		wp_enqueue_style( $style_name );
	}

	/**
	 * Dequeue registered script
	 *
	 * @param string $script_name script name.
	 */
	public static function dequeue_script( $script_name = self::SCRIPT_HANDLE ) {
		wp_dequeue_script( $script_name );
	}

	/**
	 * Dequeue registered style
	 *
	 * @param string $style_name style name.
	 *
	 * @return void
	 */
	public static function dequeue_style( $style_name = self::STYLE_HANDLE ) {
		wp_dequeue_script( $style_name );
	}
}
