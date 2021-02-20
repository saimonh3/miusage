<?php
/**
 * Admin menu class
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\ServiceProviders;

use AwesomeMotive\Miusage\Traits\Hooker;
use AwesomeMotive\Miusage\Traits\Singleton;

defined( 'ABSPATH' ) || exit;

/**
 * Class AdminMenu
 *
 * @package AwesomeMotive\Miusage\Providers\Menus
 */
class AdminMenu {
	use Hooker;
	use Singleton;

	const POSITION = 10;
	const CAP      = 'manage_options';
	const ICON     = 'dashicons-businessman';
	const SLUG     = 'awesomemotive-miusage';

	/**
	 * Render all the menus.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render() {
		global $submenu;

		add_menu_page(
			__( 'Miusage', 'miusage' ),
			__( 'Miusage', 'miusage' ),
			self::CAP,
			self::SLUG,
			[ $this, 'render_page' ],
			self::ICON,
			self::POSITION
		);

		if ( current_user_can( self::CAP ) ) {
			$submenu[ self::SLUG ][] = [ __( 'Users List', 'miusage' ), self::CAP, 'admin.php?page=' . self::SLUG ]; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
		}

		$this->do_action( 'miusage_register_admin_menu', $this );
	}

	/**
	 * Render the page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function render_page() {
		miusage()->template->render( 'miusage' );
	}
}
