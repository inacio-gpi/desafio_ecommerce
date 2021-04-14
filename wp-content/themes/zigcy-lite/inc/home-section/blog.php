<?php
/**
*
* Blog Section
*/
if( ! function_exists('zigcy_lite_blog_fn')){
	function zigcy_lite_blog_fn(){
    $blog_enable =  get_theme_mod('zigcy_lite_blog_enable','off');
    if($blog_enable == 'on'){ ?>
    <section id="plx_blog_section" class="plx_blog_section">
      <div class = "store-mart-lite-blog-main">
        <?php  zigcy_lite_blog_setting(); ?>
      </div>
    </section>
    <?php }
    
  }
} add_action( 'zigcy_lite_blog_section', 'zigcy_lite_blog_fn');


/**
 * Main HomePage Section Function Area
 */

if ( ! function_exists( 'zigcy_lite_blog_setting' ) ) {
  /**
   * Display the blog
   * @since  1.0.0
   * @return void
   */
  function zigcy_lite_blog_setting() {
    
    $blogtitle = get_theme_mod( 'zigcy_lite_blog_title');
    $blogsubTitle = get_theme_mod( 'zigcy_lite_blog_subtitle');
    $blogCategories = get_theme_mod( 'zigcy_lite_blog_categories','0');
    $excerptLength = get_theme_mod( 'zigcy_lite_post_excerpt_length','200');

    ?>
    <div class="container">
      <div class="store-mart-lite-blog-wrapper">
        <?php if($blogtitle || $blogsubTitle){?>
        <div class="section-title-sub-wrap ">
          <?php if($blogtitle){ ?>
          <h5 class="blog-title"><?php echo esc_html($blogtitle); ?></h5>
          <?php } ?>
          <?php if($blogsubTitle) { ?>
          <h3 class = "blog-subtitle"><?php echo esc_html($blogsubTitle); ?></h3>
          <?php } ?>
        </div>
        <?php } 
        if($blogCategories){?>
        <div class="store-mart-lite-blog-content clear ">
          <?php
          $blog_args = array(
            'cat' => $blogCategories,
            'posts_per_page' => 3,
            'post_status'=>'publish',
          );
          $blog_query = new WP_Query( $blog_args );
          if( $blog_query->have_posts() ) { 
            while( $blog_query->have_posts() ) { 
              $blog_query->the_post();
              $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(),'sm-blog-img');
              $image_path = $image_src[0];

              $image_id   = get_post_thumbnail_id();
              $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
              ?>
              <div class="blog-inner-content">
                <div class="blog-img-wrapper">
                  <img src="<?php echo esc_url($image_path); ?>" alt="<?php echo esc_attr($alt); ?>"/>
                </div>
                <div class="blog-inner-content-wrapper">
                  <?php 
                  $date_enable =  get_theme_mod('zigcy_lite_blog_date_enable','on');
                  if($date_enable == 'on'){ ?>
                 <div class="post-meta-wrapp">
                  <?php do_action('zigcy_lite_post_meta'); ?>  
                </div>
                <?php } ?>
                <h2 class="blog-title">
                  <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                </h2>
                
                <div class="blog-excerpt">
                  <?php echo zigcy_lite_blog_excerpt($excerptLength); ?> 
                </div>
              </div>
            </div>
            <?php  } } wp_reset_postdata();   ?> 
          </div>
          <?php } ?>
        </div>
      </div>
      <?php
    }
  }

