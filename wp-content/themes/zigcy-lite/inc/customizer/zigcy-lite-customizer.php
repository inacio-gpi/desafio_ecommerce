<?php
/**
 * Zigcy Lite Customizer
 *
 * @package Zigcy Lite
*/

$zigcy_lite_cat_lists   = zigcy_lite_cat_lists(); 
$zigcy_lite_prod_cats = zigcy_lite_product_cats();
$cat_list = zigcy_lite_category_lists();

$wp_customize->add_panel('zigcy_lite_header_setting', array(
 'priority'         =>      2,
 'title'            =>      esc_html__( 'Header Setting', 'zigcy-lite' ),
 'description'      =>      esc_html__( 'This allows to edit the header', 'zigcy-lite' ),
));

$wp_customize->add_panel('zigcy_lite_general_setting', array(
 'priority'         =>      4,
 'title'            =>      esc_html__( 'General Setting', 'zigcy-lite' ),
));

$wp_customize->get_section('title_tagline')->panel = 'zigcy_lite_general_setting';

$wp_customize->get_section('colors')->panel = 'zigcy_lite_general_setting';

$wp_customize->get_section('background_image')->panel = 'zigcy_lite_general_setting';

$wp_customize->get_section('static_front_page')->panel = 'zigcy_lite_general_setting';

$wp_customize->get_section('colors')->title = esc_html__( 'Colors', 'zigcy-lite' );


$wp_customize->add_section( 'zigcy_lite_top_header', array(
  'title'           =>      esc_html__('Top Header', 'zigcy-lite'),
  'priority'        =>      '1',
  'panel' => 'zigcy_lite_header_setting'
));

$wp_customize->add_setting( 'zigcy_lite_top_header_text', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_top_header_text', array(
  'label'     => esc_html__('Top Left Header Text','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_top_header',
));

