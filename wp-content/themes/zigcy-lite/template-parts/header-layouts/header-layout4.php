<header id="masthead" class="site-header header-four">
	<div class="container">
		<div class ="store-mart-lite-logos-wrap clearfix">
			<?php do_action('zigcy_lite_header_logo'); ?>
			<div class="store-mart-lite-product-cat-menu-wrap">
				<?php do_action('zigcy_lite_main_navigation'); ?>
			</div>

			<div class="store-mart-lite-login-wrapper">
				<?php echo zigcy_lite_login_signup(); // WPCS: sanitization ok. ?>
				<?php echo zigcy_lite_woo_cart_icon(); // WPCS: sanitization ok. ?>
			</div>
		</div>

	</div>
	<div class="sml-cat-search-wrapper">
	<div class="container">
		<div class="store-mart-lite-category-main-wrapper clearfix">
			<div class="store-mart-lite-cat-wrpper">
            	<?php do_action('zigcy_lite_product_cat_menu'); ?>
			</div>
			<div class="sml-product-search-main-wrapper">
				<?php if ( class_exists( 'WooCommerce' ) ) {
					echo zigcy_lite_product_search(); // WPCS: sanitization ok.
				} ?>
			</div>
		</div>
		
	</div>
	</div>
	
</header><!-- #masthead -->