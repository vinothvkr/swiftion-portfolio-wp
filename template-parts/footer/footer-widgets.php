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
		<h2>Social Media</h2>
		<span class="fa-stack"><a target="_blank" rel="noopener noreferrer" href="https://twitter.com/vinoobubbly"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-twitter fa-stack-1x"></i></a></span>
		<span class="fa-stack"><a target="_blank" rel="noopener noreferrer" href="https://github.com/vinothvkr"><i class="fas fa-circle fa-stack-2x"></i><i class="fab fa-github fa-stack-1x"></i></a></span>
	</div>
</div>

