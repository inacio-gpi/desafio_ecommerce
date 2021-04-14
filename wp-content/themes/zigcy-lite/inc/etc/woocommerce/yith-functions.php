<?php
/**
* Functins and Hooks for YITH plugins
* @package StoreMart
*
*/

/**
* Display Wishlist header icon and count
*/
if( ! function_exists('zigcy_lite_wishlist_header_count') ){
    function zigcy_lite_wishlist_header_count(){
    if( ! function_exists( 'YITH_WCWL' ) )
        return;

    $wishlist_count = YITH_WCWL()->count_products();
    ?>
    <div class="sm-wishlist-wrap sm-icon-header">
        <a href="<?php echo esc_url(home_url().'/wishlist'); ?>" title="<?php esc_attr_e('My Wishlist','zigcy-lite'); ?>" class = "sm-wishlist-ct-class">
            <i class="lnr lnr-heart" aria-hidden="true"></i>
            <span class="wishlist-counter">
            <?php echo absint($wishlist_count); ?>
            </span>
        </a>
        <?php zigcy_lite_wishlist_lists(); ?>
        
    </div>
    <?php
    }
}


/*******************************************************************************************************/
/**
* Wishlist dropdown lists for header
*/
if( ! function_exists('zigcy_lite_wishlist_lists') ){
    function zigcy_lite_wishlist_lists(){

        ?>
         <div id="sm-wishlist-loader" style="display:none;">
             <img src="<?php echo esc_url(zigcy_lite_THEME_URI. '/assets/images/spinner.gif');?>" alt="<?php the_title_attribute() ?>">
         </div>
        <?php
        $args  = array();

        if ( defined( 'YITH_WCWL_PREMIUM' ) && is_user_logged_in() ) {
            $args['wishlist_id'] = 'all';
        } else {
            $args['is_default'] = true;
        }
        $products = YITH_WCWL()->get_products( $args );

        $limit = 3;
        if ( ! defined( 'YITH_WCWL_PREMIUM' ) ) {
                $products = array_reverse($products);
            }
        ?>
        <div class="wishlist-dropdown product_list_widget">

            <?php if ( ! empty($products) ) : ?>

                <p class="sm-item-notice"><?php esc_html_e('Recently added item(s)', 'zigcy-lite'); ?></p>
                <ul class="cart-widget-products">
                    <?php
                    $i = 0;
                    foreach( $products as $item ) {
                        $i++;
                        if( $i > $limit) break;
                        if( function_exists( 'wc_get_product' ) ) {
                            $_product = wc_get_product( $item['prod_id'] );
                        }
                        else{
                            $_product = get_product( $item['prod_id'] );
                        }

                        if( ! $_product ) continue;

                        $product_name  = $_product->get_title();
                        $thumbnail     = $_product->get_image();
                        $product_price = WC()->cart->get_product_price( $_product );
                        ?>
                        <li class="cart-widget-prod">
                            <?php if ( ! $_product->is_visible() ) : ?>
                                <?php echo wp_kses(str_replace( array( 'http:', 'https:' ), '', $thumbnail ),array(
                                    'img' =>array(
                                        'href' => array(),
                                        'height' => array(),
                                        'src' => array(),
                                        'class' => array(),
                                        'width' => array(),
                                        'alt' => array(),
                                        'srcset' => array(),
                                        'sizes' => array()
                                    )
                                    )) . '&nbsp;'; ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $_product->get_permalink() ); ?>" class="product-mini-image">
                                    <?php echo wp_kses(str_replace( array( 'http:', 'https:' ), '', $thumbnail ), array(
                                        'img' => array(
                                            'href' => array(),
                                            'height' => array(),
                                            'src' => array(),
                                            'class' => array(),
                                            'width' => array(),
                                            'alt' => array(),
                                            'srcset' => array(),
                                            'sizes' => array()
                                        )
                                        )) . '&nbsp;'; ?>
                                </a>
                            <?php endif; ?>

                            <div class="descr-box">
                                <h4 class="product-title">
                                    <a href="<?php echo esc_url( $_product->get_permalink() ); ?>"><?php echo esc_html($product_name); ?></a>
                                </h4>
                                <?php echo wp_kses_post($product_price); ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>

                <p class="buttons">
                    <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="button btn-view-wishlist">
                        <span>
                            <?php esc_html_e( 'View Wishlist', 'zigcy-lite' ); ?>    
                        </span>
                        
                    </a>
                </p>

            <?php else : ?>

                <p class="empty"><?php esc_html_e( 'No products in the wishlist.', 'zigcy-lite' ); ?></p>

            <?php endif; ?>

        </div><!-- end product list -->
    <?php

    }
}

