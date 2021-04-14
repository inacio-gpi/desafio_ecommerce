<header id="masthead" class="site-header header-five">
	<div class="sml-top-hd-main-wrapper">
	<div class="sml-top-hd-main-text-wrapper">
		<div class="store-mart-lite-top-head-text clearfix">
		<?php 
			$zigcy_lite_top_header_text = get_theme_mod('zigcy_lite_top_header_text');
			$zigcy_lite_call_title = get_theme_mod('zigcy_lite_call_title');
		    $zigcy_lite_contact_no = get_theme_mod('zigcy_lite_contact_no');?>

		    <div class = "store-mart-lite-top-header-left">
		    <?php 
		      if ( $zigcy_lite_call_title ) { ?>
			      <div class = "top-header-call-title">
			        <?php echo esc_html($zigcy_lite_call_title); ?>
			      </div>
		      <?php } ?>
		      <?php 
		      if ( $zigcy_lite_contact_no ) {?>
			      <div class = "top-header-contact-num">
			        <?php echo esc_html($zigcy_lite_contact_no); ?>
			      </div>
		      <?php } ?>
			</div>
			<?php 
		    if ( $zigcy_lite_contact_no ) { ?>
			    <div class="store-mart-lite-top-medium-title">
				<?php echo esc_html($zigcy_lite_top_header_text); 
    			$btn_link = get_theme_mod( 'zigcy_lite_top_head_btn');
    			if($btn_link){ ?>
		            <a class = "header_btn-title" href="<?php echo esc_url($btn_link); ?>">
        				<?php esc_html_e('More Details','zigcy-lite'); ?>
		            </a>
            	<?php } ?>
				</div>
		    <?php } ?>

		    <div class="store-mart-lite-sc-icons">
		        <?php do_action('zigcy_lite_social_icons'); ?>
		    </div>
			
		</div>
		</div>
		<div class ="store-mart-lite-head-main-wrap clearfix">
			<?php do_action('zigcy_lite_header_logo'); ?>
			<div class="store-mart-lite-head-main-menu">
				<?php do_action('zigcy_lite_main_navigation'); ?>
			</div>

			<div class="store-mart-lite-head-login-wrapper">
				<?php echo zigcy_lite_login_signup(); // WPCS: sanitization ok. ?>
				<?php echo zigcy_lite_woo_cart_icon(); // WPCS: sanitization ok. ?>
			</div>
		</div>
	</div>

</header><!-- #masthead -->