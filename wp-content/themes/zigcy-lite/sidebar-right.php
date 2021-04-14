<?php
/**
* Right Sidebar for the theme
*
* @package Zigcy Lite
*/ 

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>
<div class="sidebar-right">
    <aside id="right-sidebar" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside><!-- #right-sidebar -->
</div><!-- .sidebar-right -->    