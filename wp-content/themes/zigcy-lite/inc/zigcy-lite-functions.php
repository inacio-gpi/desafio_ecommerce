<?php 

add_action('zigcy_lite_social_icons','zigcy_lite_social_icons_disp');

if(!function_exists('zigcy_lite_social_icons_disp')){
    function zigcy_lite_social_icons_disp(){
        
        $social_links = array('facebook','twitter','youtube','pinterest','instagram','linkedin','googleplus');
        $zigcy_lite_social_new_tab = get_theme_mod('zigcy_lite_social_new_tab');
        $target = '_self';
        if( $zigcy_lite_social_new_tab ){
            $target = '_blank';
        }
        foreach( $social_links as $social_link ){
            $social_profile_url = get_theme_mod('zigcy_lite_'.$social_link.'_url');
            if($social_profile_url):
                ?>
                <a href="<?php echo esc_url($social_profile_url);?>" target="<?php echo esc_attr($target);?>">
                    <i class="fa fa-<?php echo esc_attr($social_link);?>"></i>
                </a>
                <?php 
            endif;
        }
        
    }
}

//for slider section
if(!function_exists('zigcy_lite_cat_lists')){
    function zigcy_lite_cat_lists()
    {
        $zigcy_lite_slider_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );
        $zigcy_lite_cat_array = array();
        $zigcy_lite_cat_array[] = esc_html__('-- Choose --','zigcy-lite');
        foreach($zigcy_lite_slider_cat_lists as $zigcy_lite_slider_cat_list){
            $zigcy_lite_cat_array[$zigcy_lite_slider_cat_list->slug] = $zigcy_lite_slider_cat_list->name;
        }
        return $zigcy_lite_cat_array;
    }
}

if(!function_exists('zigcy_lite_category_lists')){
    function zigcy_lite_category_lists(){
        $category   =   get_categories( array(
            'hide_empty' => '0',
            'orderby' => 'name',
            'parent'  => 0,
        ));
        $cat_list   =   array();
        $cat_list[0]=   __('Choose','zigcy-lite');
        foreach ($category as $cat) {
            $cat_list[$cat->term_id]    =   $cat->name;
        }
        return $cat_list;
    }
}
/*---------------------------------------------------------------------------------------------------*/
/**
* retrieve category from product
*/
if( ! function_exists('zigcy_lite_product_cats')):
    function zigcy_lite_product_cats() {
        $categories = get_categories(
            array(
                'hide_empty' => 0,
                'exclude' => 1,
                'taxonomy'=> 'product_cat'
            )
        );
        $category_list = array();
        $category_list[0] = esc_html__('Select Category', 'zigcy-lite');
        foreach ($categories as $category) :
            $category_list[$category->term_id] = $category->name;
        endforeach;
        return $category_list;
    }
endif;


/*---------------------------------------------------------------------------------------------------*/
/**
 * Get an attachment ID given a URL.
 * 
 * @param string $url
 *
 * @return int Attachment ID on success, 0 on failure
 */
if( ! function_exists('zigcy_lite_get_attachment_id')):
    function zigcy_lite_get_attachment_id( $url ) {
        $attachment_id = 0;
        $dir = wp_upload_dir();
    if ( false !== strpos( $url, $dir['baseurl'] . '/' ) ) { // Is URL in uploads directory?
        $file = basename( $url );
        $query_args = array(
            'post_type'   => 'attachment',
            'post_status' => 'inherit',
            'fields'      => 'ids',
            'meta_query'  => array(
                array(
                    'value'   => $file,
                    'compare' => 'LIKE',
                    'key'     => '_wp_attachment_metadata',
                ),
            )
        );
        $query = new WP_Query( $query_args );
        if ( $query->have_posts() ) {
            foreach ( $query->posts as $post_id ) {
                $meta = wp_get_attachment_metadata( $post_id );
                $original_file       = basename( $meta['file'] );
                $cropped_image_files = wp_list_pluck( $meta['sizes'], 'file' );
                if ( $original_file === $file || in_array( $file, $cropped_image_files ) ) {
                    $attachment_id = $post_id;
                    break;
                }
            }
        }
    }
    return $attachment_id;
}
endif;