$wp_customize->add_setting( 'zigcy_lite_call_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_call_title', array(
  'label'     => esc_html__('Call Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_top_header',
));

$wp_customize->add_setting( 'zigcy_lite_contact_no', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_contact_no', array(
  'label'     => esc_html__('Call','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_top_header',
));

$wp_customize->add_setting('zigcy_lite_top_head_btn', array(
  'default' => '',
  'sanitize_callback' => 'zigcy_lite_sanitize_url' 
));

$wp_customize->add_control('zigcy_lite_top_head_btn',array(
  'type' => 'text',
  'label' => esc_html__('Button Url', 'zigcy-lite'),
  'section' => 'zigcy_lite_top_header'
));

  //header layout
$wp_customize->add_section( 'zigcy_lite_header_layouts', array(
  'title'           =>      esc_html__('Header Layout', 'zigcy-lite'),
  'priority'        =>      '1',
  'panel' => 'zigcy_lite_header_setting'
));

/** header Type **/
$wp_customize->add_setting( 'zigcy_lite_header_type',array(
  'sanitize_callback' => 'zigcy_layout_sanitize',
  'default'           => 'layout1'
));

$wp_customize->add_control( 'zigcy_lite_header_type', array(
  'label'     => esc_html__('Choose Header', 'zigcy-lite'),
  'section'   => 'zigcy_lite_header_layouts',
  'type'      => 'radio',
  'priority'  => 2,
  'choices'   => array(
    'layout1'     => esc_html__('Layout One', 'zigcy-lite'),
    'layout2'     => esc_html__('Layout Two', 'zigcy-lite'),
    'layout3'     => esc_html__('Layout Three', 'zigcy-lite'),
    'layout4'     => esc_html__('Layout Four', 'zigcy-lite'),
    'layout5'     => esc_html__('Layout Five', 'zigcy-lite'),
  )
));

$wp_customize->add_section( 'zigcy_lite_social_icons', array(
  'title'           =>      esc_html__('Social Icons', 'zigcy-lite'),
  'priority'        =>      '3',
  'panel' => 'zigcy_lite_general_setting'
));

  // show social icons 
$wp_customize->add_setting( 'zigcy_lite_social_icons_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_social_icons_enable', array(
  'label'         => esc_html__( 'Show Hide Social Icons', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_social_icons',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

  // open icons in new tab
$wp_customize->add_setting( 'zigcy_lite_social_new_tab', array(
 'sanitize_callback' => 'zigcy_lite_sanitize_checkbox'
));
$wp_customize->add_control( 'zigcy_lite_social_new_tab', array(
  'section'      => 'zigcy_lite_social_icons',
  'label'        => esc_html__( 'Open links in new tab', 'zigcy-lite' ),
  'type'         => 'checkbox'    
));

$social_icons = array('facebook','twitter','youtube','pinterest','instagram','linkedin','googleplus');
foreach( $social_icons as $social_icon){

  $wp_customize->add_setting( 'zigcy_lite_'.$social_icon.'_url', array(
    'sanitize_callback' => 'zigcy_lite_sanitize_url'
  ));
  $wp_customize->add_control( 'zigcy_lite_'.$social_icon.'_url', array(
    'section'       => 'zigcy_lite_social_icons',
    'label'         => esc_html($social_icon),
    'type'          => 'url'
  ));
}


  //adding image breadcrumb in general setting panel
$wp_customize->add_setting( 'zigcy_lite_breadcrumb_image_enable', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_breadcrumb_image_enable', array(
  'label'         => esc_html__( 'Show Hide Inner Page Header Image', 'zigcy-lite' ),
  'section'       => 'header_image',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_section('header_image',array(
  'panel'     => 'zigcy_lite_general_setting',
  'title'     => esc_html__('Inner Page Header Image','zigcy-lite'),
));

$wp_customize->add_panel('zigcy_lite_home_setting', array(
 'priority'         =>      10,
 'title'            =>      esc_html__( 'Home Setting', 'zigcy-lite' ),
 'description'      =>      esc_html__( 'This allows to edit the home section', 'zigcy-lite' ),
));


  //slider section
$wp_customize->add_section( 'zigcy_lite_slider_promo_setting', array(
  'title'           =>      esc_html__('Slider Section', 'zigcy-lite'),
  'priority'        =>      '3',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_slider_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_slider_enable', array(
  'label'         => esc_html__( 'Show Hide Slider Section', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_slider_promo_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

/** Slider Type **/
$wp_customize->add_setting( 'zigcy_lite_slider_type',array(
  'sanitize_callback' => 'esc_attr',
  'default'           => 'cat'
));

$wp_customize->add_control( 'zigcy_lite_slider_type', array(
  'label'     => esc_html__('Slider Type', 'zigcy-lite'),
  'section'   => 'zigcy_lite_slider_promo_setting',
  'type'      => 'radio',
  'priority'  => 2,
  'choices'   => array(
    'cat'     => esc_html__('Category Slider', 'zigcy-lite'),
    'ss3'     => esc_html__('Smart Slider', 'zigcy-lite'),
  )
));

$wp_customize->add_setting( 'zigcy_lite_slider_category',array(
  'sanitize_callback' => 'sanitize_text_field',
  'default'           => 0,
));
$wp_customize->add_control( 'zigcy_lite_slider_category', array(
  'label'           => esc_html__(' Slider Category', 'zigcy-lite'),
  'section'         => 'zigcy_lite_slider_promo_setting',
  'type'            => 'select',
  'choices'         => $zigcy_lite_cat_lists
));

$wp_customize->add_setting('zigcy_lite_slider_excerpts', array(
  'default'=> 30,
  'sanitize_callback'=>'absint'
));
$wp_customize->add_control('zigcy_lite_slider_excerpts',array(
  'section'=>'zigcy_lite_slider_promo_setting',
  'label'=> esc_html__('Slider Excerpt Length', 'zigcy-lite'),
  'description' => esc_html__('Enter word limit for excerpt length', 'zigcy-lite'),
  'type'=>'number'
));

  //smart slider
$wp_customize->add_setting( 'zigcy_lite_smart_slider',array(
  'sanitize_callback' => 'wp_kses_post',
));
$wp_customize->add_control( 'zigcy_lite_smart_slider', array(
  'label'           => esc_html__('Enter smart slider shortcode', 'zigcy-lite'),
  'section'         => 'zigcy_lite_slider_promo_setting',
  'type'            => 'text',
));

  //promo section

$wp_customize->add_setting( 'zigcy_lite_area_one_image', array(
  'default'       =>      '',
        'sanitize_callback' => 'zigcy_lite_sanitize_url' // done
      ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zigcy_lite_area_one_image', array(
  'section'       =>      'zigcy_lite_slider_promo_setting',
  'label'         =>      esc_html__('Upload Promo One Image', 'zigcy-lite'),
  'type'          =>      'image',
)));

$wp_customize->add_setting('zigcy_lite_area_one_title', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field'  // done
    ));

$wp_customize->add_control('zigcy_lite_area_one_title',array(
  'type' => 'text',
  'label' => esc_html__('Promo One Title', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

$wp_customize->add_setting('zigcy_lite_area_one_subtitle', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field'  // done
    ));

$wp_customize->add_control('zigcy_lite_area_one_subtitle',array(
  'type' => 'text',
  'label' => esc_html__('Promo One SubTitle', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

$wp_customize->add_setting('zigcy_lite_area_one_price_title', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field'  // done
    ));

$wp_customize->add_control('zigcy_lite_area_one_price_title',array(
  'type' => 'text',
  'label' => esc_html__('Promo One Price Title', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

$wp_customize->add_setting('zigcy_lite_area_one_price_title_link', array(
  'default' => '',
  'sanitize_callback' => 'zigcy_lite_sanitize_url'  // done
));

$wp_customize->add_control('zigcy_lite_area_one_price_title_link',array(
  'type' => 'text',
  'label' => esc_html__('Promo One Price Url', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

$wp_customize->add_setting( 'zigcy_lite_area_two_image', array(
  'default'       =>      '',
      'sanitize_callback' => 'zigcy_lite_sanitize_url' // done
    ));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zigcy_lite_area_two_image', array(
  'section'       =>      'zigcy_lite_slider_promo_setting',
  'label'         =>      esc_html__('Upload Promo Two Image', 'zigcy-lite'),
  'type'          =>      'image',
)));

$wp_customize->add_setting('zigcy_lite_area_two_title', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field'  // done
    ));

$wp_customize->add_control('zigcy_lite_area_two_title',array(
  'type' => 'text',
  'label' => esc_html__('Promo Two Title', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

$wp_customize->add_setting('zigcy_lite_area_two_subtitle', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field'  // done
    ));

$wp_customize->add_control('zigcy_lite_area_two_subtitle',array(
  'type' => 'text',
  'label' => esc_html__('Promo Two SubTitle', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));    

$wp_customize->add_setting('zigcy_lite_area_two_button_text', array(
  'default' => '',
      'sanitize_callback' => 'sanitize_text_field',  // done
    ));

$wp_customize->add_control('zigcy_lite_area_two_button_text',array(
  'type' => 'text',
  'label' => esc_html__('Promo Two Button Text', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting',
));

$wp_customize->add_setting('zigcy_lite_area_two_button_link', array(
  'default' => '',
      'sanitize_callback' => 'zigcy_lite_sanitize_url',  // done
    ));

$wp_customize->add_control('zigcy_lite_area_two_button_link',array(
  'type' => 'text',
  'label' => esc_html__('Promo Two Button Link', 'zigcy-lite'),
  'section' => 'zigcy_lite_slider_promo_setting'
));

  //Product Category section

$wp_customize->add_section( 'zigcy_lite_pro_cat_setting', array(
  'title'           =>      esc_html__('Product Category Section', 'zigcy-lite'),
  'priority'        =>      '3',
  'panel' => 'zigcy_lite_home_setting'
));

if(class_exists('WooCommerce')){

  $wp_customize->add_setting( 'zigcy_lite_pro_cat_enable', array(
    'default'             => 'off',
    'sanitize_callback'   => 'zigcy_lite_sanitize_text',
  ) );

  $wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_pro_cat_enable', array(
    'label'         => esc_html__( 'Show Hide Product Category Section', 'zigcy-lite' ),
    'section'       => 'zigcy_lite_pro_cat_setting',
    'priority'        => 1,
    'choices'         => array(
      'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
      'off'       => esc_html__( 'No', 'zigcy-lite' ),
    )
  ) ) );

  $pro_cat_num = array('one','two','three');
  foreach($pro_cat_num as $pro_cat){
    $wp_customize->add_setting( 'zigcy_lite_product_categories_'.$pro_cat,array(
      'sanitize_callback' => 'absint',
      'default'           => 0,
    ));
    $wp_customize->add_control( 'zigcy_lite_product_categories_'.$pro_cat, array(
      'label'       => esc_html__('Select Category ', 'zigcy-lite').ucwords($pro_cat),
      'description' => esc_html__('The list will display categories from Product', 'zigcy-lite'),
      'section'     => 'zigcy_lite_pro_cat_setting',
      'type'        => 'select',
      'choices'     => $zigcy_lite_prod_cats,
    ));
  }
  
}else{

  //instructions
  $wp_customize->add_setting( 'zigcy_lite_instructions', array(
    'sanitize_callback'    => 'sanitize_text_field'
  ));

  $wp_customize->add_control( new Zigcy_lite_Customize_Info( $wp_customize,'zigcy_lite_instructions', array(
    'section'         => 'zigcy_lite_pro_cat_setting',
    'label'           => esc_html__('Instructions','zigcy-lite'),
    'description'     => esc_html__('Install WooCommerce Plugin to list options','zigcy-lite'),
  )));

}


  //Product Category Slider

$wp_customize->add_section( 'zigcy_lite_prod_cat_slider_setting', array(
  'title'           =>      esc_html__('Product Category Slider Section', 'zigcy-lite'),
  'priority'        =>      '3',
  'panel' => 'zigcy_lite_home_setting'
));


$wp_customize->add_setting( 'zigcy_lite_pro_cat_slider_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_pro_cat_slider_title', array(
  'label'     => esc_html__('Product Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_prod_cat_slider_setting',
));


$wp_customize->add_setting( 'zigcy_lite_pro_cat_slider_subtitle', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_pro_cat_slider_subtitle', array(
  'label'     => esc_html__('Product SubTitle','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_prod_cat_slider_setting',
));

if(class_exists('WooCommerce')){

  $wp_customize->add_setting( 'zigcy_lite_pro_cat_slider_enable', array(
    'default'             => 'off',
    'sanitize_callback'   => 'zigcy_lite_sanitize_text',
  ) );

  $wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_pro_cat_slider_enable', array(
    'label'         => esc_html__( 'Show Hide Product Category', 'zigcy-lite' ),
    'section'       => 'zigcy_lite_prod_cat_slider_setting',
    'priority'        => 1,
    'choices'         => array(
      'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
      'off'       => esc_html__( 'No', 'zigcy-lite' ),
    )
  ) ) );

  /** drop down categories for feature product **/
  $wp_customize->add_setting( 'zigcy_lite_pro_cat_slider_categories',array(
    'sanitize_callback' => 'absint',
    'default'           => 0,
  ));
  $wp_customize->add_control( 'zigcy_lite_pro_cat_slider_categories', array(
    'label'       => esc_html__('Product Category', 'zigcy-lite'),
    'description' => esc_html__(' Select Category to display products', 'zigcy-lite'),
    'section'     => 'zigcy_lite_prod_cat_slider_setting',
    'type'        => 'select',
    'choices'     => $zigcy_lite_prod_cats,
  ));

  // No of Products To Show
  $wp_customize->add_setting( 'zigcy_lite_pro_cat_sl_prod', array(
    'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control('zigcy_lite_pro_cat_sl_prod', array(
    'label'         => esc_html__('Total Products To Show','zigcy-lite'),
    'description'   => esc_html__('Display number of products as your need','zigcy-lite'),
    'type'          => 'number',
    'section'       => 'zigcy_lite_prod_cat_slider_setting',
  ));
}else{

  //instructions
  $wp_customize->add_setting( 'zigcy_lite_instructions_two', array(
    'sanitize_callback'    => 'sanitize_text_field'
  ));

  $wp_customize->add_control( new Zigcy_lite_Customize_Info( $wp_customize,'zigcy_lite_instructions_two', array(
    'section'         => 'zigcy_lite_prod_cat_slider_setting',
    'label'           => esc_html__('Instructions','zigcy-lite'),
    'description'     => esc_html__('Install WooCommerce Plugin to list options','zigcy-lite'),
  )));

}

  //Feature Product Category section
$wp_customize->add_section( 'zigcy_lite_feat_prod_cat_setting', array(
  'title'           =>      esc_html__('Feature Product Category Section', 'zigcy-lite'),
  'priority'        =>      '4',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_feat_prod_cat_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_feat_prod_cat_enable', array(
  'label'         => esc_html__( 'Show Hide Feature Product Category', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_feat_prod_cat_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting( 'zigcy_lite_feature_product_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_feature_product_title', array(
  'label'     => esc_html__('Feature Product Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_feat_prod_cat_setting',
));


$wp_customize->add_setting( 'zigcy_lite_feature_product_subtitle', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_feature_product_subtitle', array(
  'label'     => esc_html__('Feature Product SubTitle','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_feat_prod_cat_setting',
));

if(class_exists('WooCommerce')){

  /** drop down categories for feature product **/
  $wp_customize->add_setting( 'zigcy_lite_feature_product_categories',array(
    'sanitize_callback' => 'absint',
    'default'           => 0,
  ));
  $wp_customize->add_control( 'zigcy_lite_feature_product_categories', array(
    'label'       => esc_html__('Product Category', 'zigcy-lite'),
    'description' => esc_html__(' Select Category to display products', 'zigcy-lite'),
    'section'     => 'zigcy_lite_feat_prod_cat_setting',
    'type'        => 'select',
    'choices'     => $zigcy_lite_prod_cats,
  ));

   // No of Products To Show
  $wp_customize->add_setting( 'zigcy_lite_sml_feat_pro_per_page', array(
    'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control('zigcy_lite_sml_feat_pro_per_page', array(
    'label'         => esc_html__('Total Products To Show','zigcy-lite'),
    'description'   => esc_html__('Display number of products as your need','zigcy-lite'),
    'type'          => 'number',
    'section'       => 'zigcy_lite_feat_prod_cat_setting',
  ));

  // show rating 
  $wp_customize->add_setting( 'zigcy_lite_sml_feat_pro_show_rating', array(
   'sanitize_callback' => 'zigcy_lite_sanitize_checkbox'
 ));
  $wp_customize->add_control( 'zigcy_lite_sml_feat_pro_show_rating', array(
    'section'      => 'zigcy_lite_feat_prod_cat_setting',
    'label'        => esc_html__( 'Show Product Rating', 'zigcy-lite' ),
    'description'   => esc_html__('Check the box to show product ratings','zigcy-lite'),
    'type'         => 'checkbox'    
  ));
}else{

  //instructions
  $wp_customize->add_setting( 'zigcy_lite_instructions_one', array(
    'sanitize_callback'    => 'sanitize_text_field'
  ));

  $wp_customize->add_control( new Zigcy_lite_Customize_Info( $wp_customize,'zigcy_lite_instructions_one', array(
    'section'         => 'zigcy_lite_feat_prod_cat_setting',
    'label'           => esc_html__('Instructions','zigcy-lite'),
    'description'     => esc_html__('Install WooCommerce Plugin to list options','zigcy-lite'),
  )));

}

  //Call to Action section
$wp_customize->add_section( 'zigcy_lite_cta_setting', array(
  'title'           =>      esc_html__('CTA Section', 'zigcy-lite'),
  'priority'        =>      '4',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_cta_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_cta_enable', array(
  'label'         => esc_html__( 'Show Hide CTA Section', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_cta_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting( 'zigcy_lite_cta_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_cta_title', array(
  'label'     => esc_html__('CTA Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_cta_setting',
));

$wp_customize->add_setting( 'zigcy_lite_cta_subtitle', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_cta_subtitle', array(
  'label'     => esc_html__('CTA SubTitle','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_cta_setting',
));

$wp_customize->add_setting( 'zigcy_lite_price_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_price_title', array(
  'label'     => esc_html__('Price Text','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_cta_setting',
));

$wp_customize->add_setting( 'zigcy_lite_cta_bg_image', array(
  'default'       =>      '',
  'sanitize_callback' => 'zigcy_lite_sanitize_url' 
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zigcy_lite_cta_bg_image', array(
  'section'       =>      'zigcy_lite_cta_setting',
  'label'         =>      esc_html__('Upload Background Image', 'zigcy-lite'),
  'type'          =>      'image',
)));

$wp_customize->add_setting('zigcy_lite_cta_button_text', array(
  'default' => '',
  'sanitize_callback' => 'sanitize_text_field',  
));

$wp_customize->add_control('zigcy_lite_cta_button_text',array(
  'type' => 'text',
  'label' => esc_html__('Button Text', 'zigcy-lite'),
  'section' => 'zigcy_lite_cta_setting',
));

$wp_customize->add_setting('zigcy_lite_cta_button_link', array(
  'default' => '',
  'sanitize_callback' => 'zigcy_lite_sanitize_url',  
));

$wp_customize->add_control('zigcy_lite_cta_button_link',array(
  'type' => 'text',
  'label' => esc_html__('Button Link', 'zigcy-lite'),
  'section' => 'zigcy_lite_cta_setting'
));


  //Blog section
$wp_customize->add_section( 'zigcy_lite_blog_setting', array(
  'title'           =>      esc_html__('Blog Section', 'zigcy-lite'),
  'priority'        =>      '5',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_blog_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_blog_enable', array(
  'label'         => esc_html__( 'Show Hide Blog Section', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_blog_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting('zigcy_lite_blog_title',array(
  'sanitize_callback' => 'esc_html',
));

$wp_customize->add_control('zigcy_lite_blog_title',array(
  'label'     => esc_attr__('Blog  Title','zigcy-lite'),
  'type'      => 'text',
  'priority'    => 2,
  'section'   => 'zigcy_lite_blog_setting'
));

$wp_customize->add_setting('zigcy_lite_blog_subtitle',array(
  'sanitize_callback' => 'esc_html',
));

$wp_customize->add_control( 'zigcy_lite_blog_subtitle',array(
  'label'     => esc_html__('Blog Subtitle','zigcy-lite'),
  'type'      => 'text',
  'priority'    => 3,
  'section'   => 'zigcy_lite_blog_setting'
));

/** drop down categories for latest post **/
$wp_customize->add_setting( 'zigcy_lite_blog_categories',array(
  'sanitize_callback' => 'absint',
  'default'           => 0,
));
$wp_customize->add_control( 'zigcy_lite_blog_categories', array(
  'label'       => esc_html__('Choose Category', 'zigcy-lite'),
  'description' => esc_html__(' Select Category to display post', 'zigcy-lite'),
  'section'     => 'zigcy_lite_blog_setting',
  'type'        => 'select',
  'choices'     => $cat_list,
));

$wp_customize->add_setting( 'zigcy_lite_blog_date_enable', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_blog_date_enable', array(
  'label'         => esc_html__( 'Show/Hide Date', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_blog_setting',
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting('zigcy_lite_post_excerpt_btn_txt',array(
  'sanitize_callback' => 'sanitize_text_field',
  'default'           => esc_html__('Read More','zigcy-lite')
));
$wp_customize->add_control( 'zigcy_lite_post_excerpt_btn_txt', array(
  'section'      => 'zigcy_lite_blog_setting',
  'label'        => esc_html__( 'Read More Button', 'zigcy-lite' ),
  'description'  => esc_html__( 'Change text of read more buttons on homepage sections and archive pages', 'zigcy-lite' ),
  'type'         =>'text'
));
/** post length limit **/
$wp_customize->add_setting( 'zigcy_lite_post_excerpt_length',array(
 'sanitize_callback' => 'absint',
 'default'           => 200,
));
$wp_customize->add_control( 'zigcy_lite_post_excerpt_length', array(
  'section'      => 'zigcy_lite_blog_setting',
  'label'        => esc_html__( 'Word length', 'zigcy-lite' ),
  'description'  => esc_html__( 'Enter number of letters for posts to show on blog section', 'zigcy-lite' ),
  'type'         => 'number'
));

  //Latest Category Product
$wp_customize->add_section( 'zigcy_lite_lat_prod_cat_setting', array(
  'title'           =>      esc_html__('Latest Category Product', 'zigcy-lite'),
  'priority'        =>      '6',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_latest_cat_prod_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_latest_cat_prod_enable', array(
  'label'         => esc_html__( 'Show Hide Latest Category Product Section', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_lat_prod_cat_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting( 'zigcy_lite_latest_cat_prod_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_latest_cat_prod_title', array(
  'label'     => esc_html__('Latest Category Product Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_lat_prod_cat_setting',
));

$wp_customize->add_setting( 'zigcy_lite_latest_cat_prod_subtitle', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control( 'zigcy_lite_latest_cat_prod_subtitle', array(
  'label'     => esc_html__('Latest Category Product SubTitle','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_lat_prod_cat_setting',
));

if(class_exists('WooCommerce')){

  /** drop down categories for latest product **/
  $wp_customize->add_setting( 'zigcy_lite_latest_product_categories',array(
    'sanitize_callback' => 'absint',
    'default'           => 0,
  ));
  $wp_customize->add_control( 'zigcy_lite_latest_product_categories', array(
    'label'       => esc_html__('Latest Product Category', 'zigcy-lite'),
    'description' => esc_html__(' Select Category to display latest products', 'zigcy-lite'),
    'section'     => 'zigcy_lite_lat_prod_cat_setting',
    'type'        => 'select',
    'choices'     => $zigcy_lite_prod_cats,
  ));

  // show rating 
  $wp_customize->add_setting( 'zigcy_lite_sml_lat_pro_show_rating', array(
   'sanitize_callback' => 'zigcy_lite_sanitize_checkbox'
 ));
  $wp_customize->add_control( 'zigcy_lite_sml_lat_pro_show_rating', array(
    'section'      => 'zigcy_lite_lat_prod_cat_setting',
    'label'        => esc_html__( 'Show Product Rating', 'zigcy-lite' ),
    'description'   => esc_html__('Check the box to show product ratings','zigcy-lite'),
    'type'         => 'checkbox'    
  ));

  // No of Products To Show
  $wp_customize->add_setting( 'zigcy_lite_sml_lat_pro_per_page', array(
    'sanitize_callback' => 'absint',
  ));

  $wp_customize->add_control('zigcy_lite_sml_lat_pro_per_page', array(
    'label'         => esc_html__('Total Products To Show','zigcy-lite'),
    'description'   => esc_html__('Display number of products as your need','zigcy-lite'),
    'type'          => 'number',
    'section'       => 'zigcy_lite_lat_prod_cat_setting',
  ));
}else{

  //instructions
  $wp_customize->add_setting( 'zigcy_lite_instructions_two', array(
    'sanitize_callback'    => 'sanitize_text_field'
  ));

  $wp_customize->add_control( new Zigcy_lite_Customize_Info( $wp_customize,'zigcy_lite_instructions_two', array(
    'section'         => 'zigcy_lite_lat_prod_cat_setting',
    'label'           => esc_html__('Instructions','zigcy-lite'),
    'description'     => esc_html__('Install WooCommerce Plugin to list options','zigcy-lite'),
  )));

}

  //Product Tab Category Section

$wp_customize->add_section( 'zigcy_lite_prod_tab_cat_setting', array(
  'title'           =>      esc_html__('Product Category Tab Section', 'zigcy-lite'),
  'priority'        =>      '6',
  'panel' => 'zigcy_lite_home_setting'
));


$wp_customize->add_setting( 'zigcy_lite_prod_tab_cat_title', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_prod_tab_cat_title', array(
  'label'     => esc_html__('Product Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_prod_tab_cat_setting',
));


$wp_customize->add_setting( 'zigcy_lite_prod_tab_cat_subtitle', array(
  'sanitize_callback'   => 'sanitize_text_field'
));

$wp_customize->add_control('zigcy_lite_prod_tab_cat_subtitle', array(
  'label'     => esc_html__('Product SubTitle','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_prod_tab_cat_setting',
));

if(class_exists('WooCommerce')){

  $wp_customize->add_setting( 'zigcy_lite_prod_tab_cat_enable', array(
    'default'             => 'off',
    'sanitize_callback'   => 'zigcy_lite_sanitize_text',
  ) );

  $wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_prod_tab_cat_enable', array(
    'label'         => esc_html__( 'Show Hide Porduct Tab Category', 'zigcy-lite' ),
    'section'       => 'zigcy_lite_prod_tab_cat_setting',
    'priority'        => 1,
    'choices'         => array(
      'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
      'off'       => esc_html__( 'No', 'zigcy-lite' ),
    )
  ) ) );

  /** drop down categories for feature product **/
  $wp_customize->add_setting( 'zigcy_lite_prod_tab_cat',array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 0,
  ));

  $wp_customize->add_control( new zigcy_lite_Select_Mul_Cat_Control( $wp_customize,'zigcy_lite_prod_tab_cat',array(
   'label'      => esc_html__( 'Product Category', 'zigcy-lite' ),
   'description' => esc_html__('Choose Multiple categories to display product tab section', 'zigcy-lite'),
   'section'    => 'zigcy_lite_prod_tab_cat_setting',
 )));

  // No of Products To Show
  $wp_customize->add_setting( 'zigcy_lite_prod_tab_no', array(
    'sanitize_callback' => 'absint',
    'default'           =>4,
  ));

  $wp_customize->add_control('zigcy_lite_prod_tab_no', array(
    'label'         => esc_html__('Total Products To Show','zigcy-lite'),
    'description'   => esc_html__('Display number of products as your need','zigcy-lite'),
    'type'          => 'number',
    'section'       => 'zigcy_lite_prod_tab_cat_setting',
  ));

}else{

  //instructions
  $wp_customize->add_setting( 'zigcy_lite_instructions_three', array(
    'sanitize_callback'    => 'sanitize_text_field'
  ));

  $wp_customize->add_control( new Zigcy_lite_Customize_Info( $wp_customize,'zigcy_lite_instructions_three', array(
    'section'         => 'zigcy_lite_prod_tab_cat_setting',
    'label'           => esc_html__('Instructions','zigcy-lite'),
    'description'     => esc_html__('Install WooCommerce Plugin to list options','zigcy-lite'),
  )));

}

  //Client section
$wp_customize->add_section( 'zigcy_lite_client_setting', array(
  'title'           =>      esc_html__('Client Section', 'zigcy-lite'),
  'priority'        =>      '8',
  'panel' => 'zigcy_lite_home_setting'
));

$wp_customize->add_setting( 'zigcy_lite_client_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_client_enable', array(
  'label'         => esc_html__( 'Show Hide Client Section', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_client_setting',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );


/** drop down categories for latest post **/
$wp_customize->add_setting( 'zigcy_lite_client_categories',array(
  'sanitize_callback' => 'absint',
  'default'           => 0,
));
$wp_customize->add_control( 'zigcy_lite_client_categories', array(
  'label'       => esc_html__('Choose Category', 'zigcy-lite'),
  'description' => esc_html__(' Select Category to display logo', 'zigcy-lite'),
  'section'     => 'zigcy_lite_client_setting',
  'type'        => 'select',
  'choices'     => $cat_list,
));

  //footer section
$wp_customize->add_section('zigcy_lite_footer_page_section', array(
  'priority'       => 35,
  'capability'     => 'edit_theme_options',
  'theme_supports' => '',
  'title'          => esc_html__( 'Footer Settings', 'zigcy-lite' )

));

$wp_customize->add_setting( 'zigcy_lite_footer_copyright', array(
  'sanitize_callback' => 'wp_kses_post',
));

$wp_customize->add_control( 'zigcy_lite_footer_copyright', array(
  'label'     => esc_html__('Footer Copyright','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_footer_page_section'
));

$wp_customize->add_setting( 'zigcy_lite_footer_image', array(
  'default'       =>      '',
  'sanitize_callback' => 'zigcy_lite_sanitize_url' 
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zigcy_lite_footer_image', array(
  'section'       =>      'zigcy_lite_footer_page_section',
  'label'         =>      esc_html__('Footer Image', 'zigcy-lite'),
  'type'          =>      'image',
)));

$wp_customize->add_setting( 'zigcy_lite_footer_width_type',array(
  'sanitize_callback' => 'zigcy_footer_layout_sanitize',
  'default'           => 'layout1'
));

$wp_customize->add_control( 'zigcy_lite_footer_width_type', array(
  'label'     => esc_html__('Footer Widget Layout Width', 'zigcy-lite'),
  'section'   => 'zigcy_lite_footer_page_section',
  'type'      => 'radio',
  'priority'  => 2,
  'choices'   => array(
    'layout1'     => esc_html__('Layout One', 'zigcy-lite'),
    'layout2'     => esc_html__('Layout Two', 'zigcy-lite')
  )
));

$wp_customize->add_setting('zigcy_lite_footer_text_color',array(
  'default' => '#707070',
  'sanitize_callback'=>'sanitize_text_field'
)); 
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zigcy_lite_footer_text_color', array(
  'label' => esc_html__('Footer Text Color','zigcy-lite'),
  'section'    => 'zigcy_lite_footer_page_section',
)));

$wp_customize->add_setting('zigcy_lite_footer_bg_color',array(
  'default' => '#f6f6f6',
  'sanitize_callback'=>'sanitize_text_field'
)); 
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zigcy_lite_footer_bg_color', array(
  'label' => esc_html__('Footer Background Color','zigcy-lite'),
  'section'    => 'zigcy_lite_footer_page_section',
)));

  // show social icons 
$wp_customize->add_setting( 'zigcy_lite_footer_credit_enable', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_footer_credit_enable', array(
  'label'         => esc_html__( 'Show Hide Footer Credit', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_footer_page_section',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );


  //add design settings
$wp_customize->add_panel('zigcy_lite_design_panel', array(
  'title'=>esc_html__('Design Settings', 'zigcy-lite'),
  'description'=>esc_html__('Manage design for your site','zigcy-lite'),
  'priority'=> 5
));

/**
* Archive Post
*
*/
$wp_customize->add_section( 'zigcy_lite_archive_section', array(
  'priority'     => 1,
  'panel'        => 'zigcy_lite_design_panel',
  'title'        => esc_html__('Archive Post', 'zigcy-lite')
));

$wp_customize->add_setting('zigcy_lite_archive_post_layout_sidebars', array(
  'default'  =>      'right-sidebar-enabled',
  'sanitize_callback' => 'zigcy_lite_sanitize_archive_layout'
));

$imagepath =  get_template_directory_uri() . '/assets/images/';

$wp_customize->add_control( new zigcy_lite_Customize_Radioimage_Control( $wp_customize,'zigcy_lite_archive_post_layout_sidebars', array(
  'section'       =>      'zigcy_lite_archive_section',
  'label'         =>      esc_html__('Archive Post Sidebar Option', 'zigcy-lite'),
  'type'          =>      'radioimage',
  'choices'       =>      array(
    'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
    'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
    'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
    'no-sidebar' => $imagepath.'no-sidebar.png',
  ))));

$wp_customize->add_setting('sml_archive_post_excerpts', array(
  'default'=>600,
  'sanitize_callback'=>'absint'
));
$wp_customize->add_control('sml_archive_post_excerpts',array(
  'section'=>'zigcy_lite_archive_section',
  'label'=> esc_html__('Archive Post Excerpt Length', 'zigcy-lite'),
  'description' => esc_html__('Enter word limit for archive forms', 'zigcy-lite'),
  'type'=>'number'
));

$wp_customize->add_setting( 'zigcy_lite_show_meta_data', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_show_meta_data', array(
  'label'         => esc_html__( 'Show Hide Date', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_archive_section',
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting( 'zigcy_lite_show_author', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_show_author', array(
  'label'         => esc_html__( 'Show Hide Author', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_archive_section',
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_setting( 'zigcy_lite_show_cat', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_show_cat', array(
  'label'         => esc_html__( 'Show Hide Category', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_archive_section',
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_section('zigcy_lite_post_section', array(
  'title'=>esc_html__('Single Post Settings', 'zigcy-lite'),
  'panel'   => 'zigcy_lite_design_panel',
  'priority'=> 2
));

$wp_customize->add_setting('sml_single_post_layout_sidebars', array(
  'default'  =>      'right-sidebar-enabled',
  'sanitize_callback' => 'zigcy_lite_sanitize_single_post_layout'
));

$wp_customize->add_control( new zigcy_lite_Customize_Radioimage_Control( $wp_customize,'sml_single_post_layout_sidebars', array(
  'section'       =>      'zigcy_lite_post_section',
  'label'         =>      esc_html__('Single Post Sidebar Option', 'zigcy-lite'),
  'type'          =>      'radioimage',
  'choices'       =>      array(
    'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
    'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
    'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
    'no-sidebar' => $imagepath.'no-sidebar.png',
  ))));

$wp_customize->add_setting( 'zigcy_lite_post_date_enable', array(
  'default'             => 'on',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_post_date_enable', array(
  'label'         => esc_html__( 'Show/Hide Date', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_post_section',
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

$wp_customize->add_section('zigcy_lite_single_page_section', array(
  'title'=>esc_html__('Single Page Settings', 'zigcy-lite'),
  'panel'   => 'zigcy_lite_design_panel',
  'priority'=> 3
));

$wp_customize->add_setting('sml_single_page_layout_sidebars', array(
  'default'  =>      'right-sidebar-enabled',
  'sanitize_callback' => 'zigcy_lite_sanitize_page_sidebar'
));

$wp_customize->add_control( new zigcy_lite_Customize_Radioimage_Control( $wp_customize,'sml_single_page_layout_sidebars', array(
  'section'       =>      'zigcy_lite_single_page_section',
  'label'         =>      esc_html__('Single page Sidebar Option', 'zigcy-lite'),
  'type'          =>      'radioimage',
  'choices'       =>      array(
    'left-sidebar-enabled' => $imagepath.'left-sidebar.png',
    'right-sidebar-enabled' => $imagepath.'right-sidebar.png',
    'both-sidebar-enabled' => $imagepath.'both-sidebar.png',
    'no-sidebar' => $imagepath.'no-sidebar.png',
  ))));

//single product layout
$wp_customize->add_section('zigcy_lite_single_product_section', array(
  'title'=>esc_html__('Single Product Layout', 'zigcy-lite'),
  'panel'   => 'zigcy_lite_design_panel',
  'priority'=> 3
));

$wp_customize->add_setting('sml_single_product_layout_sidebars', array(
  'default'  =>      'right-sidebar',
  'sanitize_callback' => 'zigcy_lite_sanitize_single_product_sidebar'
));

$wp_customize->add_control( new zigcy_lite_Customize_Radioimage_Control( $wp_customize,'sml_single_product_layout_sidebars', array(
  'section'       =>      'zigcy_lite_single_product_section',
  'label'         =>      esc_html__('Single Product Sidebar Option', 'zigcy-lite'),
  'type'          =>      'radioimage',
  'choices'       =>      array(
    'left-sidebar' => $imagepath.'left-sidebar.png',
    'right-sidebar' => $imagepath.'right-sidebar.png',
    'both-sidebar' => $imagepath.'both-sidebar.png',
    'no-sidebar' => $imagepath.'no-sidebar.png',
  ))));

//Archive Product Layout
$wp_customize->add_section('zigcy_lite_archive_product_section', array(
  'title'=>esc_html__('Archive Product Layout', 'zigcy-lite'),
  'panel'   => 'zigcy_lite_design_panel',
  'priority'=> 3
));

$wp_customize->add_setting('sml_archive_product_layout_sidebars', array(
  'default'  =>      'right-sidebar',
  'sanitize_callback' => 'zigcy_lite_sanitize_archive_product_sidebar'
));

$wp_customize->add_control( new zigcy_lite_Customize_Radioimage_Control( $wp_customize,'sml_archive_product_layout_sidebars', array(
  'section'       =>      'zigcy_lite_archive_product_section',
  'label'         =>      esc_html__('Archive Product Sidebar Option', 'zigcy-lite'),
  'type'          =>      'radioimage',
  'choices'       =>      array(
    'left-sidebar' => $imagepath.'left-sidebar.png',
    'right-sidebar' => $imagepath.'right-sidebar.png',
    'both-sidebar' => $imagepath.'both-sidebar.png',
    'no-sidebar' => $imagepath.'no-sidebar.png',
  ))));

  //Additional Option
$wp_customize->add_section( 'zigcy_lite_add_option', array(
  'title'           =>      esc_html__('Additional Option', 'zigcy-lite'),
  'priority'        =>      '3',
  'panel' => 'zigcy_lite_general_setting'
));

  // show or hide product share
$wp_customize->add_setting( 'zigcy_lite_share_enable', array(
  'default'             => 'off',
  'sanitize_callback'   => 'zigcy_lite_sanitize_text',
) );

$wp_customize->add_control( new zigcy_lite_Customizer_Buttonset_Control( $wp_customize, 'zigcy_lite_share_enable', array(
  'label'         => esc_html__( 'Show Hide Product Share Icons', 'zigcy-lite' ),
  'section'       => 'zigcy_lite_add_option',
  'priority'        => 1,
  'choices'         => array(
    'on'        => esc_html__( 'Yes', 'zigcy-lite' ),
    'off'       => esc_html__( 'No', 'zigcy-lite' ),
  )
) ) );

//container width
$wp_customize->add_setting( 'zigcy_lite_container_width',array(
  'sanitize_callback' => 'zigcy_sanitize_number',
  'default'           => '1400'
));

$wp_customize->add_control( 'zigcy_lite_container_width', array(
  'label'     => esc_html__('Container Width', 'zigcy-lite'),
  'section'   => 'zigcy_lite_add_option',
  'type'      => 'number',
  'priority'  => 2,
));


//blog post category
$wp_customize->add_section('zigcy_lite_blog_post_display_section',array(
  'panel'     => 'zigcy_lite_general_setting',
  'title'     => esc_html__('Blog Category Post','zigcy-lite'),
  'description' => esc_html__('Choose Categories to exclude posts in Blog Page','zigcy-lite'),
));

/** Exclude Multiple Category Control **/
class Zigcy_lite_Select_Mul_Cat_Blog_Control extends WP_Customize_Control {
 public function render_content() {
   $cats = $this->zigcy_lite_get_cat_list();
   $values = $this->value();

   if ( empty( $cats ) )
     return;
   ?>
   <label>
     <?php if ( ! empty( $this->label ) ) : ?>
       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
     <?php endif;
     if ( ! empty( $this->description ) ) : ?>
     <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
   <?php endif; ?>

   <?php if ( ! empty( $this->label ) ) : ?>
     <div class="ex-cat-wrap">
       <?php $cat_arr = explode(',', $values); array_pop($cat_arr); $count = 1; ?>

       <?php foreach($cats as $id => $label) : ?>
         <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
           <input id="ex-cat-<?php echo absint($id); ?>" type="checkbox" value="<?php echo absint($id); ?>" <?php if(in_array($id,$cat_arr)){ echo "checked"; }; ?> />
           <label for="ex-cat-<?php echo absint($id); ?>"><?php echo esc_html($label); ?></label>
         </div>
       <?php endforeach; ?>
     </div>
     <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
   <?php endif; ?>    
 </label>
 <?php
}

public function zigcy_lite_get_cat_list() {
 $catlist = array();
 $categories = get_categories( array('hide_empty' => 0) );

 foreach($categories as $cat){
   $catlist[$cat->term_id] = $cat->name;
 }

 return $catlist;
}
}


/** Blog Exclude Category Control  **/
$wp_customize->add_setting( 'zigcy_lite_exclude_cat' , array( 'default' => 0, 'sanitize_callback' => 'sanitize_text_field') );

$wp_customize->add_control( new Zigcy_lite_Select_Mul_Cat_Blog_Control( $wp_customize,'zigcy_lite_exclude_cat',array(
 'label'      => esc_html__( 'Exclude Category', 'zigcy-lite' ),
 'description' => esc_html__('Exclude categories from blog page', 'zigcy-lite'),
 'section'    => 'zigcy_lite_blog_post_display_section',
)));


$wp_customize->add_setting('zigcy_lite_skin_color',array(
  'default' => '#df3550',
  'sanitize_callback'=>'sanitize_text_field'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'zigcy_lite_skin_color', array(
  'label' => esc_html__('Template Color','zigcy-lite'),
  'description'   => esc_html__('Choose the template color','zigcy-lite'),
  'section'    => 'colors',
  'settings'   => 'zigcy_lite_skin_color',
) ) );

/**
* Mobile navigation settings
*
*/
$wp_customize->add_section( 'zigcy_lite_mobile_header_options', array(
  'title'           =>      esc_html__('Mobile Navigation Option', 'zigcy-lite'),
  'panel'           => 'zigcy_lite_header_setting'
));


//mobile navigation logo
$wp_customize->add_setting('zigcy_lite_mobile_header_logo', array(
  'sanitize_callback' => 'esc_url_raw',
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'zigcy_lite_mobile_header_logo', array(
  'section'     => 'zigcy_lite_mobile_header_options',
  'label'       => esc_html__('Logo', 'zigcy-lite'),
  'description' => esc_html__('Add logo to display on mobile devices', 'zigcy-lite'),
  'type'        => 'image'
)));

  //woocommerce setting
$wp_customize->add_section( 'zigcy_lite_woocommerce_settings', array(
  'title'           =>      esc_html__('WooCommerce Settings', 'zigcy-lite'),
  'panel' => 'zigcy_lite_general_setting'
));

$wp_customize->add_setting( 'zigcy_lite_cart_title', array(
  'sanitize_callback'   => 'sanitize_text_field',
  'default'             => 'My Cart'
));

$wp_customize->add_control('zigcy_lite_cart_title', array(
  'label'     => esc_html__('Cart Title','zigcy-lite'),
  'type'      => 'text',
  'section'   => 'zigcy_lite_woocommerce_settings',
));



$sections = get_theme_mod( 'zigcy_lite_frontpage_sections' );
if(!empty($sections)){
  foreach ($sections as $index=>$section) {
   $sec = $wp_customize->get_section( $section );
   if($sec){
     $sec->priority = $index+4;
   }
 }
}