<?php
/**
 * User shortcode
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\ShortCodes;

use AwesomeMotive\Miusage\Helpers\Assets;
use AwesomeMotive\Miusage\Interfaces\ShortCoder;

defined( 'ABSPATH' ) || exit;

/**
 * Class Users
 *
 * @package AwesomeMotive\Miusage\ShortCodes
 */
class Users implements ShortCoder {
	const NAME = 'awesomemotive-miusage-users';

	/**
	 * Render shortcode
	 *
	 * @param array $attributes An array of attributes.
	 * @param null  $content Content to return.
	 *
	 * @return mixed|null
	 */
	public static function render( $attributes = [], $content = null ) {
		ob_start();
		Assets::enqueue_style();
		Assets::enqueue_script();
		?>
		<div class="<?php echo esc_attr( self::NAME ); ?>">
			<table>
				<thead></thead>
				<tbody></tbody>
			</table>
		</div>
		<?php
		return ob_get_clean();
	}
}
