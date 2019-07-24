<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
<div class="container">
	<div class="row">
		<section id="primary" class="col-md-12 content-area">
			<main id="main" class="site-main">

				<div class="error-404 not-found">
					<header class="page-header">
						<h1 class="page-title">404</h1>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php _e( 'We are sorry, But the page you requested was not found', 'swiftionportfolio' ); ?></p>
						<a href="/" class="btn btn-primary">Go Home</a>
						<a href="/#contact" class="btn btn-outline-primary">Contact Us</a>
					</div><!-- .page-content -->

					<div class="page-footer">
						<form class="form-inline justify-content-center search-form" role="search" method="get" action="/" >
							<div class="form-group mr-3">
								<input type="search" class="form-control search-field" placeholder="Search" value name="s">
							</div>
							<button type="submit" class="btn btn-primary">Search</button>
						</form>
					</div>
				</div><!-- .error-404 -->

			</main><!-- #main -->
		</section><!-- #primary -->
	</div>
</div>
<?php
get_footer();
