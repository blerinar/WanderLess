<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Jorvik
 */

if ( ! is_active_sidebar( 'jorvik-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'jorvik-sidebar' ); ?>
</div><!-- #secondary -->
