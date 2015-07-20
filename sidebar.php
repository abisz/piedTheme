<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package piedTheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<?php
//no sidebar for single
if(!is_single()) {
    ?>
    <div id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div><!-- #secondary -->

<?php
}
    ?>