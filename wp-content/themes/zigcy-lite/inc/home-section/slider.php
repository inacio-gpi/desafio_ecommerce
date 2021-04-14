<?php
/**
*
* Slider Section
*/
if( ! function_exists('zigcy_lite_slider_promo')){
	function zigcy_lite_slider_promo(){
    $slider_enable =  get_theme_mod('zigcy_lite_slider_enable','off');
    $sliderType = get_theme_mod('zigcy_lite_slider_type','off');
    if($slider_enable == 'on'){ ?>
    <section id="plx_slider_promo_section" class="plx_slider_promo_section">
      <div class = "store-mart-lite-slider-promo-banner">
        <?php if($sliderType =='cat'){ ?>
        <?php  zigcy_lite_slider_setting(); ?>
        <?php } ?>
        <?php if($sliderType =='ss3'){ ?>
        <?php  echo do_shortcode( get_theme_mod( 'zigcy_lite_smart_slider' ) );  ?>
        <?php } ?>
      </div>
    </section>
    <?php }
    
  }
} add_action( 'zigcy_lite_slider_promo_section', 'zigcy_lite_slider_promo');


/**
 * Main HomePage Section Function Area
 */

if ( ! function_exists( 'zigcy_lite_slider_setting' ) ) {
  /**
   * Display the banner slider
   * @since  1.0.0
   * @return void
   */
  function zigcy_lite_slider_setting() {
    
    $slider_options = get_theme_mod( 'zigcy_lite_slider_enable','off' );
    $zigcy_lite_slider_excerpts = get_theme_mod('zigcy_lite_slider_excerpts','30');

    if(!empty( $slider_options ) && $slider_options == 'on' ){
      ?>
      <div class="store-mart-lite-banner-wrapper">
        <div class="store-mart-lite-banner owl-carousel ">
          <?php
          $slider_cat_id = get_theme_mod( 'zigcy_lite_slider_category', '0' );
          $slider_args = array(
            'post_type' => 'post',
            'category_name' => $slider_cat_id,
          );
          
          $slider_query = new WP_Query( $slider_args );
          if( $slider_query->have_posts() ) { 
            while( $slider_query->have_posts() ) { 
              $slider_query->the_post();
              $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
              $image_path = $image_src[0];
              $attachment_id = zigcy_lite_get_attachment_id_from_url($image_path);
              $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
              ?>
              <div class="banner-slider">
                <img src="<?php echo esc_url($image_path); ?>" alt="<?php echo esc_attr($image_alt); ?>"/>
                <div class="banner-slider-info">
                  <h2 class="caption-title">                    
                    <?php
                    $slider_title = get_the_title();
                    echo '<span>'.esc_html($slider_title). ' '. '</span>';
                    ?>
                  </h2>
                  <div class="caption-content">
                    <?php echo zigcy_lite_get_excerpt_content(absint($zigcy_lite_slider_excerpts));?>
                  </div>
                  <div class="sml-slider-btn">
                   <a class="slider-button" href="<?php the_permalink(); ?>">
                    <?php echo esc_html('shop Now','zigcy-lite'); ?>
                  </a>  
                </div>
                
              </div>
            </div>
            <?php  } } wp_reset_postdata();   ?> 
          </div>
        </div>
        <?php 
        zigcy_lite_promo_area();
        ?>
        <?php
      }
    }
  }

/**
 * Store Villa Header Promo Function Area 
*/ 
if ( ! function_exists( 'zigcy_lite_promo_area' ) ) { 
  function zigcy_lite_promo_area() {        
   
    $promo_one_image = get_theme_mod( 'zigcy_lite_area_one_image');
    $promo_one_title = get_theme_mod( 'zigcy_lite_area_one_title');
    $promo_one_subtitle = get_theme_mod( 'zigcy_lite_area_one_subtitle');
    $promo_one_price_title = get_theme_mod( 'zigcy_lite_area_one_price_title');
    $promo_one_price_link = get_theme_mod( 'zigcy_lite_area_one_price_title_link');
    $attachment_id_one = zigcy_lite_get_attachment_id_from_url($promo_one_image);
    $image_alt_one = get_post_meta( $attachment_id_one, '_wp_attachment_image_alt', true);

    $promo_two_image = get_theme_mod( 'zigcy_lite_area_two_image');
    $promo_two_title = get_theme_mod( 'zigcy_lite_area_two_title');
    $promo_two_subtitle = get_theme_mod( 'zigcy_lite_area_two_subtitle');
    $promo_two_btn_text = get_theme_mod( 'zigcy_lite_area_two_button_text');
    $promo_two_btn_link = get_theme_mod( 'zigcy_lite_area_two_button_link');
    $attachment_id_two = zigcy_lite_get_attachment_id_from_url($promo_two_image);
    $image_alt_two = get_post_meta( $attachment_id_two, '_wp_attachment_image_alt',true);

    ?>
    <?php if($promo_one_image || $promo_one_title || $promo_one_subtitle || $promo_one_price_title || $promo_one_price_link || $promo_two_image || $promo_two_title || $promo_two_subtitle || $promo_two_btn_text || $promo_two_btn_link){
      ?>
      <div class="store-mart-lite-container">
        <div class="store-mart-lite-wrapper">
          <div class="promo-one-image">
            <a href="<?php the_permalink() ?>">
              <img src="<?php echo esc_url($promo_one_image); ?>" title="<?php the_title_attribute() ?>" alt="<?php echo esc_attr($image_alt_one); ?>" />
            </a>
          </div>
          <div class="store-mart-lite-promo-content-wrap">
            <?php if($promo_one_subtitle){ ?>
            <div class="promo-subtitle"><?php echo esc_html($promo_one_subtitle); ?></div>
            <?php } ?>
            <?php if($promo_one_title){ ?>
            <div class="promo-title"><?php echo esc_html($promo_one_title); ?></div>
            <?php } ?>
            <?php if($promo_one_price_link){ ?>
            <div class="sml-promo-price-btn">
              <a class = "promo-price-title" href="<?php echo esc_url($promo_one_price_link); ?>">
                <?php echo esc_html($promo_one_price_title); ?>
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="store-mart-lite-wrapper">
          <div class="promo-one-image">
            <a href="<?php the_permalink() ?>">
              <img src="<?php echo esc_url($promo_two_image); ?>" title="<?php the_title_attribute() ?>" alt="<?php echo esc_attr($image_alt_two); ?>" />
            </a>
          </div>
          <div class="store-mart-lite-promo-content-wrap">
            
            <?php if($promo_two_subtitle){ ?>
            <div class="promo-subtitle"><?php echo esc_html($promo_two_subtitle); ?></div>
            <?php } ?>
            <?php if($promo_two_title){ ?>
            <div class="promo-title"><?php echo esc_html($promo_two_title); ?></div>
            <?php } ?>
            <?php if($promo_two_btn_link){ ?>
            <div class="store-mart-lite-button btn1">
              <a href="<?php echo esc_url($promo_two_btn_link); ?>">
                <?php echo esc_html($promo_two_btn_text); ?>
              </a>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <?php } 
    }
  }
