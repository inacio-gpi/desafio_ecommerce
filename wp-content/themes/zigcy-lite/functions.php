<?php
/**
 * Zigcy Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Zigcy Lite
 */


/** important constants **/
define( 'zigcy_lite_THEME_URI', get_template_directory_uri() );
define( 'zigcy_lite_THEME_DIR', get_template_directory() );

if ( ! function_exists( 'zigcy_lite_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zigcy_lite_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Zigcy Lite, use a find and replace
		 * to change 'zigcy-lite' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zigcy-lite', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'sm-blog-img', 390, 290, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'zigcy-lite' ),
			'menu-2' => esc_html__( 'Currency Menu', 'zigcy-lite' ),
			'menu-3' => esc_html__( 'Language Menu', 'zigcy-lite' ),

		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'zigcy_lite_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'zigcy_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zigcy_lite_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'zigcy_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'zigcy_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zigcy_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'zigcy-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zigcy-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'zigcy-lite' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'zigcy-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	$footer_widget_regions = apply_filters( 'zigcy_lite_footer_widget_regions', 5 );
	
	for ( $i = 1; $i <= intval( $footer_widget_regions ); $i++ ) {
		
		register_sidebar( array(
			/* translators: %d: Value*/
			'name' 				=> sprintf( __( 'Footer Widget Area %d', 'zigcy-lite' ), $i ),
			'id' 				=> sprintf( 'footer-%d', $i ),
			/* translators: %d: Value*/
			'description' 		=> sprintf( __( ' Add Widgetized Footer Region %d.', 'zigcy-lite' ), $i ),
			'before_widget' 	=> '<div id="%1$s" class="widget %2$s">',
			'after_widget' 		=> '</div>',
			'before_title' 		=> '<h2 class="widget-title">',
			'after_title' 		=> '</h2>',
		));
	}

}
add_action( 'widgets_init', 'zigcy_lite_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function zigcy_lite_scripts() {

	$query_args = array('family' => 'Poppins:100,200,300,400,500,600,700,800|Roboto:400,300,500,700');

  	wp_enqueue_style('google-fonts', add_query_arg($query_args, "//fonts.googleapis.com/css"));
  	
	wp_enqueue_style( 'zigcy-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'zigcy-lite-keyboard', get_template_directory_uri() . '/assets/css/keyboard.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/externals/font-awesome/css/font-awesome.min.css' );
    wp_enqueue_style( 'linearicons',zigcy_lite_THEME_URI . '/assets/externals/linearicons/style.css');
	wp_enqueue_script( 'SmoothScroll',zigcy_lite_THEME_URI.'/assets/externals/SmoothScroll/SmoothScroll.js',array(),'20151215', true );		

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme-default', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css' );
 	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), '20151215' );

    wp_enqueue_style( 'zigcy-lite-responsive', zigcy_lite_THEME_URI. '/assets/css/responsive.css' );    
	
    wp_enqueue_script( 'jarallax', get_template_directory_uri() . '/assets/js/jarallax.js', array( 'jquery' ), '1.1.3', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '20151215', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js',array('jquery'), '20151215' );

	wp_enqueue_script( 'zigcy-lite-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'zigcy-lite-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'zigcy-lite-yith', get_template_directory_uri() . '/assets/js/yith-wcwl-custom.js', array(), '20151215', true );
	wp_enqueue_script( 'zigcy-lite-scripts',zigcy_lite_THEME_URI.'/assets/js/custom.js',array(), '20151215', true );

	wp_register_script( 'vcma-ajax', zigcy_lite_THEME_URI . '/assets/js/sml-ajax.js', array( 'jquery' ), '20151215', true );
    wp_localize_script( 'vcma-ajax', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'vcma-ajax' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zigcy_lite_scripts' );

/**
* Enque admin scripts and styles
*/
function zigcy_lite_admin_scripts() {
	
    wp_enqueue_style( 'zigcy-lite-customizer-styles',zigcy_lite_THEME_URI. '/inc/customizer/assets/css/customizer-style.css');
    
    wp_register_script( 'zigcy-lite-customizer-scripts', zigcy_lite_THEME_URI. '/inc/customizer/assets/js/customizer-script.js',array('jquery','customize-controls','jquery-ui-sortable'), '20151215', false );
    wp_enqueue_style('zigcy-lite-spectrum-css',zigcy_lite_THEME_URI.'/inc/customizer/assets/spectrum/spectrum.css');
	wp_enqueue_script('zigcy-lite-spectrum-js', zigcy_lite_THEME_URI . '/inc/customizer/assets/spectrum/spectrum.js',array('jquery'));

	$zigcy_lite = array();
    $zigcy_lite['ajax_url'] = admin_url('admin-ajax.php');
    wp_localize_script( 'zigcy-lite-customizer-scripts', 'ZigcyLiteLoc', $zigcy_lite );

	wp_enqueue_script( 'zigcy-lite-customizer-scripts' );
}
add_action( 'customize_controls_enqueue_scripts', 'zigcy_lite_admin_scripts');


/**
* Load init files for theme
*/
require zigcy_lite_THEME_DIR . '/inc/init.php';

