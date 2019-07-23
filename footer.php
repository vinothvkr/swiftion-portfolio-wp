<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	</div><!-- #content -->

	<div class="site-footer">
        <div class="container">
            <div class="row">
                <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
            </div>
        </div>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6 copyright">
						<?php $blog_info = get_bloginfo( 'name' ); ?>
						<?php if ( ! empty( $blog_info ) ) : ?>
							<a class="site-name" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						<?php endif; ?>
						All rights reserved. Proudly powered by
                        <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'swiftionportfolio' ) ); ?>" target="_blank">Wordpress</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
