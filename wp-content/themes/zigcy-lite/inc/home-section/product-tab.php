<?php
/**
*
* Latest Product Category Section
*/
if( ! function_exists('zigcy_lite_prod_tab_cat')){
    function zigcy_lite_prod_tab_cat(){
        $pro_tab_cat_enable =  get_theme_mod('zigcy_lite_prod_tab_cat_enable','off');
        if($pro_tab_cat_enable == 'on'){ ?>
        <section id="plx_prod_tab_cat_section" class="plx_prod_tab_cat_section">
            <?php  zigcy_lite_prod_tab_cat_setting();?> 
        </section>
        <?php }

    }
} add_action( 'zigcy_lite_prod_tab_cat_section', 'zigcy_lite_prod_tab_cat');

/**
* Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_prod_tab_cat_setting' ) ) { 
    function zigcy_lite_prod_tab_cat_setting() {
        $product_title = get_theme_mod('zigcy_lite_prod_tab_cat_title');
        $product_subtitle = get_theme_mod('zigcy_lite_prod_tab_cat_subtitle');
        $num_of_prod = get_theme_mod('zigcy_lite_prod_tab_no',4);

        ?>
        <div class="container">
            <?php if($product_title || $product_subtitle){ ?>
            <div class="store-mart-lite-prod-tab-title-wrap">
                <?php if($product_title){ ?>
                <h5 class="pro-tab-title"><?php echo esc_html($product_title); ?></h5>
                <?php } ?>
                <?php if($product_subtitle){ ?>
                <h3 class = "pro-tab-subtitle"><?php echo esc_html($product_subtitle); ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
            <?php if(class_exists('WooCommerce')){ ?>
            <div class="store-mart-lite-prod-tab-cat-wrap">
                <?php 
                $tab_cat = get_theme_mod( 'zigcy_lite_prod_tab_cat' );

                $category_array = explode(',',$tab_cat);
                $first_cat = $category_array[0];
                
                ?>

                <div class="pwtb-catname-wrapper">
                    <?php
                    foreach ( $category_array as $category ) :
                        $category_object = get_term( $category, 'product_cat' );
                        if ( !is_wp_error($category_object) ) {
                            ?>
                            <a href="#" class="pwtb-catname" id="pwtb-cat-<?php echo esc_attr( $category_object->term_id ); ?>" data-id="<?php echo esc_attr($category_object->term_id);?>" data-col='columns-4' data-slug="<?php echo esc_attr($category_object->slug); ?>">
                                <?php echo esc_html( $category_object->name); ?>
                            </a>
                            <?php
                        }
                    endforeach;

                    ?>
                </div>
                <div class="pwtb-catposts-wrapper woocommerce ">
                    <div class="ajax-loader disabled">
                        <img src="<?php echo esc_url(zigcy_lite_THEME_URI). '/assets/images/spinner.gif'?>" alt="<?php esc_attr_e('loader','zigcy-lite')?>">
                    </div>
                    <?php
                    $category_object = get_term( $tab_cat, 'product_cat' );
                    if ((!is_wp_error( $category_object )) && ($category_object)){
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => $num_of_prod,
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $category_object->term_id
                                )
                            )
                        );

                        $feat_prod_tab_query = new WP_Query( $args );
                        ?>
                        <?php if ( $feat_prod_tab_query->have_posts() ) : ?>
                         <ul class="pwtb-inner-catposts-wrapper products columns-4 cat-posts-<?php echo esc_attr( $category_object->term_id ); ?> sm-woo-tab-cat-wrapper <?php echo esc_attr($category_object->slug);?> ">
                            <?php while ( $feat_prod_tab_query->have_posts() ) : $feat_prod_tab_query->the_post(); ?>

                                <?php wc_get_template_part( 'content', 'product' ); ?>

                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php
                }

                wp_reset_postdata();?>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php     
}
}


