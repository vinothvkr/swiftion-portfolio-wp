<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Swiftion_Portfolio
 * @since 1.0.0
 */

if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<aside id="secondary" class="col-md-4 widget-area sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'swiftionportfolio' ); ?>">
		<?php
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			?>
					<div class="widget-column sidebar-widget-1">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				<?php
		}
		?>
	</aside><!-- .widget-area -->

<?php endif; ?>
