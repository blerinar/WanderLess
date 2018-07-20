<?php
/**
 * The theme header.
 *
 * @package Jorvik
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<?php $header_layout = get_theme_mod( 'header_layout' ); 
		if ( !$header_layout || $header_layout == '1' ) {
			$masthead_class = '';
		} else {
			$masthead_class = ' header-style-' . $header_layout;
		}
	?>
	<header id="masthead" class="site-header<?php echo $masthead_class;?>">

		<?php if ( is_active_sidebar( 'jorvik-top-bar' ) ) : ?>
		<div id="top-bar">
			<div class="container">
				<?php 
					dynamic_sidebar( 'jorvik-top-bar' );
				?>
			</div>
		</div>
		<?php endif; ?>

		<?php if ( get_theme_mod( 'header_layout' ) == '2' ) {
			jorvik_header_site_title();
			jorvik_header_menu();
		} else {
			jorvik_header_menu();
			jorvik_header_site_title();
		} ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content clearfix">
		<div class="container clearfix">
