<?php
/**
* Left Sidebar for the theme
*
* @package Zigcy Lite
*/ 

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
} 
?>
<div class="sidebar-left">
    <aside id="left-sidebar" class="widget-area">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </aside><!-- #left-sidebar -->
</div><!-- sidebar-left -->    