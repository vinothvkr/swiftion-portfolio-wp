<?php
/**
 * Displays the footer widget area
 *
 * @package WordPress
 * @subpackage Swiftion_Portfolio
 * @since 1.0.0
 */
?>
<div class="col-md-4">
	<div class="footer-col">
		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>

			<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'swiftionportfolio' ); ?>">
				<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
					<div class="widget-column footer-widget-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php } ?>
			</aside><!-- .widget-area -->

		<?php endif; ?>
	</div>
</div>
<div class="col-md-4">
	<div class="footer-col">
	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>

		<aside class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'swiftionportfolio' ); ?>">
			<?php if ( is_active_sidebar( 'footer-2' ) ) { ?>
				<div class="widget-column footer-widget-2">
				<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			<?php } ?>
		</aside><!-- .widget-area -->

	<?php endif; ?>
	</div>
</div>
<div class="col-md-4">
	<div class="social footer-col">
		<?php if ( has_nav_menu( 'social-menu' ) ) { ?>
			<aside class="widget-area" role="complementary" aria-label="Footer">
				<div class="widget-column">
					<div id="social-links" class="widget">
						<h3 class="widget-title">Follow Me</h3>
						<div id="social_wrap" class="social_wrap">
							<?php swiftionportfolio_social_icons(); ?>
						</div>
					</div>
				</div>
			</aside>
			<h2></h2>
		<?php } ?>
	</div>
</div>

