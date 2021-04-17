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

			
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php
get_footer();
