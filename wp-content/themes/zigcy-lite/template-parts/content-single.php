<?php

/**
 *
 * @package Zigcy Lite
 */

$th_class = 'no-thumb';
if (has_post_thumbnail()) {
    $th_class = '';
}

?>
<div class="entry-content">
    <div class="<?php echo esc_attr($th_class); ?>">
        <div class="single-meta-wrapp">
            <?php
            zigcy_lite_post_author();
            do_action('zigcy_lite_post_cat_or_tag_lists');
            zigcy_lite_comment_count();
            ?>
        </div>
        <div class="sml-single-thumb-wrapp ">
            <?php
            zigcy_lite_post_thumbnail();
            $date  = get_theme_mod('zigcy_lite_post_date_enable', 'on');
            if ($date == 'on') {
                zigcy_lite_formated_date();
            }
            ?>
        </div>
        <div class="blog-content-wrapp">


            <div class="single-content-wrapp">
                <?php
                the_content(sprintf(
                    /* translators: %s: Name of current post. */
                    wp_kses(__('Continue reading %s <span class="meta-nav">&rarr;</span>', 'zigcy-lite'), array('span' => array('class' => array()))),
                    the_title('<span class="screen-reader-text">"', '"</span>', false)
                ));

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'zigcy-lite'),
                    'after' => '</div>',
                ));
                ?>
            </div>
        </div>
    </div>
    <?php zigcy_lite_single_post_tags_list(); ?>
    <?php do_action('zigcy_lite_single_post_nav'); ?>

</div><!-- .entry-content -->