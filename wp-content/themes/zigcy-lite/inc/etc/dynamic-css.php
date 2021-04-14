<?php
/**
* Dynamic style file for the theme 
*/
function zigcy_lite_dynamic_style(){

    $custom_css = "";
    
    $bg_image = get_theme_mod('zigcy_lite_cta_bg_image');
    if( $bg_image ){
     $custom_css .="
     .store-mart-lite-cta-wrapper{
        background-image: url(".esc_url($bg_image).");
        background-position:center;
        background-repeat:no-repeat;
        background-size: cover;
    }";
}

if( get_header_image() ){
    $custom_css .="
    .store-mart-lite-bread-home{
        background-image: url(".esc_url(get_header_image()).");
        background-position:center;
        background-repeat:no-repeat;
        background-size: cover;
    }";
}

$zigcy_lite_footer_text_color = get_theme_mod('zigcy_lite_footer_text_color','#707070');
if( $zigcy_lite_footer_text_color ){
    $custom_css .= "
    .store-mart-lite-footer-wrap .store-mart-lite-footer-copyright{
        color: {$zigcy_lite_footer_text_color};
    }";
}


$footer_bg = get_theme_mod('zigcy_lite_footer_bg_color','#f6f6f6');
if( $footer_bg ){
    $custom_css .= "
    .store-mart-lite-section-footer-wrap-main{
        background-color: {$footer_bg};
    }";
}

//container width
$container_width = get_theme_mod('zigcy_lite_container_width','1400');
if( $container_width ){
    $custom_css .= "
    .container{
        max-width: {$container_width}px;
    }";
}

/**
* Theme color
*
*/
$zigcy_lite_skin_color = get_theme_mod('zigcy_lite_skin_color','#df3550');
$rgba_theme_color = zigcy_lite_hex2rgba( $zigcy_lite_skin_color, 0.8 );

if( $zigcy_lite_skin_color != '#df3550' ){
    $custom_css .="
    .sm_search_form button#searchsubmit,span.wishlist-counter,.wishlist-dropdown p.buttons a,p.buttons a.wc-forward,.browse-category,a.slider-button,a.promo-price-title:hover::after,.store-mart-lite-button.btn1 a,a.store-mart-cat-prod-btn:hover::after,.store-mart-lite-cta-button a:hover::after,.plx_lat_prod_cat_section a.button.ajax_add_to_cart:hover:before, .plx_lat_prod_cat_section a.button.add_to_cart_button:hover:before,.site-footer ul li a:after,.store-mart-lite-footer-copyright a:after,.woocommerce span.onsale,.sml-blog-wrapp .blog-date,.widget-area h2.widget-title::after,.store-mart-lite-archive-navigation ul li.active a,.store-mart-lite-archive-navigation ul li a:hover,.store-mart-lite-archive-navigation .next a:hover:before, .store-mart-lite-archive-navigation .prev a:hover:before,.woocommerce button.button:hover,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,.woocommerce button.button.alt:hover,.woocommerce a.button.alt:hover,.sml-single-thumb-wrapp .blog-date,.owl-dots button.owl-dot.active span, .owl-dots .owl-dot:hover span,.owl-dots .owl-dot.active span:hover,a.edit:hover,button.menu-toggle,.widget.woocommerce.widget_product_search button:hover,.header-two span.wishlist-counter,.header-two .sm-cart-icon-wrap span.sm-cart-count,.plx_pro_cat_slider_section .woocommerce .type-product a.add_to_cart_button:hover,.form-submit input#submit:hover,.sm-cart-icon-wrap span.sm-cart-count
    {
        background-color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";

    }";

    $custom_css .="
    .sm_search_form button#searchsubmit,span.wishlist-counter,.wishlist-dropdown p.buttons a,p.buttons a.wc-forward,.browse-category,a.slider-button,a.promo-price-title:hover::after,.store-mart-lite-button.btn1 a,a.store-mart-cat-prod-btn:hover::after,.store-mart-lite-cta-button a:hover::after,.plx_lat_prod_cat_section a.button.ajax_add_to_cart:hover:before, .plx_lat_prod_cat_section a.button.add_to_cart_button:hover:before,.site-footer ul li a:after,.store-mart-lite-footer-copyright a:after,.woocommerce span.onsale,.sml-blog-wrapp .blog-date,.widget-area h2.widget-title::after,.store-mart-lite-archive-navigation ul li.active a,.store-mart-lite-archive-navigation ul li a:hover,.store-mart-lite-archive-navigation .next a:hover:before, .store-mart-lite-archive-navigation .prev a:hover:before,.woocommerce button.button:hover,.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,.woocommerce button.button.alt:hover,.woocommerce a.button.alt:hover,.sml-single-thumb-wrapp .blog-date,.owl-dots button.owl-dot.active span, .owl-dots .owl-dot:hover span,.owl-dots .owl-dot.active span:hover,a.edit:hover,button.menu-toggle,.widget.woocommerce.widget_product_search button:hover,.header-two span.wishlist-counter,.header-two .sm-cart-icon-wrap span.sm-cart-count,.plx_pro_cat_slider_section .woocommerce .type-product a.add_to_cart_button:hover,.form-submit input#submit:hover,.plx_pro_cat_slider_section .woocommerce a.added_to_cart:hover,.woocommerce a.button:hover
    {
        background-color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";

    }";

    $custom_css .="
    @media (max-width: 992px){
        .mob-side-nav-wrapp .menu-wrapp-outer .menu-primary-menu-container #primary-menu li.mob-menu-toggle > a{
           color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";
       }}";

       $custom_css .="
       .store-mart-lite-sc-icons a:hover,.user-logout-wrap.sm-icon-header a span:hover,.sm-wishlist-wrap.sm-icon-header a.sm-wishlist-ct-class:hover,.descr-box a:hover,.wishlist-dropdown p.buttons a:hover,.menu-primary-menu-container a:hover,.main-navigation ul > .menu-item-has-children:hover::after,.cart-icon-wrap:hover .sm-cart-wrap,.cart-icon-wrap:hover .sm-cart-icon-wrap span.icon,.woocommerce-mini-cart.cart_list.product_list_widget h4.item-title a:hover,.main-navigation ul > .menu-item-has-children:hover > a,.descr-box h4.product-title a:hover,.woocommerce-mini-cart.cart_list.product_list_widget h4.item-title a:hover,.browse-category-wrap .categorylist ul li a:hover,a.slider-button:hover,a.promo-price-title:hover,.store-mart-lite-button.btn1 a:hover,a.store-mart-cat-prod-btn:hover,h2.woocommerce-loop-product__title a:hover,.store-mart-lite-cta-button a:hover,.plx_lat_prod_cat_section span.price,.sml-lat-prod-detail-wrap .lat-prod-cat-info h2.prod-title a:hover,.plx_lat_prod_cat_section a.button.ajax_add_to_cart:hover, .plx_lat_prod_cat_section a.button.add_to_cart_button:hover,.woocommerce ul.products li.product .price,.sml-scrollup span:hover,.trail-item.trail-end.current span,.woocommerce span.onsale::after,.sml-blog-wrapp .content-wrapp-outer .cat-links a:hover,.sml-blog-wrapp .content-wrapp-outer .entry-title a:hover,.widget-area li a:hover,.tagcloud a:hover,.woocommerce .woocommerce-cart-form .cart .product-name a:hover,.single-meta-wrapp .author-wrapp a:hover, .single-meta-wrapp .cat-links a:hover,.single-meta-wrapp .cat-links a:hover,.prev-text h4 a:hover,.prev-text h2 a:hover,.single_post_pagination_wrapper .prev-link h2 a:before,.next-text h4 a:hover,.next-text h2 a:hover,.single_post_pagination_wrapper .next-link h2 a:before,.single-tag-wrapp span.tags-links a:hover,.sml-add-to-wishlist-wrap .add-to-wishlist-custom a:hover:before,.sml-add-to-wishlist-wrap .compare-wrap a:hover:before,.sml-quick-view-wrapp a:hover::after,span.posted_in a:hover,.woocommerce-MyAccount-content a,.woocommerce-MyAccount-navigation ul li a:hover,.woocommerce-MyAccount-content a.button:hover,.woocommerce-LostPassword.lost_password a,.header-two .store-mart-lite-header-icons a:hover,.header-two .sm-wishlist-wrap.sm-icon-header:hover span.wishlist-counter, .header-two .sm-cart-icon-wrap:hover span.sm-cart-count,.plx_blog_section .blog-date-inner .posted-day,.plx_blog_section .blog-date-inner .ym-wrapp,.plx_blog_section .blog-inner-content .blog-title a:hover,.plx_blog_section .content-read-more a:hover,.plx_blog_section .content-read-more a:hover:after,.type-product a.add_to_cart_button.button:hover,.store-mart-lite-footer-copyright a,.main-navigation ul > .menu-item-has-children:hover span::after,.main-navigation ul > li.menu-item-has-children:hover::after,.header-one .cart-icon-wrap:hover .sm-cart-wrap,.header-one .cart-icon-wrap:hover .sm-cart-icon-wrap span.icon,.store-mart-lite-section-footer-wrap-main ul li a:hover,.author-wrapp a:hover,.sml-blog-wrapp .content-wrapp-outer .cat-links a,.logged-in-as a:hover,.error-404.not-found p.search-not-exists,.error-404.not-found a,.no-results.not-found .search-submit:hover,.user-logout-wrap.sm-icon-header a:hover,.user-logout-wrap.sm-icon-header a:hover,.header-one .cart-icon-wrap:hover .sm-cart-icon-wrap span,.woocommerce div.product p.price,.sml-archive-wrapper del span.woocommerce-Price-amount.amount,.reply a:hover,small a:hover,.header-one .cart-icon-wrap:hover .sm-cart-icon-wrap span.lnr-cart,.plx_lat_prod_cat_section a.added_to_cart:hover,a.added_to_cart:hover
       {
        color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    p.buttons a.wc-forward:hover{
        background: " . zigcy_lite_sanitize_rgba($rgba_theme_color) . ";
    }";

    $custom_css .="
    .woocommerce span.onsale::after,.woocommerce span.onsale::before{
        border-left-color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .main-navigation .menu-primary-menu-container ul li ul.sub-menu li > a:before,.browse-category-wrap .categorylist ul li a:before,.sml-add-to-wishlist-wrap .compare-wrap span,.sml-add-to-wishlist-wrap .add-to-wishlist-custom a span,.sml-blog-wrapp .content-wrapp-inner .sml-read-more a,.widget-area form.search-form::after,.sml-quick-view-wrapp a span,.sml-add-to-wishlist-wrap .add-to-wishlist-custom a.add_to_wishlist.link-wishlist span,.sml-add-to-wishlist-wrap .add-to-wishlist-custom .yith-wcwl-wishlistexistsbrowse.show a span,.main-navigation .menu-primary-menu-container .menu.nav-menu a:before,.header-two .sml-search-icon:hover, .header-two .user-logout-wrap.sm-icon-header a:hover, .header-two .sm-wishlist-wrap.sm-icon-header a.sm-wishlist-ct-class:hover, .header-two .sm-cart-icon-wrap span.icon:hover,.plx_blog_section .content-read-more a:hover:before,.plx_pro_cat_slider_section li.slick-active button,.plx_prod_tab_cat_section .pwtb-catname-wrapper a:before,.main-navigation .menu-primary-menu-container .menu.nav-menu span:before,.sml-blog-wrapp .content-wrapp-outer .sm-read-more a span.hover,form.woocommerce-product-search:after, form.search-form:after, ins{
        background: " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .wishlist-dropdown p.buttons a,.plx_pro_cat_slider_section .woocommerce .type-product a.add_to_cart_button:hover,.plx_pro_cat_slider_section .woocommerce a.added_to_cart:hover,.wishlist-dropdown p.buttons a:hover{
        border: 1px solid " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .error-404.not-found a{
        border-bottom: 1px solid " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";
    
    $custom_css .="
    .cart-icon-wrap:hover .sm-cart-wrap span.sm-cart-text,.tagcloud a:hover,.plx_blog_section .blog-date-inner .posted-day
    {
        border-color: " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .sml-add-to-wishlist-wrap .compare-wrap span:after,.sml-add-to-wishlist-wrap .add-to-wishlist-custom span:after,.sml-quick-view-wrapp a span:after,.sml-add-to-wishlist-wrap .add-to-wishlist-custom span:after, .sml-add-to-wishlist-wrap .add-to-wishlist-custom .yith-wcwl-wishlistexistsbrowse.show a span:after{
        border-color: transparent transparent transparent " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .sml-scrollup span:before{
        -webkit-box-shadow: inset 0 0 0 35px " . sanitize_hex_color($zigcy_lite_skin_color) . ";
        box-shadow: inset 0 0 0 35px " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

    $custom_css .="
    .sml-scrollup span:hover:before{
        -webkit-box-shadow: inset 0 0 0 1px " . sanitize_hex_color($zigcy_lite_skin_color) . ";
        box-shadow: inset 0 0 0 1px " . sanitize_hex_color($zigcy_lite_skin_color) . ";
    }";

}


wp_add_inline_style( 'zigcy-lite-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'zigcy_lite_dynamic_style' );


if( !function_exists( 'zigcy_lite_sanitize_rgba' ) ) {

    function zigcy_lite_sanitize_rgba( $color ) {
        if ( empty( $color ) || is_array( $color ) )
            return 'rgba(0,0,0,0)';

        // If string does not start with 'rgba', then treat as hex
        // sanitize the hex color and finally convert hex to rgba
        if ( false === strpos( $color, 'rgba' ) ) {
            return sanitize_hex_color( $color );
        }

        // By now we know the string is formatted as an rgba color so we need to further sanitize it.
        $color = str_replace( ' ', '', $color );
        sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
        return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
    }

}