/*---------------------------------------------------------------------------------------------------*/
/**
* Remove prefix from Archive title
*
* @since 1.0.0
*/
if( ! function_exists('zigcy_lite_remove_prefix_archive_title')):
    function zigcy_lite_remove_prefix_archive_title ( $title ) {
        if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title =  get_the_author();
        } elseif( class_exists('WooCommerce') ){
            if( is_shop() ){
                $title = woocommerce_page_title( '', false );
            }elseif( is_product_category() ){
                $title = woocommerce_page_title( '', false );    
            }
        }

        return $title;
    }
endif;
add_filter( 'get_the_archive_title', 'zigcy_lite_remove_prefix_archive_title' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
if( ! function_exists('zigcy_lite_body_classes')):
    function zigcy_lite_body_classes( $classes ) {
        // Adds a class of hfeed to non-singular pages.
        if( class_exists('WooCommerce') ){
            
            if( is_singular('product') ){

                $woo_layout = get_theme_mod('sml_single_product_layout_sidebars','right-sidebar');

                $classes[] = esc_attr($woo_layout);
            }

            if( is_shop() || is_product_category() ){
                $woocommerce_layout = get_theme_mod('sml_archive_product_layout_sidebars','right-sidebar');

                $classes[] = esc_attr($woocommerce_layout);
            }
            
        }
        return $classes;
    }
endif;
add_filter( 'body_class', 'zigcy_lite_body_classes' );


if ( !function_exists( 'zigcy_lite_entry_social_share' ) ) {

    function zigcy_lite_entry_social_share() {
        global $post;
        
        $post_url = get_permalink();

        // Get current page title
        $post_title = str_replace( ' ', '%20', get_the_title() );

        // Get Post Thumbnail for pinterest
        $post_thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

        $share_text = esc_html__('Share:','zigcy-lite');
        // Construct sharing URL
        $twitterURL = 'https://twitter.com/intent/tweet?text=' . esc_html($post_title) . '&amp;url=' . esc_url($post_url);
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . esc_url($post_url);
        $googleURL = 'https://plus.google.com/share?url=' . esc_url($post_url);
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . esc_url($post_url) . '&amp;media=' . $post_thumbnail[ 0 ] . '&amp;description=' . esc_html($post_title);
        $linkedinURL = 'https://stumbleupon.com/shareArticle?mini=true&amp;url=' . esc_url($post_url) . '&amp;title=' . esc_html($post_title);
        $stumbleuponURL = 'https://linkedin.com/submit?url=' . esc_url($post_url) . '&amp;title=' . esc_html($post_title);
        $mailURL = 'mailto:?Subject=' . esc_html($post_title) . '&amp;Body=' . esc_url($post_url);

        $content = '<div class="store-mart-lite-share-buttons">';
        $content .= '<span>'.esc_html($share_text).'</span>';
        $content .= '<ul>';
        $content .= '<li><a class="facebook-share" target="_blank" href="' . esc_url($facebookURL) . '"><i class="fa fa-facebook" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Facebook', 'zigcy-lite' ) . '</span></a></li>';
        $content .= '<li><a class="twitter-share" target="_blank" href="' . esc_url($twitterURL) . '"><i class="fa fa-twitter" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Twitter', 'zigcy-lite' ) . '</span></a></li>';
        $content .= '<li><a class="googleplus-share" target="_blank" href="' . esc_url($googleURL) . '"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Google +', 'zigcy-lite' ) . '</span></a></li>';
        $content .= '<li><a class="linkedin-share" target="_blank" href="' . esc_url($linkedinURL) . '"><i class="fa fa-linkedin" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'LinkedIn', 'zigcy-lite' ) . '</span></a></li>';
        
        $content .= '<li><a class="pinterest-share" target="_blank" href="' . esc_url($pinterestURL) . '"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Pinterest', 'zigcy-lite' ) . '</span></a></li>';
        
        $content .= '<li><a class="stumbleupon-share" target="_blank" href="' . esc_url($stumbleuponURL) . '"><i class="fa fa-stumbleupon" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Stumbleupon', 'zigcy-lite' ) . '</span></a></li>';
        $content .= '<li><a class="email-share" target="_blank" href="' . esc_url($mailURL) . '"><i class="fa fa-envelope" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Email', 'zigcy-lite' ) . '</span></a></li>';
        $content .= '</ul>';
        $content .= '</div>';

        echo $content; // WPCS: XSS OK.
    }

}

