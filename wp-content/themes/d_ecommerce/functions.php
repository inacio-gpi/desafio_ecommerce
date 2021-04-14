<?php 

    // function meus_posts_types() {
    //     register_post_type(
    //         'habilidades', array(
    //             'labels' => array(
    //                 'name'          => __('Habilidades'),
    //                 'singular_name' => __('Habilidade')
    //             ),
    //         'public' => true,
    //         'has_archive' => true,
    //         'manu_icon' => 'dashicons-welcome-learn-more',
    //         'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    //         )
    //     );
    // }
    // add_action('init', 'meus_posts_types');

    //retorna a primeira imagem associada ao post
    function echo_image() {
        $args = array(
                'numberposts' => 1,
                'order' => 'ASC',
                'post_mime_type' => 'image',
                'post_parent' => get_the_ID(),
                'post_status' => null,
                'post_type' => 'attachment',
        );
        // var_dump( $args );
        $attachments = get_children( $args );
        // var_dump($attachments);
        if($attachments) {
            foreach($attachments as $attachment) {
                echo $attachment->guid;
                // var_dump($attachment->guid);
                // return $attachment->guid;
                // $image_attributes = wp_get_attachment_image_src( $attachment->ID, 'thumbnail' )  ? 
                // wp_get_attachment_image_src( $attachment->ID, 'thumbnail' ); 
                // : wp_get_attachment_image_src( $attachment->ID, 'full' );

                // echo wp_get_attachment_thumb_url( $attachment->ID );
            }
        }
    }

    // add_filter('the_content', 'my_addlightboxrel');
    // function my_addlightboxrel() {
    //     // get the post object\
    //     $post = get_post( get_the_ID() );
    //     // we need just the content
    //     $content = $post->post_content;
    //     // we need a expression to match things
    //     $regex = '/src="([^"]*)"/';
    //     // we want all matches
    //     preg_match_all( $regex, $content, $matches );
    //     // reversing the matches array
    //     $matches = array_reverse($matches);
    //     return $matches[0][0];
    // }
    
?>