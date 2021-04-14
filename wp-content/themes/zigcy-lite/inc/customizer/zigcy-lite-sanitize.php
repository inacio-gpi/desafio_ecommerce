<?php
/**
 * Sanizitation for all fields
 * 
 * @package AccessPress Themes
 * @subpackage Zigcy Lite
 * @since 1.0.0
 */

//Text
if(! function_exists('zigcy_lite_sanitize_text')):
	function zigcy_lite_sanitize_text( $input ) {
     return wp_kses_post( $input );
 }
endif;

//Checkbox
function zigcy_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

//URL sanitization
function zigcy_lite_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

//archive layout
function zigcy_lite_sanitize_archive_layout( $input ) {
    $valid_keys = array(
        'right-sidebar-enabled' => get_template_directory_uri() . 'assets/images/right-sidebar.png',
        'right-sidebar-enabled' => get_template_directory_uri() . 'assets/images/left-sidebar.png',
        'both-sidebar-enabled'  => get_template_directory_uri() . 'assets/images/both-sidebar.png',
        'no-sidebar' 			=> get_template_directory_uri() . 'assets/images/no-sidebar.png'
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//single post layout
function zigcy_lite_sanitize_single_post_layout( $input ) {
    $valid_keys = array(
        'right-sidebar-enabled' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
        'left-sidebar-enabled' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
        'both-sidebar-enabled'  => get_template_directory_uri() . '/assets/images/both-sidebar.png',
        'no-sidebar' 			=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//page sidebar
function zigcy_lite_sanitize_page_sidebar( $input ) {
    $valid_keys = array(
        'right-sidebar-enabled' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
        'left-sidebar-enabled' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
        'both-sidebar-enabled'  => get_template_directory_uri() . '/assets/images/both-sidebar.png',
        'no-sidebar' 			=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//single product
function zigcy_lite_sanitize_single_product_sidebar( $input ) {
    $valid_keys = array(
        'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
        'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
        'both-sidebar'  => get_template_directory_uri() . '/assets/images/both-sidebar.png',
        'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//archive product
function zigcy_lite_sanitize_archive_product_sidebar( $input ) {
    $valid_keys = array(
        'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
        'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',
        'both-sidebar'  => get_template_directory_uri() . '/assets/images/both-sidebar.png',
        'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

//header layout sanitize
function zigcy_layout_sanitize($input) {
    $valid_keys = array(
        'layout1'     => esc_html__('Layout One', 'zigcy-lite'),
        'layout2'     => esc_html__('Layout Two', 'zigcy-lite'),
        'layout3'     => esc_html__('Layout Three', 'zigcy-lite'),
        'layout4'     => esc_html__('Layout Four', 'zigcy-lite'),
        'layout5'     => esc_html__('Layout Five', 'zigcy-lite')
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Number sanitization 
 *
 */
function zigcy_sanitize_number( $val ) {
    return is_numeric( $val ) ? $val : 0;
}


//footer layout sanitize
function zigcy_footer_layout_sanitize($input) {
    $valid_keys = array(
        'layout1'     => esc_html__('Layout One', 'zigcy-lite'),
        'layout2'     => esc_html__('Layout Two', 'zigcy-lite')
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}