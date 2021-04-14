<?php
	/**
	 * Welcome Page Initiation
	*/

	include get_template_directory() . '/inc/welcome/welcome.php';

	/** Plugins **/
	$all_plugins = array(
		// *** Companion Plugins
		'companion_plugins' => array(

			
		),

		// *** Displays on Import Demo section
		'req_plugins' => array(
			'access-demo-importer' => array(
					'slug' 		=> 'access-demo-importer',
					'name' 		=> esc_html__('Access Demo Importer', 'zigcy-lite'),
					'filename' 	=>'access-demo-importer.php',
					'host_type' => 'wordpress', // Use either bundled, remote, wordpress
					'class' 	=> 'Access_Demo_Importer',
					'location' 	=> get_template_directory().'/inc/welcome/plugins/access-demo-importer.zip',
					'info' 		=> esc_html__('Access Demo Importer adds the feature to Import the Demo Conent with a single click.', 'zigcy-lite'),
			),

		),

		//Displays on Required Plugins tab
		'required_plugins' => array(
			// Free Plugins
			'free_plugins' => array(
				'elementor' => array(
					'slug' 		=> 'elementor',
					'filename' 	=> 'elementor.php',
					'function' 	=> 'elementor_load_plugin_textdomain',
				),

				'ap-companion' => array(
					'slug' 		=> 'ap-companion',
					'filename' 	=> 'ap-companion.php',
					'class' 	=> 'Ap_Companion',
				),
				
				'smart-slider-3' => array(
					'slug' 		=> 'smart-slider-3',
					'filename' 	=> 'smart-slider-3.php',
					'class' 	=> 'SmartSlider3',
				),

				'woocommerce' => array(
					'slug' 		=> 'woocommerce',
					'filename' 	=> 'woocommerce.php',
					'class' 	=> 'WooCommerce',
				),

				'yith-woocommerce-compare' => array(
					'slug' 		=> 'yith-woocommerce-compare',
					'filename' 	=> 'init.php',
					'class' 	=> 'YITH_Woocompare',
				),

				'yith-woocommerce-wishlist' => array(
					'slug' 		=> 'yith-woocommerce-wishlist',
					'filename' 	=> 'init.php',
					'class' 	=> 'YITH_WCWL',
				),

				'yith-woocommerce-quick-view' => array(
					'slug' 		=> 'yith-woocommerce-quick-view',
					'filename' 	=> 'init.php',
					'class' 	=> 'YITH_WCQV',
				)
				
			),
		),

	);

	$strings = array(
		// Welcome Page General Texts
		'welcome_menu_text' => esc_html__( 'Zigcy Setup', 'zigcy-lite' ),
		'theme_short_description' => esc_html__( 'The Zigcy Lite is full fledged Premium WordPress theme for companies. The theme comes with spectacular design and powerful features. It is a highly flexible theme that gives you full control to design and manage your dream website as per your wish.', 'zigcy-lite' ),

		// Plugin Action Texts
		'install_n_activate' 	=> esc_html__('Install and Activate', 'zigcy-lite'),
		'deactivate' 			=> esc_html__('Deactivate', 'zigcy-lite'),
		'activate' 				=> esc_html__('Activate', 'zigcy-lite'),

		// Getting Started Section
		'doc_heading' 		=> esc_html__('Step 1 - Documentation', 'zigcy-lite'),
		'doc_description' 	=> esc_html__('Read the Documentation and follow the instructions to manage the site , it helps you to set up the theme more easily and quickly. The Documentation is very easy with its pictorial  and well managed listed instructions. ', 'zigcy-lite'),
		'doc_read_now' 		=> esc_html__( 'Read Now', 'zigcy-lite' ),
		'cus_heading' 		=> esc_html__('Step 2 - Customizer Panel', 'zigcy-lite'),
		'cus_description' 	=> esc_html__('Using the Zigcy Lite customizer panel you can easily customize every aspect of the theme.', 'zigcy-lite'),
		'cus_read_now' 		=> esc_html__( 'Go to Customizer Panels', 'zigcy-lite' ),

		// Recommended Plugins Section
		'pro_plugin_title' 			=> esc_html__( 'Premium Plugins', 'zigcy-lite' ),
		'free_plugin_title' 		=> esc_html__( 'Free Plugins', 'zigcy-lite' ),

		

		// Demo Actions
		'activate_btn' 		=> esc_html__('Activate', 'zigcy-lite'),
		'installed_btn' 	=> esc_html__('Activated', 'zigcy-lite'),
		'demo_installing' 	=> esc_html__('Installing Demo', 'zigcy-lite'),
		'demo_installed' 	=> esc_html__('Demo Installed', 'zigcy-lite'),
		'demo_confirm' 		=> esc_html__('Are you sure to import demo content ?', 'zigcy-lite'),

		// Actions Required
		'req_plugin_info' => esc_html__('All these required plugins will be installed and activated while importing demo. Or you can choose to install and activate them manually. If you\'re not importing any of the demos, you must install and activate these plugins manually.', 'zigcy-lite' ),
		'req_plugins_installed' => esc_html__( 'All Recommended action has been successfully completed.', 'zigcy-lite' ),
		'customize_theme_btn' 	=> esc_html__( 'Customize Theme', 'zigcy-lite' ),
	);

	/**
	 * Initiating Welcome Page
	*/
	$my_theme_wc_page = new Zigcy_lite_Welcome( $all_plugins, $strings );


	