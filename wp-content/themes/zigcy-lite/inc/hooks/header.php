<?php 

if ( !function_exists( 'zigcy_lite_top_left_header_callback' ) ) {

  function zigcy_lite_top_left_header_callback() {

    $zigcy_lite_top_header_text =  get_theme_mod('zigcy_lite_top_header_text');?>

    <div class = "store-mart-lite-top-header">
     <?php 
     if ( $zigcy_lite_top_header_text ) {?>
     <div class = "top-header-left-text">
       <?php echo esc_html($zigcy_lite_top_header_text); ?>
     </div>
     <?php } ?>
   </div>
   <?php 
 }
}
add_action( 'zigcy_lite_top_left_header','zigcy_lite_top_left_header_callback' );

/*******************************************************************************************************/

if ( !function_exists( 'zigcy_lite_top_right_header_callback' ) ) {

  function zigcy_lite_top_right_header_callback() {

    $zigcy_lite_call_title = get_theme_mod('zigcy_lite_call_title');
    $zigcy_lite_contact_no = get_theme_mod('zigcy_lite_contact_no');
    $zigcy_lite_header = get_theme_mod('zigcy_lite_header_type','layout1');?>

    <div class = "store-mart-lite-top-header-left">
     <?php if ($zigcy_lite_header == 'layout1'){ 
      if ( $zigcy_lite_call_title ) {?>
      <div class = "top-header-call-title">
        <?php echo esc_html($zigcy_lite_call_title); ?>
      </div>
      <?php } ?>

      <?php 
      if ( $zigcy_lite_contact_no ) {?>
      <div class = "top-header-contact-num">
        <i class="fa fa-phone"></i>
        <?php echo esc_html($zigcy_lite_contact_no); ?>
      </div>
      <?php } ?>
      <?php } ?>
      <div class="store-mart-lite-sc-icons">
        <?php do_action('zigcy_lite_social_icons'); ?>
      </div>
    </div>
    <?php 
  }
}
add_action( 'zigcy_lite_top_right_header','zigcy_lite_top_right_header_callback' );


/*******************************************************************************************************/

 /**
 * Site Logo
 */
 if ( !function_exists( 'zigcy_lite_header_logo_callback' ) ) {

  function zigcy_lite_header_logo_callback() {?>
  <div class="site-branding">
   <?php
   the_custom_logo();
   if ( is_front_page() && is_home() ) :
    ?>
    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php
  else :
    ?>
    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
    <?php
  endif;
  $zigcy_lite_description = get_bloginfo( 'description', 'display' );
  if ( $zigcy_lite_description || is_customize_preview() ) :
    ?>
    <p class="site-description"><?php echo $zigcy_lite_description; /* WPCS: xss ok. */ ?></p>
  <?php endif; ?>
</div><!-- .site-branding -->
<?php
}
}add_action( 'zigcy_lite_header_logo', 'zigcy_lite_header_logo_callback', 5 );


/*******************************************************************************************************/

/**
* Site Logo
*/
if( ! function_exists('zigcy_lite_main_navigation_callback') ){
  function zigcy_lite_main_navigation_callback(){
    ?>
    <nav id="site-navigation" class="main-navigation">
      <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
      <?php
      wp_nav_menu( array(
       'link_before'    => '<span>',
       'link_after'     => '</span>',
       'theme_location' => 'menu-1',
       'container_class'=> 'menu-primary-menu-container',
       'menu_id'        => 'primary-menu',

     ) );
     ?>
   </nav><!-- #site-navigation -->

   <?php
 }
} add_action( 'zigcy_lite_main_navigation', 'zigcy_lite_main_navigation_callback', 10 );


/*******************************************************************************************************/
/**
* Display login/Signup on header 
*
*/
if( ! function_exists('zigcy_lite_login_signup') ){
  function zigcy_lite_login_signup(){
    if ( ! class_exists( 'WooCommerce' ) )
      return;
    $woo_acc =get_permalink( get_option('woocommerce_myaccount_page_id'));
    if( is_user_logged_in() ){ ?>
    <div class="user-logout-wrap sm-icon-header">
     <a href="<?php echo esc_url($woo_acc.'/customer-logout'); ?>">

       <i class="lnr lnr-user" aria-hidden="true"></i>
       <span>
         <?php esc_html_e('Logout','zigcy-lite'); ?>
       </span>
     </a>
   </div>
   <?php 
 }else{ ?>
 <div class="user-logout-wrap sm-icon-header">
  <a href="<?php echo esc_url($woo_acc); ?>">
   
   <i class="lnr lnr-user" aria-hidden="true"></i>
   <span>
     <?php esc_html_e('Login/Signup','zigcy-lite'); ?>
   </span>
 </a>
</div>
<?php
}
}
}
/*******************************************************************************************************/
/**
 * Add browse Product categories in header
**/
add_action('zigcy_lite_product_cat_menu','zigcy_lite_add_browse_categories_nav_menu_items');
if ( ! function_exists( 'zigcy_lite_add_browse_categories_nav_menu_items' ) ) {
  function zigcy_lite_add_browse_categories_nav_menu_items() {

   if ( ! class_exists( 'WooCommerce' ) )
    return;

  $product_categories = get_terms( 'product_cat');
  $count = count($product_categories);                
  ?>
  <div class="browse-category-wrap">
      <button class="btn-transparent-toggle sml-cat-text-wrap">
        <i class="lnr lnr-menu"></i>
        <span>
        <?php esc_html_e('Browse Categories','zigcy-lite'); ?>
        </span>
      </button>
    <div class="categorylist">
     <ul>
      <?php 
      foreach( $product_categories as $product_category   ) {
        $cat_name = $product_category->name;
        $cat_id = $product_category->term_id;
        ?>
        <li><a href="<?php echo esc_url(get_term_link($cat_id));?>"><?php echo esc_html($cat_name); ?> </a></li>
        <?php } ?>

      </ul>
    </div>
  </div>
  <?php
}
}

