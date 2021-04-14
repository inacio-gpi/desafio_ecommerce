<?php
/**
 * Zigcy Lite Theme Customizer
 *
 * @package Zigcy Lite
 */
/**
 * Custom Customizer Controls
 */
require get_template_directory() . '/inc/customizer/customizer-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zigcy_lite_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'zigcy_lite_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'zigcy_lite_customize_partial_blogdescription',
		) );
	}

	/*------------------------------------------------------------------------------------*/
	/**
	* Upgrade to Zigcy
	*/
	// Register custom section types.
	$wp_customize->register_section_type( 'zigcy_Lite_Customize_Section_Pro' );

	// Register sections.
	$wp_customize->add_section(
		new zigcy_Lite_Customize_Section_Pro(
			$wp_customize,
			'zigcy-lite',
			array(
				'title'    => esc_html__( 'Checkout Zigcy Pro Features', 'zigcy-lite' ),
				'pro_text' => esc_html__( 'Compare and Buy','zigcy-lite' ),
				'pro_url'  => admin_url( 'themes.php?page=welcome-page#free_vs_pro' ),
				'priority' => 0,
			)
		)
	);

	/**
	 * zigcy-lite-customizer
	 */
	require zigcy_lite_file_directory('/inc/customizer/zigcy-lite-customizer.php');

	// Register JS control types
	$wp_customize->register_control_type( 'zigcy_lite_Customizer_Buttonset_Control' );
}
add_action( 'customize_register', 'zigcy_lite_customize_register' );


add_action( 'wp_ajax_zigcy_lite_order_sections', 'zigcy_lite_order_sections' );
function zigcy_lite_order_sections() {

	if ( isset( $_POST['sections'] ) ) {

		set_theme_mod( 'zigcy_lite_frontpage_sections', $_POST['sections'] );
		echo 'succes';
	}
	wp_die(); // this is required to terminate immediately and return a proper response
}

if ( ! function_exists( 'zigcy_lite_get_sections_position' ) ) {
	function zigcy_lite_get_sections_position() {
		$defaults = array(
			'zigcy_lite_pro_cat_setting',
			'zigcy_lite_feat_prod_cat_setting',
			'zigcy_lite_cta_setting',
			'zigcy_lite_blog_setting',
			'zigcy_lite_lat_prod_cat_setting',
			'zigcy_lite_client_setting',
			'zigcy_lite_prod_cat_slider_setting',
			'zigcy_lite_prod_tab_cat_setting'
		);
		
		$sections = get_theme_mod( 'zigcy_lite_frontpage_sections', $defaults );
		return $sections;
	}
}

if ( ! function_exists( 'zigcy_lite_get_section_position' ) ) {
	function zigcy_lite_get_section_position( $key ) {
		$sections = zigcy_lite_get_sections_position();
		$position = array_search( $key, $sections );
		$return   = ( $position + 1 ) * 10;
		return $return;
	}
}


/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function zigcy_lite_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function zigcy_lite_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function zigcy_lite_customize_preview_js() {
	wp_enqueue_script( 'zigcy-lite-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'zigcy_lite_customize_preview_js' );

/**
* customizer control JS
*/
function zigcy_lite_customizer_control(){

	wp_enqueue_script( 'zigcy-lite-customizer-controller', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-control.js', array( 'customize-controls' ), '20151215', true );	
}
add_action('customize_controls_enqueue_scripts','zigcy_lite_customizer_control');


