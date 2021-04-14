<?php
/**
*
* Latest Product Category Section
*/
if( ! function_exists('zigcy_lite_lat_prod_cat')){
	function zigcy_lite_lat_prod_cat(){
        $lat_prod_cat_enable =  get_theme_mod('zigcy_lite_latest_cat_prod_enable','off');
        if($lat_prod_cat_enable == 'on'){ ?>
        <section id="plx_lat_prod_cat_section" class="plx_lat_prod_cat_section">
            <?php  zigcy_lite_lat_prod_cat_setting(); ?>
        </section>
        <?php }
        
    }
} add_action( 'zigcy_lite_lat_prod_cat_section', 'zigcy_lite_lat_prod_cat');

/**
* Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_lat_prod_cat_setting' ) ) { 
    function zigcy_lite_lat_prod_cat_setting() {
        $lat_product_title = get_theme_mod('zigcy_lite_latest_cat_prod_title');
        $lat_product_subtitle = get_theme_mod('zigcy_lite_latest_cat_prod_subtitle');
        $lat_product_rate = get_theme_mod('zigcy_lite_sml_lat_pro_show_rating');
        $lat_pro_to_show = get_theme_mod('zigcy_lite_sml_lat_pro_per_page');

        ?>
        <div class="container">
            <?php if($lat_product_title || $lat_product_subtitle){ ?>
            <div class="store-mart-lite-lat-pro-title-wrap">
                <?php if($lat_product_title){ ?>
                <h5 class="lat-pro-title"><?php echo esc_html($lat_product_title); ?></h5>
                <?php } ?>
                <?php if($lat_product_subtitle){ ?>
                <h3 class = "lat-pro-subtitle"><?php echo esc_html($lat_product_subtitle); ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if(class_exists('WooCommerce')){ ?>
            <div class="store-mart-lite-lat-prod-cat-wrap">
                <?php
                $zigcy_lite_latest_product_categories = get_theme_mod( 'zigcy_lite_latest_product_categories','0' );
                
                if(($zigcy_lite_latest_product_categories) ){
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => $lat_pro_to_show,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product_cat',
                                'field' => 'term_id',
                                'terms' => $zigcy_lite_latest_product_categories
                            )
                        )
                    );

                    $feat_prod_cats_query = new WP_Query( $args );

                    if( $feat_prod_cats_query->have_posts() ) { ?>
                    <div class="woocommerce">
                        <ul class="products columns-3">
                         <?php 
                         $i =0;
                         while( $feat_prod_cats_query->have_posts() ) { 
                            $i++;
                            $feat_prod_cats_query->the_post();
                            $image_src = wp_get_attachment_image_src( get_post_thumbnail_id() );
                            if($image_src){
                                $image_path = $image_src[0]; 
                            }
                            $class_last = '';
                            
                            if( $lat_pro_to_show > 3 && $i > 3 ){
                                $class_last = 'border-top';
                            }
                            ?>
                            <li class="product <?php echo esc_attr($class_last);?>">
                                <div class="sml-lat-prod-detail-wrap">
                                    <div class="latest-product-image">
                                        <?php woocommerce_template_loop_product_thumbnail(); ?>
                                    </div>
                                    <div class="lat-prod-cat-info">
                                      <h2 class="prod-title">                    
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <?php if( $lat_product_rate ){ ?>
                                    <?php woocommerce_template_loop_rating(); 
                                } ?>
                                <div class="product-price">
                                    <?php woocommerce_template_loop_price(); ?> 
                                    <div class="sml-latest-prod-add-to-cart">
                                        <?php woocommerce_template_loop_add_to_cart(); ?>    
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php  }?>
                    
                    <?php  } wp_reset_postdata();   ?> 
                </ul>
            </div>
            <?php 
        }else{?>
        <div class="no-product"><?php esc_html_e('No Category Selected','zigcy-lite'); ?> </div>
        <?php 
    }
}?>
</div>
</div>
<?php     
}
}


