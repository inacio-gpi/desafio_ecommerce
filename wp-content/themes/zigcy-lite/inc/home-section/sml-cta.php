<?php
/**
*
* CTA Section
*/
if( ! function_exists('zigcy_lite_cta')){
	function zigcy_lite_cta(){
    $cta_enable =  get_theme_mod('zigcy_lite_cta_enable','off');
    if( $cta_enable == 'on' ){ ?>
    <section id="plx_cta_section" class="plx_cta_section">
      <div class="container">
        <?php zigcy_lite_cta_setting(); ?>
      </div>
    </section>
    <?php }

  }
} add_action( 'zigcy_lite_cta_section', 'zigcy_lite_cta');


/**
 * Store Villa Header Promo Function Area 
*/ 
if ( ! function_exists( 'zigcy_lite_cta_setting' ) ) { 
  function zigcy_lite_cta_setting() {        
    $cta_title = get_theme_mod( 'zigcy_lite_cta_title' );
    $cta_subtitle = get_theme_mod( 'zigcy_lite_cta_subtitle' );
    $cta_button_text = get_theme_mod( 'zigcy_lite_cta_button_text' );
    $cta_button_link = get_theme_mod( 'zigcy_lite_cta_button_link' );
    $cta_price = get_theme_mod('zigcy_lite_price_title');

    ?>
    <?php if( $cta_title || $cta_subtitle || $cta_button_text || $cta_button_link || $cta_price ){
     ?>
     <div class="store-mart-lite-cta-wrapper">
      <div class="store-mart-lite-cta-content-wrap">
        <?php if( $cta_title ){ ?>
        <div class="cta-title"><?php echo esc_html($cta_title); ?></div>
        <?php } ?>

        <?php if( $cta_subtitle ){ ?>
        <div class="cta-subtitle"><?php echo esc_html($cta_subtitle); ?></div>
        <?php } ?>

        <?php if( $cta_price ){ ?>
        <div class="cta-price-text"><?php echo esc_html($cta_price); ?></div>
        <?php } ?>

        <?php if( $cta_button_link ){ ?>
        <div class="store-mart-lite-cta-button ">
          <a href="<?php echo esc_url($cta_button_link); ?>">
            <?php echo esc_html($cta_button_text); ?>
          </a>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } 
  }
}
