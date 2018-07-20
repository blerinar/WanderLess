<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Jorvik
 */

/**
 * Adds custom classes to the array of body classes
 *
 * @param array $classes Classes for the body element
 * @return array
 */
function jorvik_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_theme_mod( 'header_textcolor' ) == 'blank' ) {
		$classes[] = 'title-tagline-hidden';
	}

	if ( post_password_required() ) {
		$classes[] = 'post-password-required';
	}

	$sidebar_position = get_theme_mod( 'sidebar_position' );
	if ( $sidebar_position == "left" ) {
		$classes[] = 'sidebar-left';
	}

	return $classes;
}
add_filter( 'body_class', 'jorvik_body_classes' );


function jorvik_primary_menu_fallback() {
	if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
		echo '<div><ul id="primary-menu" class="clearfix"><li class="menu-item"><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Create your Primary Menu here', 'jorvik' ) . '</a></li></ul></div>';
	} else {
		return;
	}

}


function jorvik_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'jorvik_custom_excerpt_length', 999 );


function jorvik_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'jorvik_excerpt_more' );


function jorvik_archive_title_prefix( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="author vcard">' . get_avatar( get_the_author_meta( 'ID' ), '80' ) . esc_html( get_the_author() ) . '</span>' ;
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'jorvik_archive_title_prefix' );


function jorvik_css_font_family($font_family) {
	$font_family = substr($font_family, 0, strpos($font_family, ':' ));
	return esc_attr($font_family);
}


