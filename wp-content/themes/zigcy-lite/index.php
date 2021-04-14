<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 */

get_header();
$sml_archive_post_sidebar = get_theme_mod('zigcy_lite_archive_post_layout_sidebars', 'right-sidebar-enabled');
?>
<div class="container">
	<div class="sml-archive-wrapper <?php echo esc_attr($sml_archive_post_sidebar); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">

				<?php
				if (have_posts()) :

					if (is_home() && !is_front_page()) :
				?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
				<?php
					endif;

					/* Start the Loop */
					while (have_posts()) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part('template-parts/content', 'archive');

					endwhile;

					zigcy_lite_numeric_posts_nav();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		// sidebar options
		$archive_sidebar_explode  =  (explode("-", $sml_archive_post_sidebar));
		$archive_sidebar          = $archive_sidebar_explode[0];
		if ($archive_sidebar == 'both') {
			get_sidebar('left');
			get_sidebar('right');
		} elseif ($archive_sidebar != 'no') {
			get_sidebar($archive_sidebar);
		}
		?>
	</div>
</div>
<?php
get_footer();