/*===========================================================================================================*/
/**
* Post author with thumb
*/
if( ! function_exists('zigcy_lite_post_author')){
    function zigcy_lite_post_author(){
        global $post;
        $author_id = $post->post_author;
        ?>
        <div class="author-wrapp">
            <div class="comment-author vcard">
                <?php echo get_avatar( $author_id, 100 ); ?>
            </div><!-- .comment-author -->
            <?php the_author_posts_link(); ?>
        </div>
        <?php
    }
}

/*===========================================================================================================*/
/**
 * Function to display post categories or tags lists
 *
 * @since 1.0.0
 */
add_action( 'zigcy_lite_post_cat_or_tag_lists', 'zigcy_lite_post_cat_or_tag_lists_cb' );
if( ! function_exists( 'zigcy_lite_post_cat_or_tag_lists_cb' ) ) :
    function zigcy_lite_post_cat_or_tag_lists_cb() {

       

        if ( 'post' === get_post_type() ) {
            
            global $post;
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if( $categories ) {
                $output .= '<span class="cat-links">';
                foreach( $categories as $category ) {
                    $output .= '<a href="'.get_category_link( $category->term_id ).'" class="cat-' . $category->term_id . '" rel="category tag">'.$category->cat_name.'</a>';                   
                }
                $output .='</span>';
                echo wp_kses_post(trim( $output, $separator ));
            }
        }
    }
endif;

/*===========================================================================================================*/
/**
* Post comment
*/
if( ! function_exists('zigcy_lite_comment_count')){
    function zigcy_lite_comment_count(){
        $comment_num = get_comments_number(get_the_ID());
        echo '<div class="comment">';
        echo '<i class="fa fa-commenting-o" aria-hidden="true"></i>'.absint($comment_num);
        echo '</div>';
    }
}

/*===========================================================================================================*/
/**
 * Single post Tags lists
 */

if( ! function_exists( 'zigcy_lite_single_post_tags_list' ) ) :
    function zigcy_lite_single_post_tags_list() {

        // Hide tag text for pages.
        if ( 'post' === get_post_type() ) {

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list( '' );
            if ( $tags_list ) {
                ?>
                <div class="single-tag-wrapp">
                    <span class="tag-title"><?php esc_html_e('Related Tags','zigcy-lite'); ?></span>
                    
                    <span class="tags-links clearfix"> <?php echo wp_kses_post( $tags_list ); ?> </span> 
                </div>
                <?php 
            }
        }
    }
endif;

/*===========================================================================================================*/
/**
* Pagination for single posts
*/
if( ! function_exists( 'zigcy_lite_single_post_pagination' ) ) :
    function zigcy_lite_single_post_pagination(){ ?>   
    <div class="single_post_pagination_wrapper clearfix">
        <div class="prev-link"> 
            <div class="prev-link-wrapper clearfix">
                <?php
                $excluded_terms = esc_html(get_theme_mod('zigcy_lite_exclude_cat'));
                
                $prevPost = get_previous_post(false, array($excluded_terms));
                if ( is_a( $prevPost , 'WP_Post' ) ) :
                    $prevthumbnail = get_the_post_thumbnail($prevPost->ID,'thumbnail'); 
                    $prevtitle = get_the_title($prevPost->ID); 
                    
                    if($prevthumbnail){ ?>
                    <span class="prev-image">
                        <?php previous_post_link('%link', $prevthumbnail,false, array($excluded_terms)); ?>
                    </span>
                    <?php } ?> 

                    <div class="prev-text">
                        <h4><?php previous_post_link('%link', $prevtitle, false, array($excluded_terms)) ;?></h4>
                        <h2><?php previous_post_link('%link', __('Previous Post','zigcy-lite'),false, array($excluded_terms)); ?></h2>
                    </div>
                    
                <?php endif; ?>
            </div>
        </div>

        <?php // Display the thumbnail of the next post ?>
        <div class="next-link"> 
            <div class="next-link-wrapper clearfix">
                <?php
                $nextPost = get_next_post(false, array($excluded_terms));
                if ( is_a( $nextPost , 'WP_Post' ) ) :
                    $nextthumbnail = get_the_post_thumbnail($nextPost->ID,'thumbnail');
                    $nextitle = get_the_title($nextPost->ID); ?>
                    <div class="next-text">
                        <h4><?php next_post_link('%link',$nextitle,false, array($excluded_terms)); ?></h4>
                        <h2><?php next_post_link('%link', __('Next Post','zigcy-lite'),false, array($excluded_terms)); ?></h2>
                    </div>

                    <?php
                    if($nextthumbnail){ ?>
                    <span class="next-image">
                        <?php next_post_link('%link', $nextthumbnail,false, array($excluded_terms)); ?>
                    </span>
                    <?php } 
                    endif; ?>
                </div>
            </div>
        </div> <!-- .single_post_pagination_wrapper -->
        <?php 
    }
