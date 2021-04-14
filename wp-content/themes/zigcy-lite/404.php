<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Zigcy Lite
 */

get_header();
?>
	<div class="container">
		<div class="sml-error-wrapper">

			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<section class="error-404 not-found">
						<div class="page-content">
							<div class="store-mart-lite-404">
		                		<span class="sml-404"><?php esc_html_e('404' , 'zigcy-lite' ); ?></span> 
							</div>
							<p  class="search-sorry"><?php esc_html_e( 'OOPS! Page Not Found.', 'zigcy-lite' ); ?></p>
								<p class="search-not-exists"><?php esc_html_e( 'The page you are looking for does not exist.', 'zigcy-lite' ); ?></p>
								<div class="home-404-link">
									<span><?php esc_html_e('Please return to ', 'zigcy-lite');?></span><a href="<?php echo esc_url( home_url('/') );?>"><?php esc_html_e('Homepage', 'zigcy-lite');?></a>
								</div>
								<div class="no-results not-found">
									<?php 
									get_search_form();
									?>
								</div>

						</div><!-- .page-content -->
						
					</section><!-- .error-404 -->

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>

<?php
get_footer();
