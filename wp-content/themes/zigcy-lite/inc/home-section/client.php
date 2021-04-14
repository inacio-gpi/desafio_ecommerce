<?php
/**
*
* Client Section
*/
if( ! function_exists('zigcy_lite_client_fn')){
	function zigcy_lite_client_fn(){
    $client_enable =  get_theme_mod('zigcy_lite_client_enable','off');
    if($client_enable == 'on'){ ?>
    <section id="plx_client_section" class="plx_client_section">
      <div class = "store-mart-lite-client-main">
        <?php  zigcy_lite_client_setting(); ?>
      </div>
    </section>
    <?php }
    
  }
} add_action( 'zigcy_lite_client_section', 'zigcy_lite_client_fn');


/**
 * Main HomePage Section Function Area
 */

if ( ! function_exists( 'zigcy_lite_client_setting' ) ) {
  /**
   * Display the blog
   * @since  1.0.0
   * @return void
   */
  function zigcy_lite_client_setting() {
    $clientCategories = get_theme_mod( 'zigcy_lite_client_categories','0');
    if($clientCategories ){
      ?>
      <div class="container">
        <div class="store-mart-lite-logo-wrapper owl-carousel">
          <?php
          $blog_args = array(
            'cat' => $clientCategories,
            'post_status'=>'publish',
          );
          $blog_query = new WP_Query( $blog_args );
          if( $blog_query->have_posts() ) { 
            while( $blog_query->have_posts() ) { 
              $blog_query->the_post();
              $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
              $image_path = $image_src[0];

              $image_id   = get_post_thumbnail_id();
              $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
              ?>
              <div class="client-img-wrapper">
                <img src="<?php echo esc_url($image_path); ?>" alt="<?php echo esc_attr($alt); ?>"/>
              </div>
              <?php  } } wp_reset_postdata();   ?> 
            </div>
          </div>
          <?php
        }
      }
    }

