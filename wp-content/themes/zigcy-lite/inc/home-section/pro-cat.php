<?php
/**
*
* Slider Section
*/
if( ! function_exists('zigcy_lite_pro_cat')){
	function zigcy_lite_pro_cat(){
		$slider_enable =  get_theme_mod('zigcy_lite_pro_cat_enable','off');
		if($slider_enable == 'on'){ ?>
		<section id="plx_prod_cat_section" class="plx_prod_cat_section">
			<?php  zigcy_lite_pro_cat_setting(); ?>
		</section>
		<?php }
		
	}
} add_action( 'zigcy_lite_pro_cat_section', 'zigcy_lite_pro_cat');

/**
 * Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_pro_cat_setting' ) ) { 
	function zigcy_lite_pro_cat_setting() { 
		if(! class_exists('Woocommerce')) {
			return;
		}?>
		<div class = "container">
			<div class="store-mart-lite-cat-pro-wrap">
				<?php      
				
				$pro_cat_num = array('one','two','three');

				foreach ($pro_cat_num as $zigcy_pro_cat) {

					$zigcy_lite_product_category = get_theme_mod( 'zigcy_lite_product_categories_'.$zigcy_pro_cat,'0' );

					$zigcy_term = get_term_by( 'id', $zigcy_lite_product_category, 'product_cat' );
					$zigcy_thumbnail_id = get_term_meta( $zigcy_lite_product_category, 'thumbnail_id',true);
					$zigcy_image = wp_get_attachment_url( $zigcy_thumbnail_id );
					$zigcy_category_link = get_category_link( $zigcy_lite_product_category );

					if(!empty($zigcy_lite_product_category)){
						?>
						
						<div class="zigcy-baby-prod-cat-wrapper store-mart-lite-prod-cat-wrapper-<?php echo esc_attr($zigcy_pro_cat);?>">
							<?php if($zigcy_term){ ?>
							<div class="store-mart-lite-cat-prod-content">
								<div class="store-mart-lite-cat-prod-title">
									<?php echo esc_html($zigcy_term->name); ?>
								</div>
								<div class="store-mart-lite-cat-prod-description">
									<?php echo esc_html($zigcy_term->description); ?>
								</div>
								<div class="store-mart-lite-cat-prod-btn">
									<a class="store-mart-cat-prod-btn" href="<?php echo esc_url( $zigcy_category_link ); ?>">
										<?php echo esc_html('See Collection','zigcy-lite'); ?>
									</a>
								</div>
							</div>
							<div class="store-mart-lite-cat-prod-image">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo esc_url($zigcy_image); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>" />
								</a>
							</div>
							<?php } ?>
						</div>
						<?php
					}

				}?>
			</div>
		</div>
		<?php 
	}
}