function jorvik_dynamic_style( $css = array() ){

	$header_textcolor = get_theme_mod( 'header_textcolor', '1b161c' );
	if ( $header_textcolor && $header_textcolor != '1b161c' && $header_textcolor != 'blank' ) {
		$css[] = '.site-title a,.site-description{color:#' . esc_attr($header_textcolor) . ';}';
	}

	$header_bg = get_header_image();
	if ( $header_bg ) {
		$css[] = '#masthead{background-image: '.'url( ' . $header_bg . ' )}';
	}

	$hi_color = get_theme_mod( 'hi_color', '#36acde' );
	if ( $hi_color && $hi_color != '#36acde' ) {
		$hi_color = esc_attr($hi_color);
		$css[] = '.button:hover,a.button:hover,button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,#top-bar a.button,#top-bar button,#top-bar input[type="button"],#top-bar input[type="reset"],#top-bar input[type="submit"],#colophon h5.widget-title:after,.jorvik-modal{background:' . $hi_color . ';}';
		$css[] = 'a,a:hover,a:focus,a:active,.single-entry-content a,.entry-title:before,.entry-title:after,.entry-header .entry-title a:hover,.entry-footer span.tags-links,.comment-list a:hover,.comment-navigation .nav-previous a,.comment-navigation .nav-next a,#top-bar a,#top-bar a:hover,#top-bar .fa,#primary-menu li a:hover,#primary-menu li.current-menu-item a,#primary-menu li:hover.menu-item-has-children:after,#primary-menu ul li a:hover,.pagination a:hover,.pagination .current,.site-search a.jorvik-account:hover,.site-search a.jorvik-search:hover{color:' . $hi_color . ';}';
		$css[] = '.sticky,#primary-menu > li:hover,#primary-menu > li.current-menu-item{border-color:' . $hi_color . ';}';
		$css[] = '.comment-navigation .nav-next a:after{border-left-color:' . $hi_color . ';}';
		$css[] = '.comment-navigation .nav-previous a:after{border-right-color:' . $hi_color . ';}';
		$css[] = '.button,a.button,button,input[type="button"],input[type="reset"],input[type="submit"],#footer-menu a[href*="codepen.io"]:before,#footer-menu a[href*="digg.com"]:before,#footer-menu a[href*="dribbble.com"]:before,#footer-menu a[href*="dropbox.com"]:before,#footer-menu a[href*="facebook.com"]:before,#footer-menu a[href*="flickr.com"]:before,#footer-menu a[href*="foursquare.com"]:before,#footer-menu a[href*="plus.google.com"]:before,#footer-menu a[href*="github.com"]:before,#footer-menu a[href*="instagram.com"]:before,#footer-menu a[href*="linkedin.com"]:before,#footer-menu a[href*="pinterest.com"]:before,#footer-menu a[href*="getpocket.com"]:before,#footer-menu a[href*="reddit.com"]:before,#footer-menu a[href*="skype.com"]:before,#footer-menu a[href*="stumbleupon.com"]:before,#footer-menu a[href*="tumblr.com"]:before,#footer-menu a[href*="twitter.com"]:before,#footer-menu a[href*="vimeo.com"]:before,#footer-menu a[href*="wordpress.com"]:before,#footer-menu a[href*="wordpress.org"]:before,#footer-menu a[href*="youtube.com"]:before,#footer-menu a[href^="mailto:"]:before,#footer-menu a[href*="spotify.com"]:before,#footer-menu a[href*="twitch.tv"]:before,#footer-menu a[href$="/feed/"]:before{box-shadow: inset 0 0 0 ' . $hi_color . ';}';
		$css[] = '#footer-menu a[href*="codepen.io"]:hover:before,#footer-menu a[href*="digg.com"]:hover:before,#footer-menu a[href*="dribbble.com"]:hover:before,#footer-menu a[href*="dropbox.com"]:hover:before,#footer-menu a[href*="facebook.com"]:hover:before,#footer-menu a[href*="flickr.com"]:hover:before,#footer-menu a[href*="foursquare.com"]:hover:before,#footer-menu a[href*="plus.google.com"]:hover:before,#footer-menu a[href*="github.com"]:hover:before,#footer-menu a[href*="instagram.com"]:hover:before,#footer-menu a[href*="linkedin.com"]:hover:before,#footer-menu a[href*="pinterest.com"]:hover:before,#footer-menu a[href*="getpocket.com"]:hover:before,#footer-menu a[href*="reddit.com"]:hover:before,#footer-menu a[href*="skype.com"]:hover:before,#footer-menu a[href*="stumbleupon.com"]:hover:before,#footer-menu a[href*="tumblr.com"]:hover:before,#footer-menu a[href*="twitter.com"]:hover:before,#footer-menu a[href*="vimeo.com"]:hover:before,#footer-menu a[href*="wordpress.com"]:hover:before,#footer-menu a[href*="wordpress.org"]:hover:before,#footer-menu a[href*="youtube.com"]:hover:before,#footer-menu a[href^="mailto:"]:hover:before,#footer-menu a[href*="spotify.com"]:hover:before,#footer-menu a[href*="twitch.tv"]:hover:before,#footer-menu a[href$="/feed/"]:hover:before{background:' . $hi_color . ';box-shadow: inset 0 -40px 0 ' . $hi_color . ';}';
		if ( class_exists( 'WooCommerce' ) ) {
			$css[] = '.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover{background:' . $hi_color . ';}';
			$css[] = '.woocommerce span.onsale{background-color:' . $hi_color . ';}';
			$css[] = '.site-search a.jorvik-cart:hover,.site-search a.wishlist_products_counter:hover,.site-search a.jorvik-cart.items,.site-search a.jorvik-cart.items .item-count,#wc-sticky-addtocart .options-button,#add_payment_method .cart-collaterals .cart_totals .discount td,.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce-checkout .cart-collaterals .cart_totals .discount td,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current{color:' . $hi_color . ';}';
			$css[] = '.woocommerce-info,.woocommerce-message{border-color:' . $hi_color . ';}';
			$css[] = '.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover{box-shadow: inset 0 0 0 ' . $hi_color . ';}';
		}
	}

	return implode( '', $css );

}


