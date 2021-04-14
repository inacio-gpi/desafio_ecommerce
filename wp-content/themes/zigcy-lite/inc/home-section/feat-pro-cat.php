<?php
/**
*
* Feature Product Category Section
*/
if( ! function_exists('zigcy_lite_feat_prod_cat')){
    function zigcy_lite_feat_prod_cat(){
        $feat_prod_cat_enable =  get_theme_mod('zigcy_lite_feat_prod_cat_enable','off');
        if($feat_prod_cat_enable == 'on'){ ?>
        <section id="plx_feat_prod_cat_section" class="plx_feat_prod_cat_section">
          <?php  zigcy_lite_feat_prod_cat_setting(); ?>
      </section>
      <?php }
      
  }
} add_action( 'zigcy_lite_feat_prod_cat_section', 'zigcy_lite_feat_prod_cat');

/**
 * Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_feat_prod_cat_setting' ) ) { 
    function zigcy_lite_feat_prod_cat_setting() {
        $ft_product_title = get_theme_mod('zigcy_lite_feature_product_title');
        $ft_product_subtitle = get_theme_mod('zigcy_lite_feature_product_subtitle');
        $ft_pro_to_show = get_theme_mod('zigcy_lite_sml_feat_pro_per_page');
        $ft_show_rating = get_theme_mod('zigcy_lite_sml_feat_pro_show_rating');
        ?>
        <div class="container">
            <?php if($ft_product_title || $ft_product_subtitle){ ?>
            <div class="store-mart-lite-product-title-wrap">
                <?php if($ft_product_title){ ?>
                <h5 class="product-title"><?php echo esc_html($ft_product_title); ?></h5>
                <?php } ?>
                <?php if($ft_product_subtitle){ ?>
                <h3 class = "product-subtitle"><?php echo esc_html($ft_product_subtitle); ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
            <?php  $class = 'hide-rating'; ?>
            <div class="store-mart-lite-feat-prod-cat-wrap <?php if(!$ft_show_rating){echo esc_attr($class);} ?>">
                <?php 
                if(class_exists('WooCommerce')){
                    $zigcy_lite_feature_product_categories = get_theme_mod( 'zigcy_lite_feature_product_categories','0' );

                    if(($zigcy_lite_feature_product_categories) ){
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => $ft_pro_to_show,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $zigcy_lite_feature_product_categories
                                )
                            )
                        );

                        $feat_prod_cats_query = new WP_Query( $args );

                        if( $feat_prod_cats_query->have_posts() ) { ?>
                        <div class="woocommerce">
                            <ul class="products columns-4">
                                <?php  
                                while( $feat_prod_cats_query->have_posts() ) { 
                                    $feat_prod_cats_query->the_post();
                                    wc_get_template_part( 'content', 'product' );?>
                                    <?php  }?>
                                </ul>
                            </div>
                            <?php  } wp_reset_postdata();   ?> 
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
