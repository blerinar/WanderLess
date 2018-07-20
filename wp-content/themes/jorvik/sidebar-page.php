<?php
/**
 * The sidebar containing the main widget area for pages
 *
 * @package Jorvik
 */

if ( ! is_active_sidebar( 'jorvik-sidebar-page' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'jorvik-sidebar-page' ); ?>
</div><!-- #secondary -->
