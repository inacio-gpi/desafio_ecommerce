<?php

// Thumbnail Support
add_theme_support('post-thumbnails');

/* WooCommerce */
if (class_exists('WooCommerce')) {

    /* WooCommerce Support */
    function woocommerceshop_add_woocommerce_support()
    {
        add_theme_support('woocommerce');
    }
    // desativa  o css padrao
    add_action('after_setup_theme', 'woocommerceshop_add_woocommerce_support');
    
    // Remove WooCommerce Styles
    // add_filter( 'woocommerce_enqueue_styles', '__return_false' );
    
    // Remove Shop Title
    add_filter('woocommerce_show_page_title', '__return_false');
    
    // Add Support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    // add_filter ('woocommerce_enqueue_styles', '__return_empty_array');
}


add_action('after_setup_theme', 'customtheme_add_woocommerce_support');


add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

/**
 * Change number or products per row to 3
 */
// add_filter('loop_shop_columns', 'loop_columns', 999);
// if (!function_exists('loop_columns')) {
// 	function loop_columns() {
// 		return 4; // 3 products per row
// 	}
// }

?>