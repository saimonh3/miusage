<?php
/**
 * Miusage template
 *
 * @package AwesomeMotive\Miusage
 */

?>

<div class="awesomemotive-miusage">
	<h2 class="awesomemotive-miusage__logo"><?php esc_html_e( 'Miusage', 'miusage' ); ?></h2>

	<section class="awesomemotive-miusage__menu">
		<a href="#" class="awesomemotive-miusage__active awesomemotive-miusage__tab">
			<?php esc_html_e( 'Users', 'miusage' ); ?>
		</a>

		<?php
		/**
		 * Miusage navbar hook
		 */
		do_action( 'miusage_navbar' );
		?>
	</section>

	<section class="awesomemotive-miusage__container">
		<?php
		echo wp_kses_post( do_shortcode( '[awesomemotive-miusage-users]' ) );

		/**
		 * Homepage container hook
		 */
		do_action( 'miusage_homepage_container' );
		?>
	</section>
</div>
