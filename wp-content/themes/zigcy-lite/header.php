<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zigcy Lite
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'zigcy-lite' ); ?></a>
		<?php
		/**
        * Mobile navigation 
        */
        do_action('zigcy_lite_mob_nav');
		$zigcy_lite_header = get_theme_mod('zigcy_lite_header_type','layout1');
        /*
        * Gets header layout dynamically from customizer value
        */
        get_template_part('template-parts/header-layouts/header',$zigcy_lite_header); ?>


    </div>
    <?php 
    if( is_front_page() ){
    	do_action('zigcy_lite_slider_promo_section');
    }else{
    	zigcy_lite_header_title_display();
    }
    ?>

    <div id="content" class="site-content">