<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Zigcy Lite
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
		<div id = "store-mart-lite-section-footer-wrap" class="store-mart-lite-section-footer-wrap-main clearfix">
		<?php $footer_layout = get_theme_mod('zigcy_lite_footer_width_type','layout1');
		if($footer_layout == 'layout1'){
			$class = 'footer-one';
		}else{
			$class = 'footer-two';
		} ?>
			<div class="container <?php echo $class; ?>" >
				<?php do_action( 'zigcy_lite_footer' );  ?>
				<?php do_action( 'zigcy_lite_footer_copyright_fn' ); ?>
			</div>
			
		</div>
		
	</footer><!-- #colophon -->
	<div class="sml-scrollup">
		<a href="#" class="back-to-top" >
            <span>
            	<i class="lnr lnr-chevron-up" aria-hidden="true"></i>
            </span>
        </a>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>