endif; 
add_action('zigcy_lite_single_post_nav','zigcy_lite_single_post_pagination');


/*---------------------------------------------------------------------------------------------------*/
/**
 * Function for excerpt length
 */
if( ! function_exists( 'zigcy_lite_get_excerpt_content' ) ):
    function zigcy_lite_get_excerpt_content( $limit = 150 ) {
        $striped_contents = get_the_excerpt();

        if($striped_contents){
            $content = $striped_contents;
        }
        else{
            $content = get_the_content();
        }

        $striped_contents = strip_shortcodes( $content );
        $striped_content = strip_tags( $striped_contents );
        $limit_content = mb_substr( $striped_content, 0 , $limit );
        
        return $limit_content;
    }
endif;

if( ! function_exists('zigcy_lite_blog_excerpt')):
    function zigcy_lite_blog_excerpt($count){
      $btn_text  = get_theme_mod('zigcy_lite_post_excerpt_btn_txt','Read More');
      $permalink = get_permalink( get_the_ID() );
      $excerpt   = get_the_content();
      $excerpt   = strip_tags($excerpt);   
      $excerpt   = mb_substr($excerpt, 0, $count);
      $excerpt   = '<div class="blog-content">'.$excerpt.'</div>'.'<div class="content-read-more"><a href="'.esc_url($permalink).'" class="expost-link clearfix">'.esc_attr("$btn_text","zigcy-lite").'</a></div>';
      return $excerpt;
  }
endif;
/*===========================================================================================================*/

/**
* Numeric post navigation for archive pages
*
*/
if( ! function_exists('zigcy_lite_numeric_posts_nav')){
    function zigcy_lite_numeric_posts_nav() {
     
        if( is_singular() )
            return;
        
        global $wp_query;
        
        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 )
            return;
        
        $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
        $max   = intval( $wp_query->max_num_pages );
        
        /** Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;
        
        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }
        
        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }?>
        <div class="store-mart-lite-archive-navigation clear">
            <?php 
            /** Previous Post Link */
            if ( get_previous_posts_link() )
                printf( '<span class="prev">%s</span>' . "\n", wp_kses_post(get_previous_posts_link() ));
            ?>
            <ul>
                <?php 
                /** Link to first page, plus ellipses if necessary */
                if ( ! in_array( 1, $links ) ) {
                    $class = 1 == $paged ? ' class="active"' : '';
                    
                    printf( '<li%s><a href="%s">%s</a></li>' . "\n", esc_attr($class), esc_url( get_pagenum_link( 1 ) ), '1' );
                    
                    if ( ! in_array( 2, $links ) )?>
                    <li>...</li>
                    <?php
                }
                
                /** Link to current page, plus 2 pages in either direction if necessary */
                sort( $links );
                foreach ( (array) $links as $link ) {
                    //var_dump($link);
                    $class = $paged == $link ? ' class="active"' : '';
                    printf( '<li%s><a href="%s">%s</a></li>' . "\n", wp_kses_post($class), esc_url( get_pagenum_link( $link ) ), wp_kses_post($link) );
                }
                
                /** Link to last page, plus ellipses if necessary */
                if ( ! in_array( $max, $links ) ) {
                    if ( ! in_array( $max - 1, $links ) )
                        echo '<li>...</li>' . "\n";
                    
                    $class = $paged == $max ? ' class="active"' : '';
                    printf( '<li%s><a href="%s">%s</a></li>' . "\n", wp_kses_post($class), esc_url( get_pagenum_link( $max ) ), wp_kses_post($max ));
                }?>
            </ul>
            <?php 
            /** Next Post Link */
            if ( get_next_posts_link() )
                printf( '<span class="next">%s</span>' . "\n", wp_kses_post(get_next_posts_link()) );
            
            //echo '</div>' . "\n";
            ?>
        </div>
        <?php      
    }
}

