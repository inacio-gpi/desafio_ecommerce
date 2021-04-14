<?php
/**
*
* Product Category Slider Section
*/
if( ! function_exists('zigcy_lite_prod_cat_slider')){
    function zigcy_lite_prod_cat_slider(){
        $prod_cat_slider_enable =  get_theme_mod('zigcy_lite_pro_cat_slider_enable','off');
        if($prod_cat_slider_enable == 'on'){ ?>
        <section id="plx_pro_cat_slider_section" class="plx_pro_cat_slider_section">
          <?php  zigcy_lite_prod_cat_slider_setting(); ?>
      </section>
      <?php }
      
  }
} add_action( 'zigcy_lite_prod_cat_slider_section', 'zigcy_lite_prod_cat_slider');

/**
 * Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_prod_cat_slider_setting' ) ) { 
    function zigcy_lite_prod_cat_slider_setting() {
        $sl_product_title = get_theme_mod('zigcy_lite_pro_cat_slider_title');
        $sl_product_subtitle = get_theme_mod('zigcy_lite_pro_cat_slider_subtitle');
        $no_of_prod = get_theme_mod('zigcy_lite_pro_cat_sl_prod');
        ?>
        <div class="container">
            <?php if($sl_product_title || $sl_product_subtitle){ ?>
            <div class="store-mart-lite-product-slider-title-wrap">
                <?php if($sl_product_title){ ?>
                <h5 class="product-title"><?php echo esc_html($sl_product_title); ?></h5>
                <?php } ?>
                <?php if($sl_product_subtitle){ ?>
                <h3 class = "product-subtitle"><?php echo esc_html($sl_product_subtitle); ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if(class_exists('WooCommerce')){ ?>
            <div class="store-mart-lite-prod-cat-slider-wrap">
                <?php 
                $pro_cat_slider = get_theme_mod( 'zigcy_lite_pro_cat_slider_categories','0' );
                
                if(($pro_cat_slider) ){
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => $no_of_prod,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $pro_cat_slider
                            )
                        )
                    );

                    $prod_cats_slider_query = new WP_Query( $args );?>
                    <div class="smlwbs-wrap woocommerce">
                        <?php 
                        if( $prod_cats_slider_query->have_posts() ) { ?>
                        <div class="sml-products products">
                            <?php while ( $prod_cats_slider_query->have_posts() ) : $prod_cats_slider_query->the_post(); ?>
                                
                                <div class="item-inner-wrapp">
                                    <div class="item-first-wrapper">
                                        
                                        <div <?php post_class(); ?> >
                                            <div class="item-img">
                                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                                            </div>
                                            <div class="item-info-wrapp">
                                                <?php 
                                                zigcy_lite_product_title();
                                                echo zigcy_lite_get_excerpt_content(80); 
                                                woocommerce_template_loop_price();
                                                woocommerce_template_loop_add_to_cart();
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>  <!-- .item-inner-wrapp --> 
                            <?php endwhile; ?>
                        </div>
                        <?php  } wp_reset_postdata();   ?> 
                        <?php 
                    }?>
                </div>
                <?php } ?>
            </div> 
        </div>
        <?php     
    }
}
