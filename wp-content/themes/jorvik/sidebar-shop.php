<?php
/**
 * The sidebar containing the main widget area for WooCommerce archives
 *
 * @package Jorvik
 */

if ( ! is_active_sidebar( 'jorvik-sidebar-shop' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'jorvik-sidebar-shop' ); ?>
</div><!-- #secondary -->
