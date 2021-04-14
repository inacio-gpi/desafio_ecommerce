<header id="masthead" class="site-header header-three">
	<div class="container">
		<div class="sml-top-head-wrap clearfix">
			<div class="store-mart-lite-top-left-header">
				<?php do_action('zigcy_lite_top_left_header'); ?>
			</div>
			<div class="store-mart-lite-top-right-header">
				<div class="sml-currency-menu">
					<nav id="site-navigation" class="main-navigation">
					    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
					      <?php
					      wp_nav_menu( array(
					       'link_before'    => '<span>',
					       'link_after'     => '</span>',
					       'theme_location' => 'menu-2',
					       'container_class'=> 'menu-currency-menu-container',
					       'menu_id'        => 'currency-menu',
					       'fallback_cb'    => 'false'

					     ) );
					     ?>
	   				</nav><!-- #site-navigation -->
				</div>
				<div class="sml-language-menu">
					<nav id="site-navigation" class="main-navigation">
					    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"></button>
					      <?php
					      wp_nav_menu( array(
					       'link_before'    => '<span>',
					       'link_after'     => '</span>',
					       'theme_location' => 'menu-3',
					       'container_class'=> 'menu-language-menu-container',
					       'menu_id'        => 'language-menu',
					       'fallback_cb'    => 'false'

					     ) );
					     ?>
	   				</nav><!-- #site-navigation -->
				</div>
			</div>
		</div>
	</div>
	<div class="sml-head-main-wrap">
		<div class="container">
			<div class ="store-mart-lite-logo-wrap clearfix">
				<?php do_action('zigcy_lite_header_logo'); ?>
				<div class="sml-product-search-wrap">
					<?php if ( class_exists( 'WooCommerce' ) ) {
						echo zigcy_lite_product_search(); // WPCS: sanitization ok.
					} ?>
				</div>
				<div class="store-mart-lite-login-wrap">
					<?php echo zigcy_lite_login_signup(); // WPCS: sanitization ok. ?>
					<?php echo zigcy_lite_wishlist_header_count(); // WPCS: sanitization ok. ?>
					<?php echo zigcy_lite_woo_cart_icon(); // WPCS: sanitization ok. ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="store-mart-lite-menu-wrap clearfix">
			<div class="store-mart-lite-cat">
            <?php do_action('zigcy_lite_product_cat_menu'); ?>
			</div>
			<div class="store-mart-lite-nav-menu">
				<?php do_action('zigcy_lite_main_navigation'); ?>
			</div>
			<div class="store-mart-lite-menu-text">
			<?php 
				$zigcy_lite_call_title = get_theme_mod('zigcy_lite_call_title');
			    $zigcy_lite_contact_no = get_theme_mod('zigcy_lite_contact_no');?>

			    <div class = "store-mart-lite-btn-header-left">
			    <?php 
			      if ( $zigcy_lite_call_title ) { ?>
				      <div class = "btn-header-call-title">
				        <?php echo esc_html($zigcy_lite_call_title); ?>
				      </div>
			      <?php } ?>
			      <?php 
			      if ( $zigcy_lite_contact_no ) {?>
				      <div class = "btn-header-contact-num">
				        <?php echo esc_html($zigcy_lite_contact_no); ?>
				      </div>
			      <?php } ?>
				</div>
			</div>
		</div>
	</div>
</header><!-- #masthead -->