if( ! function_exists('zigcy_lite_hex2rgba')){
    function zigcy_lite_hex2rgba($color, $opacity = false) {
        $default = 'rgb(0,0,0)';
         //Return default if no color provided
        if(empty($color))
        
        return $default;
        //Sanitize $color if "#" is provided
        if ($color[0] == '#' ) {
         $color = substr( $color, 1 );
        }
        //Check if color has 6 or 3 characters and get values
        if (strlen($color) == 6) {
            $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
        } elseif ( strlen( $color ) == 3 ) {
            $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
        } else {
            return $default;
        }
        //Convert hexadec to rgb
        $rgb =  array_map('hexdec', $hex);
        //Check if opacity is set(rgba or rgb)
        if($opacity){
         if(abs($opacity) > 1)
             $opacity = 1.0;
         $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
        } else {
         $output = 'rgb('.implode(",",$rgb).')';
        }
                //Return rgb(a) color string
        return $output;
        }
}

/**
 * Get media attachment id from url
 */ 
if ( ! function_exists( 'zigcy_lite_get_attachment_id_from_url' ) ):
    function zigcy_lite_get_attachment_id_from_url( $attachment_url ){
        return attachment_url_to_postid( $attachment_url);
    }
endif;

/*===========================================================================================================*/
/**
* Posted date for the post
*/
add_action('zigcy_lite_post_meta','zigcy_lite_formated_date');
if( ! function_exists('zigcy_lite_formated_date')){
    function zigcy_lite_formated_date(){
        $date_format =  get_option( 'date_format' );
       
        if( $date_format == 'j M'){
            $date = '<div class="blog-date-inner"><span class="posted-day">%1$s</span><span class="posted-month">%2$s</span></div>';
            $date = sprintf( $date,
              get_the_date('j'),
              get_the_date('M')
          );
            $posted_on = $date;

        }elseif($date_format == 'j M Y'){

            $date = '<div class="blog-date-inner"><span class="posted-day">%1$s</span><span class="ym-wrapp"><span class="posted-month">%2$s</span><span class="posted-year">%3$s</span></span></div>';
            $date = sprintf( $date,
              get_the_date('j'),
              get_the_date('M'),
              get_the_date('Y')
          );
            $posted_on = $date;
        }
        else{
            $date = '<div class="blog-date-inner">%1$s</div>';
            $date = sprintf( $date, get_the_date() );
            $posted_on = $date;

        }

        echo '<div class="blog-date">'.wp_kses_post($posted_on).'</div>';

    }
}


/**
 * Footer Section Function Area
**/

if ( ! function_exists( 'zigcy_lite_footer_widgets' ) ) {
    /**
     * Display the theme footer widgets
     * @since  1.0.0
     * @return void
     */
    function zigcy_lite_footer_widgets() {
        if ( is_active_sidebar( 'footer-5' ) ) {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 5 );
        }elseif ( is_active_sidebar( 'footer-4' ) ) {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 4 );
        } elseif ( is_active_sidebar( 'footer-3' ) ) {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 3 );
        } elseif ( is_active_sidebar( 'footer-2' ) ) {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 2 );
        }elseif ( is_active_sidebar( 'footer-1' ) ) {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 1 );
        } else {
            $widget_columns = apply_filters( 'zigcy_lite_footer_widget_regions', 0 );
        }

        if ( $widget_columns > 0 ) : ?>

        <div class="footer-widgets col-<?php echo intval( $widget_columns ); ?> clearfix">              
            <div class="top-footer-wrap">
                <div class="store-mart-lite-widgets-wrap">
                    <?php $i = 0; while ( $i < $widget_columns ) : $i++; ?>     
                    <?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>       
                        <div class="block footer-widget-<?php echo intval( $i ); ?>">
                            <?php dynamic_sidebar( 'footer-' . intval( $i ) ); ?>
                        </div>      
                    <?php endif; ?>     
                <?php endwhile; ?>
            </div>
        </div>
    </div><!-- .footer-widgets  -->
<?php endif;
}
}

