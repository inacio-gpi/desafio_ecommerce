<?php
/**
* Changelog
*/
?>
<div class="featured-section changelog">
<?php
WP_Filesystem();
global $wp_filesystem;
$zigcy_lite_changelog     = $wp_filesystem->get_contents( get_template_directory() . '/readme.txt' );
$changelog_start 			= strpos($zigcy_lite_changelog,'== Changelog ==');
$zigcy_lite_changelog_before = substr($zigcy_lite_changelog,0,($changelog_start));
$zigcy_lite_changelog = str_replace($zigcy_lite_changelog_before,'',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('== Changelog ==','<h2>== Changelog ==</h2>',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('*','<br/>*',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('== 1.0','<br/><br/>== 1.0',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('== 1.1','<br/><br/>== 1.1',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('== 1.2','<br/><br/>== 1.2',$zigcy_lite_changelog);
$zigcy_lite_changelog = str_replace('== 2.0','<br/><br/>== 2.0',$zigcy_lite_changelog);
echo ''.wp_kses_post($zigcy_lite_changelog);
echo '<hr />';
?>
</div>