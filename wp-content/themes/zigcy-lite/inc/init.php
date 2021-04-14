<?php 
/**
* Main Custom admin functions area
*/

if( !function_exists('zigcy_lite_file_directory') ){

   function zigcy_lite_file_directory( $file_path ){
       if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
           return trailingslashit( get_stylesheet_directory() ) . $file_path;
       }
       else{
           return trailingslashit( zigcy_lite_THEME_DIR ) . $file_path;
       }
   }
}
/**
 * Implement the Custom Header feature.
 */
require zigcy_lite_file_directory('/inc/etc/custom-header.php');

/**
 * Custom template tags for this theme.
 */
require zigcy_lite_file_directory('/inc/etc/template-tags.php');

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require zigcy_lite_file_directory('/inc/etc/template-functions.php');

/**
 * Customizer additions.
 */
require zigcy_lite_file_directory('/inc/customizer/customizer.php');

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require zigcy_lite_file_directory('/inc/etc/jetpack.php');
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require zigcy_lite_file_directory('/inc/etc/woocommerce.php');
}

//dynamic css
require zigcy_lite_file_directory('/inc/etc/dynamic-css.php');

/**
 * buttonset
 */
require zigcy_lite_file_directory('/inc/customizer/buttonset/init.php');

/**
 * zigcy-lite-sanitize
 */
require zigcy_lite_file_directory('/inc/customizer/zigcy-lite-sanitize.php');

/**
 * customizer-class
 */
require zigcy_lite_file_directory('/inc/customizer/customizer-class.php');

/**
 * footer
 */
require zigcy_lite_file_directory('/inc/hooks/footer.php');

/**
 * header
 */
require zigcy_lite_file_directory('/inc/hooks/header.php');

/**
 * function
 */
require zigcy_lite_file_directory('/inc/zigcy-lite-functions.php');

/**
 * function
 */
require zigcy_lite_file_directory('/inc/etc/woocommerce/yith-functions.php');

/**
 * slider and promo section
 */
require zigcy_lite_file_directory('/inc/home-section/slider.php');
require zigcy_lite_file_directory('/inc/home-section/pro-cat.php');
require zigcy_lite_file_directory('/inc/home-section/feat-pro-cat.php');
require zigcy_lite_file_directory('/inc/home-section/sml-cta.php');
require zigcy_lite_file_directory('/inc/home-section/lat-cat-pro.php');
require zigcy_lite_file_directory('/inc/home-section/blog.php');
require zigcy_lite_file_directory('/inc/home-section/client.php');
require zigcy_lite_file_directory('/inc/home-section/product-slider.php');
require zigcy_lite_file_directory('/inc/home-section/product-tab.php');





//breadcrumb
require zigcy_lite_file_directory('/inc/etc/breadcrumb.php');

/**
* Theme welcome page
*
*/

$zigcy_welcome_file = get_theme_file_path() . '/inc/welcome/welcome-config.php';
if(file_exists($zigcy_welcome_file)){
    require $zigcy_welcome_file;
}else{
    require get_template_directory().'/inc/welcome/welcome-config.php';
}