if(!function_exists( 'jorvik_header_menu' )){
	function jorvik_header_menu(){
		?>
		<div class="container">
	        <a href="#x" class="jorvik-overlay" id="search"></a>
	        <div class="jorvik-modal">
	            <div class="close-this"><a class="fa fa-window-close" href="#close"></a></div>
				<?php if ( class_exists( 'WooCommerce' ) ) {
					jorvik_woocommerce_search_form();
				} else {
					get_search_form();
				}
				?>
	        </div>
	    </div>

		<div id="site-navigation" role="navigation">
			<div class="container clearfix">
				<a class="toggle-nav" href="javascript:void(0);"><span></span></a>

				<div class="site-main-menu">
				<?php wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'fallback_cb'    => 'jorvik_primary_menu_fallback',
					)
				); ?>
				</div>

				<div class="site-search">
					<a class="jorvik-search" href="#search" role="button"><span class="fa fa-search"></span></a>
				<?php if ( class_exists( 'WooCommerce' ) ) {
					$woo_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
					if ( $woo_account_page_id ) {
  						$woo_account_page_url = get_permalink( $woo_account_page_id );
  						if ( is_user_logged_in() ) {
							$woo_account_icon = 'user';
						} else {
							$woo_account_icon = 'sign-in';
						}
  						$woo_account_link = '<a class="jorvik-account" href="' . $woo_account_page_url . '" role="button"><span class="fa fa-' . $woo_account_icon . '"></span></a>';
					} else {
						$woo_account_link = '';
					}

					$cart_items = WC()->cart->get_cart_contents_count();
					if ( $cart_items > 0 ) {
						$cart_class = ' items';
					} else {
						$cart_class = '';
					}
				?>

					<?php if ( class_exists( 'TInvWL' ) ) { ?>
					<?php echo do_shortcode( '[ti_wishlist_products_counter show_icon="off" show_text="off"]' ); ?>
					<?php } ?>

					<a class="jorvik-cart<?php echo $cart_class; ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="fa fa-shopping-bag"><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></span></a>
				<?php 
					echo $woo_account_link;
				} ?>					
				</div>

			</div>
		</div>
		<?php
	}
}


/**
 * Update header mini-cart contents when products are added to the cart via AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'jorvik_wc_add_to_cart_fragments' );

if(!function_exists( 'jorvik_wc_add_to_cart_fragments' )){
	function jorvik_wc_add_to_cart_fragments( $fragments ) {
		$cart_items = WC()->cart->get_cart_contents_count();
		if ( $cart_items > 0 ) {
			$cart_class = ' items';
		} else {
			$cart_class = '';
		}
		ob_start();
		?>
					<a class="jorvik-cart<?php echo $cart_class; ?>" href="<?php echo esc_url( wc_get_cart_url() ); ?>" role="button"><span class="fa fa-shopping-bag"><?php echo sprintf ( '<span class="item-count">%d</span>', $cart_items ); ?></span></a>					
		<?php	
		$fragments['a.jorvik-cart'] = ob_get_clean();	
		return $fragments;
	}
}


if(!function_exists( 'jorvik_header_site_title' )){
	function jorvik_header_site_title(){
		?>
		<div class="container clearfix">

			<div id="site-branding">
				<?php if ( get_theme_mod( 'custom_logo' ) ) {
						the_custom_logo();
					} else { ?>
					<?php if ( is_front_page() ) { ?>
						<h1 class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
						<p class="site-title"><a class="<?php echo esc_attr( get_theme_mod( 'site_title_style' ) );?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php } 
					} ?>
				
			</div><!-- #site-branding -->

			<div class="site-description"><?php bloginfo( 'description' ); ?></div>

		</div>
		<?php
	}
}


/**
 * Powered by WordPress
 */
if(!function_exists( 'jorvik_powered_by' )){
	function jorvik_powered_by(){
		?>
				<div class="site-info">
					<?php if ( function_exists( 'the_privacy_policy_link' ) && !jorvik_privacy_in_menu() ) {
						the_privacy_policy_link( '', '<span class="sep privacy"> | </span>' );
					} ?>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'jorvik' ) ); ?>"><?php printf( esc_html__( 'Powered by %s', 'jorvik' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<?php printf( esc_html__( 'Theme: %2$s by %1$s', 'jorvik' ), 'uXL Themes', '<a href="https://uxlthemes.com/theme/jorvik/" rel="designer">Jorvik</a>' ); ?>
				</div>
		<?php
	}
}


/**
 * Check if Privacy Policy page is already in theme primary or footer menu
 */
