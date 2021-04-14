<?php 
$class = ' ';
if(!class_exists('WooCommerce')) {
	$class = 'no-wocommerce';
}?>
<header id="masthead" class="site-header header-one <?php echo esc_attr($class); ?>">
	<div class="store-mart-lite-top-header-wrap">
		<div class="store-mart-lite-header-icons">
			<?php do_action('zigcy_lite_top_left_header'); ?>
			<?php do_action('zigcy_lite_top_right_header'); ?>
		</div>
	</div>
	<div class="container">
		
		<div class ="store-mart-lite-logos">
			<?php do_action('zigcy_lite_header_logo'); ?>
			<?php if ( class_exists( 'WooCommerce' ) ) {
				echo zigcy_lite_product_search(); // WPCS: sanitization ok.
			} ?>
			<div class="store-mart-lite-login-wrap">
				<?php echo zigcy_lite_login_signup(); // WPCS: sanitization ok. ?>
				<?php echo zigcy_lite_wishlist_header_count(); // WPCS: sanitization ok. ?>
			</div>
			
		</div>
		<div class="store-mart-lite-product-cat">
			<?php do_action('zigcy_lite_product_cat_menu'); ?>
			<?php do_action('zigcy_lite_main_navigation'); ?>
			<?php echo zigcy_lite_woo_cart_icon(); // WPCS: sanitization ok. ?>
		</div>
	</div>
	
</header><!-- #masthead -->