/**
* Ajax function to update wishlist products
*/
add_action( 'wp_ajax_zigcy_lite_update_wishlist_products', 'zigcy_lite_update_wishlist_products' );
add_action( 'wp_ajax_nopriv_zigcy_lite_update_wishlist_products', 'zigcy_lite_update_wishlist_products' );
if( ! function_exists('zigcy_lite_update_wishlist_products') ){
    function zigcy_lite_update_wishlist_products(){

        ob_start();

        $args  = array();
        if ( defined( 'YITH_WCWL_PREMIUM' ) && is_user_logged_in() ) {
            $args['wishlist_id'] = 'all';
        } else {
            $args['is_default'] = true;
        }
        $products = YITH_WCWL()->get_products( $args );
        $limit = 3;
        if ( ! defined( 'YITH_WCWL_PREMIUM' ) ) {
                $products = array_reverse($products);
            }
        ?>
        <div class="wishlist-dropdown product_list_widget">
            <?php if ( ! empty($products) ) : ?>
                <p class="sm-item-notice"><?php esc_html_e('Recently added item(s)', 'zigcy-lite'); ?></p>
                <ul class="cart-widget-products">
                    <?php
                    $i = 0;
                    foreach( $products as $item ) {
                        $i++;
                        if( $i > $limit) break;
                        if( function_exists( 'wc_get_product' ) ) {
                            $_product = wc_get_product( $item['prod_id'] );
                        }
                        else{
                            $_product = get_product( $item['prod_id'] );
                        }
                        if( ! $_product ) continue;
                        $product_name  = $_product->get_title();
                        $thumbnail     = $_product->get_image();
                        $product_price = WC()->cart->get_product_price( $_product );
                        ?>
                        <li class="cart-widget-prod">
                            <?php if ( ! $_product->is_visible() ) : ?>
                                <?php echo wp_kses(str_replace( array( 'http:', 'https:' ), '', $thumbnail ),array(
                                    'img' =>array(
                                        'href' => array(),
                                        'height' => array(),
                                        'src' => array(),
                                        'class' => array(),
                                        'width' => array(),
                                        'alt' => array(),
                                        'srcset' => array(),
                                        'sizes' => array()
                                    )
                                    )) . '&nbsp;'; ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url( $_product->get_permalink() ); ?>" class="product-mini-image">
                                    <?php echo wp_kses(str_replace( array( 'http:', 'https:' ), '', $thumbnail ), array(
                                        'img' => array(
                                            'href' => array(),
                                            'height' => array(),
                                            'src' => array(),
                                            'class' => array(),
                                            'width' => array(),
                                            'alt' => array(),
                                            'srcset' => array(),
                                            'sizes' => array()
                                        )
                                        )) . '&nbsp;'; ?>
                                </a>
                            <?php endif; ?>

                            <div class="descr-box">
                                <h4 class="product-title">
                                    <a href="<?php echo esc_url( $_product->get_permalink() ); ?>"><?php echo esc_html($product_name); ?></a>
                                </h4>
                                <?php echo wp_kses_post($product_price); ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <p class="buttons">
                     <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="button btn-view-wishlist">
                        <span>
                            <?php esc_html_e( 'View Wishlist', 'zigcy-lite' ); ?>    
                        </span>
                        
                    </a>
                </p>
            <?php else : ?>
                <p class="empty"><?php esc_html_e( 'No products in the wishlist.', 'zigcy-lite' ); ?></p>
            <?php endif; ?>
        </div><!-- end product list -->
    <?php
        $sv_html = ob_get_contents();
        ob_get_clean();
        echo $sv_html; // WPCS: XSS OK.
        die();
    }
}

/*
* Ajax function to updat wishlist count
*/
add_action( 'wp_ajax_zigcy_lite_update_wishlist_count', 'zigcy_lite_update_wishlist_count' );
add_action( 'wp_ajax_nopriv_zigcy_lite_update_wishlist_count', 'zigcy_lite_update_wishlist_count' );
if( ! function_exists('zigcy_lite_update_wishlist_count') ){
    function zigcy_lite_update_wishlist_count(){

        if( ! function_exists( 'YITH_WCWL' ) )
            return;

        wp_send_json( YITH_WCWL()->count_products() );
        
    }
}

/*******************************************************************************************************/
/**
 ** Product Wishlist Button Function
**/
if( ! function_exists('zigcy_lite_wishlist_products') ){
    function zigcy_lite_wishlist_products() { 

        if ( ! defined( 'YITH_WCWL' ) )      
            return;

      global $product;
      $url = add_query_arg( 'add_to_wishlist', get_the_ID() );
      $id = get_the_ID();
      $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?> 

        <div class="add-to-wishlist-custom add-to-wishlist-<?php echo esc_attr( $id ); ?>">
            
            <div class="yith-wcwl-add-button show" style="display:block">
                <a href="<?php echo esc_url( $url ); ?>" data-toggle="tooltip" data-placement="top" rel="nofollow" data-product-id="<?php echo esc_attr( $id ); ?>" data-product-type="simple" title="<?php esc_attr_e( 'Add to Wishlist', 'zigcy-lite' ); ?>" class="add_to_wishlist link-wishlist">
                    <span>
                    <?php esc_html_e( 'Add To Wishlist', 'zigcy-lite' ); ?>
                    </span>
                </a>
                <img style="visibility: hidden;" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/loading.gif'); ?>" class="ajax-loading" alt="<?php esc_attr_e('loading','zigcy-lite') ?>" width="16" height="16">

            </div>            

            <div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
                <a class="link-wishlist" href="<?php echo esc_url( $wishlist_url ); ?>">
                    <span>
                    <?php esc_html_e( 'View Wishlist', 'zigcy-lite' ); ?>
                    </span>
                    </a>
            </div>

            <div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
                <a  class="link-wishlist" href="<?php echo esc_url( $wishlist_url ); ?>">
                    <span>
                    <?php esc_html_e( 'Browse Wishlist', 'zigcy-lite' ); ?>
                    </span>
                </a>
            </div>

            <div class="clear"></div>
            <div class="yith-wcwl-wishlistaddresponse"></div>

        </div>
    <?php
    }
}

/*******************************************************************************************************/
//Display wishlist on shop page
function zigcy_lite_display_yith_wishlist_loop() {
    echo '<div class="sml-compare-wrapp">';
    zigcy_lite_wishlist_products();
    echo zigcy_lite_compare_url(); // WPCS: XSS OK.
    echo '</div>';
}


/*******************************************************************************************************/
//Compare URL
if(!function_exists('zigcy_lite_compare_url')){
    function zigcy_lite_compare_url($id = false){
        $html = '';
        if(class_exists('YITH_Woocompare')){
            if(!$id) $id = get_the_ID();
            $cp_link = str_replace('&', '&amp;',add_query_arg( array('action' => 'yith-woocompare-add-product','id' => $id )));
            $html = '<div class="compare-wrap"> <a href="'.esc_url($cp_link).'" class="sml-compare product-compare compare compare-link " data-product_id="'.get_the_ID().'"><span>'.esc_html__('Compare','zigcy-lite').'</span></a></div>';
        }
        return $html;
    }
}

/*******************************************************************************************************/
//Remove compare from single product page
if ( get_option('yith_woocompare_compare_button_in_product_page') == 'yes' ) {
    if(class_exists('YITH_Woocompare')){
        global $yith_woocompare;
        remove_action( 'woocommerce_single_product_summary', array($yith_woocompare->obj, 'add_compare_link'), 35 );
    }
}

//remove wishlist from single product page
add_filter('yith_wcwl_positions','zigcy_lite_single_wishlist');
function zigcy_lite_single_wishlist(){
    return false;
}

/*******************************************************************************************************/
/**
*  Add the Link to Quick View Function
**/
if( ! function_exists('zigcy_lite_quickview') ){

    function zigcy_lite_quickview(){
        if( ! defined( 'YITH_WCQV' ) )
            return;

        global $product;
        $quick_view = YITH_WCQV_Frontend();
        remove_action( 'woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
        $label = esc_html( get_option( 'yith-wcqv-button-label' ) );
        echo '<a href="#" class="link-quickview yith-wcqv-button" data-product_id="' . get_the_ID() . '">' . '<span>'.esc_html($label).'</span>' . '</a>';
    }
}