if(!function_exists( 'jorvik_privacy_in_menu' )){
	function jorvik_privacy_in_menu(){

		$menu_page_ids = array();

		$locations = get_nav_menu_locations();

		if ( has_nav_menu( 'primary' ) ) {
			$menu_name_primary = wp_get_nav_menu_object( $locations[ 'primary' ] );
			$menu_items_primary = wp_get_nav_menu_items( $menu_name_primary );
			foreach ( $menu_items_primary as $menu_item_primary ) {
				if ( $menu_item_primary->object == 'page' ) {
					$menu_page_ids[] = $menu_item_primary->object_id;
				}
			}
		}

		if ( has_nav_menu( 'footer' ) ) {
			$menu_name_footer = wp_get_nav_menu_object( $locations[ 'footer' ] );
			$menu_items_footer = wp_get_nav_menu_items( $menu_name_footer );
			foreach ( $menu_items_footer as $menu_item_footer ) {
				if ( $menu_item_footer->object == 'page' ) {
					$menu_page_ids[] = $menu_item_footer->object_id;
				}
			}
		}

		$privacy_policy_page_id = (int) get_option( 'wp_page_for_privacy_policy' );
		if ( ! empty( $privacy_policy_page_id ) && get_post_status( $privacy_policy_page_id ) === 'publish' && in_array( $privacy_policy_page_id, $menu_page_ids ) ) {
			return true;
		} else {
			return false;
		}

	}
}


/**
 * WooCommerce search form
 */
if(!function_exists( 'jorvik_woocommerce_search_form' )){
	function jorvik_woocommerce_search_form() {
	?>
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label class="search-label">
			<span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'jorvik' ); ?></span>
			<div>				
				<?php 
					$swp_cat_dropdown_args = array(
						'taxonomy' 		   => 'product_cat',
						'show_option_all'  => esc_html__( 'All', 'jorvik' ),
						'name'             => 'product_cat',
						'value_field'      => 'slug',
						'hierarchical'     => 1,
						'depth'            => 2,
					);
					wp_dropdown_categories( $swp_cat_dropdown_args );
				 ?>
				<input type="search" class="input-search" placeholder="<?php esc_attr_e( 'Search ', 'jorvik' ); ?>" value="<?php the_search_query(); ?>" name="s" title="<?php esc_attr_e( 'Search for:', 'jorvik' ); ?>">
				<input type="hidden" name="post_type" value="product">
				<button type="submit" ><i class="fa fa-search"></i></button>
			</div>
		</label>
	</form>
	<?php
	}
}


/**
 * WooCommerce product sticky cart form 
 */
if(!function_exists( 'jorvik_wc_sticky_addtocart' )){
	function jorvik_wc_sticky_addtocart(){

		if ( get_theme_mod( 'disable_wc_sticky_cart' ) == 1 ) {
			return;
		}

		if ( class_exists( 'WooCommerce' ) && is_product() ) {
			echo '<div id="wc-sticky-addtocart">';
			the_post_thumbnail( 'woocommerce_thumbnail' );
			woocommerce_template_single_title();
			woocommerce_template_single_price();
			if ( in_array( 'product-type-variable', get_post_class() ) ) {
				echo '<div class="options-button">' . esc_html__( 'options', 'jorvik' ) . '</div>';
			}
			woocommerce_template_single_add_to_cart();
			echo '</div>';
		}

	}
}


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

add_action( 'woocommerce_before_main_content', 'jorvik_theme_wrapper_start', 10);
add_action( 'woocommerce_after_main_content', 'jorvik_theme_wrapper_end', 10);

function jorvik_theme_wrapper_start() {
	if ( !is_active_sidebar( 'jorvik-sidebar-shop' ) || is_product() ) {
		$page_full_width = ' full-width';
	} else {
		$page_full_width = '';
	}
	echo '<div id="primary" class="content-area'.$page_full_width.'">';
}

function jorvik_theme_wrapper_end() {
	echo '</div>';
	if ( !is_product() ) {
	get_sidebar( 'shop' );
	}
}


function jorvik_change_prev_next( $args ){
	$args['prev_text'] = '<i class="fa fa-angle-left"></i>';
	$args['next_text'] = '<i class="fa fa-angle-right"></i>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'jorvik_change_prev_next' );