/**
* Rearrange default Comment form fields
*
*/
add_filter( 'comment_form_fields', 'zigcy_lite_move_comment_field' );

if ( ! function_exists( 'zigcy_lite_move_comment_field' ) ) {

    function zigcy_lite_move_comment_field( $fields ) {
       $comment_field = $fields['comment'];
       unset( $fields['comment'] );
       $fields['comment'] = $comment_field;
       return $fields;
    }
}

/**
* Parallax sections
*
*/
if ( ! function_exists( 'zigcy_lite_get_parallax_sections' ) ) {

    function zigcy_lite_get_parallax_sections() {
        $reorder_lists = zigcy_lite_get_sections_position();
        if( $reorder_lists ){
            $sections = array();
            foreach ($reorder_lists as $order) {
                $zigcy_lite_sections = explode("_", $order);
                array_pop( $zigcy_lite_sections);
                array_shift( $zigcy_lite_sections);
                array_shift( $zigcy_lite_sections);
                $zigcy_lite_section = implode('_', $zigcy_lite_sections);
                $sections[] = $zigcy_lite_section;
            }
            
        } else{
            $sections = array('pro_cat','feat_prod_cat','cta','lat_prod_cat','blog','client','prod_cat_slider','prod_tab_cat');    
        }
        $enabled_section = array();
        foreach ( $sections as $section ) :
            $enabled_section[] = array(
                'id' => 'plx_' . $section . '_section',
                'section' => $section,
                'function' => 'zigcy_lite_'.$section.'_section',
            );
        endforeach;
        return $enabled_section;
    }
}

/******************************************************************************************************************/
/*
* WooCommerce Ajax functions
*/
add_action( 'wp_ajax_zigcy_woo_tab_ajax','zigcy_woo_tab_ajax' );
add_action( 'wp_ajax_nopriv_zigcy_woo_tab_ajax','zigcy_woo_tab_ajax' );
if(!function_exists('zigcy_woo_tab_ajax')){
    function zigcy_woo_tab_ajax(){

        $cat_id     = $_POST['category_id'];
        $cat_slug   = $_POST['category_slug'];
        ob_start();
        ?>

        <?php
        $category_object = get_term( $cat_id, 'product_cat' );
        $num_of_prod = get_theme_mod('zigcy_lite_prod_tab_no',4);
        if ( $category_object ) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => $num_of_prod,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $category_object->term_id
                    )
                )
            );
           $query = new WP_Query( $args );
           ?>
           <ul class="pwtb-inner-catposts-wrapper products columns-4 cat-posts-<?php echo esc_attr( $category_object->term_id ); ?> sm-woo-tab-cat-wrapper <?php echo esc_attr($cat_slug);?>">
               <?php if ( $query->have_posts() ) : ?>
                   <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                       <?php wc_get_template_part( 'content', 'product' ); ?>

                   <?php endwhile;
               else:
                   ?>
                   <li><?php esc_html_e('No Products','zigcy-lite'); ?> </li>
                   <?php
               endif; ?>
           </ul>        
            <?php
        }
        
        wp_reset_postdata();
        
        $sv_html = ob_get_contents();
        ob_get_clean();
        echo $sv_html;
        die();
    }
}

if(!function_exists('zigcy_lite_prod_get_woo_cat_id')){

    function zigcy_lite_prod_get_woo_cat_id() {
       $categories = get_categories( array( 'taxonomy' => 'product_cat', 'hide_empty' => 1, 'include' => 'all', ) );
       $array = array();
       foreach ( $categories as $cat ) {
           if ( is_object( $cat ) ) {
               $array[ $cat->count  ] = $cat->term_id;
           }
       }

       return $array;
    }
}

/** Exclude Categories from Blog Page **/
if(!function_exists('zigcy_lite_exclude_category_from_blogpost')){
    function zigcy_lite_exclude_category_from_blogpost($query) {
       $exclude_category = esc_html(get_theme_mod('zigcy_lite_exclude_cat')); 
       $ex_cats = explode(',', $exclude_category);
       array_pop($ex_cats);
       
       if ( $query->is_home() ) {
           $query->set('category__not_in', $ex_cats);
       }
       return $query;
    }
}

add_filter('pre_get_posts', 'zigcy_lite_exclude_category_from_blogpost');