/*******************************************************************************************************/

/**
* Display cart icon
*/ 
if(! function_exists('zigcy_lite_woo_cart_icon') ){
  function zigcy_lite_woo_cart_icon(){

    if( ! class_exists( 'WooCommerce' ) )
      return;

    if ( function_exists( 'zigcy_lite_woocommerce_header_cart' ) ) {
      ?>
      <div class="cart-icon-wrap">
        <?php zigcy_lite_woocommerce_header_cart(); ?>
      </div>
      <?php
    }

  }
}

/*******************************************************************************************************/

/**
* Search Icon
*/
if( ! function_exists('zigcy_lite_header_search_icon') ){
  function zigcy_lite_header_search_icon(){
    ?>
    <div class="sml-search-icon-wrap">
      <span class="sml-search-icon">
        <i class="lnr lnr-magnifier" aria-hidden="true"></i>
      </span>
      <div class="search-outer">
        <div class="search-form-wrap">
          <h3 class="search-label"><?php esc_html_e('Search','zigcy-lite'); ?></h3>
          <?php get_search_form(); ?>
          <a href="javascript:void(0)" class="btn-hide">
            <i class="lnr lnr-cross"></i>
          </a>
        </div>
        <div class="search-content"></div>
      </div>
    </div>
    <?php 
  }
}

/**
* Mobile navigation menu
*/

add_action('zigcy_lite_mob_nav','zigcy_lite_mob_nav');
if( ! function_exists('zigcy_lite_mob_nav')){
  function zigcy_lite_mob_nav(){
    ?>
    <div class="mob-nav-wrapper">
      <div class="mob-hiriz-wrapp">
        <button class="btn-transparent-toggle menu-toggle">
          <span class="lnr lnr-menu"></span>
        </button>
        <?php zigcy_lite_mob_nav_logo(); ?>
        <?php if(class_exists('WooCommerce')){
          zigcy_lite_woocommerce_header_cart();
        } ?>
      </div>
      <div class="mob-side-nav-wrapp">
        <div class="top-close-wrapp">
          <?php zigcy_lite_mob_nav_logo(); ?>
          <div class="mob-nav-close"><button class="btn-transparent" type="button"><span class="lnr lnr-cross"></span></button></div>
        </div>
        <div class="search-wrapp">
          <?php get_search_form(); ?>
        </div>
        <div class="menu-wrapp-outer">
          <?php 
          wp_nav_menu( array(
            'link_before'    => '<span>',
            'link_after'     => '</span>',
            'theme_location' => 'menu-1',
            'container_class'=> 'menu-primary-menu-container',
            'menu_id'        => 'primary-menu',
            'fallback_cb'    => 'false'

          ) );
          ?>
        </div>
      </div>
    </div>
    <?php 
  }
}

if( ! function_exists('zigcy_lite_mob_nav_logo') ){
  function zigcy_lite_mob_nav_logo(){
    $zigcy_lite_mobile_header_logo = get_theme_mod('zigcy_lite_mobile_header_logo');
    $image_id   = get_post_thumbnail_id();
    $alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
    $image_alt  = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

    if( $zigcy_lite_mobile_header_logo ){ ?>
    <a href="<?php echo esc_url(home_url('/'));?>">
      <img src="<?php echo esc_url($zigcy_lite_mobile_header_logo); ?>" alt="<?php echo esc_attr($alt);?>" >
    </a>
    <?php
  }else{
    the_custom_logo();
  }
}
}

/**
* Mobile View Logo
*
*/
if ( !function_exists( 'zigcy_header_logo_mob' ) ) {

  function zigcy_header_logo_mob() {
    global $zigcy_options;
    
    $header_logo        = get_theme_mod('custom_logo');
    $header_logo_mob    = get_theme_mod('zigcy_lite_mob_nav_logo');

    $logo_url = $header_logo;

    if( $header_logo_mob ){
      $logo_url = $header_logo_mob;
    }
    echo '<div class="site-logo-wrapp">';
    
    if ( !empty( $logo_url ) ) { ?>

    <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>">

    <?php
  } else {
    ?>
    
    <?php if ( is_front_page() && is_home() ) : ?>
      <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
    <?php else : ?>
      <p class="site-title"><?php bloginfo( 'name' ); ?></p>
      <?php
    endif;

    $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) :
      ?>
      <p class="site-description"><?php echo esc_html( $description ); ?></p>
      <?php
    endif;
    ?>
    
    <?php
  }
  echo '</div>';
}

}
