<?php 

/**
*Template Name: Home Page
*
**/
get_header();

$home_sections =   zigcy_lite_get_parallax_sections();

    foreach( $home_sections as $home_section){
        $sections =  $home_section['function'];        
         do_action($sections);
    }

get_footer(); 
