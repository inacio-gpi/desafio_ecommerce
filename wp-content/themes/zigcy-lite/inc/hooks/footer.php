<?php  
/**
* Footer
*
* 
*/
add_action( 'zigcy_lite_footer', 'zigcy_lite_footer_widgets', 0 );

function zigcy_lite_footer_copyright_fn()
{
	$zigcy_lite_footer_copyright = get_theme_mod('zigcy_lite_footer_copyright');
	$zigcy_lite_footer_image = get_theme_mod('zigcy_lite_footer_image');

	
	$attachment_id = zigcy_lite_get_attachment_id_from_url($zigcy_lite_footer_image);
	$image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
	?>
	<div class = "store-mart-lite-footer-wrap ">
		<div class="store-mart-lite-container clearfix">
			<div class = "store-mart-lite-footer-copyright">
				<?php
				if( $zigcy_lite_footer_copyright && $zigcy_lite_footer_copyright!= "" ){
					echo wp_kses_post( $zigcy_lite_footer_copyright )." ";
				}?>
				<?php 
				$zigcy_lite_footer_credit_enable = get_theme_mod('zigcy_lite_footer_credit_enable','on');
				if( $zigcy_lite_footer_credit_enable == 'on' ){
					esc_html_e( 'WordPress Theme : ', 'zigcy-lite' );  ?><a href="<?php echo esc_url( 'https://accesspressthemes.com/wordpress-themes/zigcy-lite', 'zigcy-lite' ); ?>"><?php esc_html_e( 'Zigcy Lite', 'zigcy-lite' ); ?> </a>
					<?php } ?>
				</div>
				<?php if( $zigcy_lite_footer_image ){ ?>
				<div class = "store-mart-lite-footer-image-control"> 
					<img src="<?php echo esc_url($zigcy_lite_footer_image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php the_title_attribute(); ?>" />
				</div>
				<?php } ?>
			</div>
		</div>
		<?php 

	}
	add_action('zigcy_lite_footer_copyright_fn','zigcy_lite_footer_copyright_fn');
	?>
