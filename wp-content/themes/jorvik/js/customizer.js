/**
 * Theme Customizer enhancements for a better user experience
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously
 */

( function( $ ) {

	wp.customize('blogname', function( value ) {
		value.bind( function( to ) {
			$('.site-title a').text( to );
		} );
	} );
	wp.customize('blogdescription', function( value ) {
		value.bind( function( to ) {
			$('.site-description').text( to );
		} );
	} );

	wp.customize('header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( 'body' ).addClass( 'title-tagline-hidden' );
			} else {
				$( 'body' ).removeClass( 'title-tagline-hidden' );
				$('.site-title a, .site-description').css('color', to );
			}			
		} );
	} );

	wp.customize('hi_color', function( value ) {
		value.bind( function( to ) {
			var styleBackground = '.button:hover,a.button:hover,button:hover,input[type="button"]:hover,input[type="reset"]:hover,input[type="submit"]:hover,#top-bar a.button,#top-bar button,#top-bar input[type="button"],#top-bar input[type="reset"],#top-bar input[type="submit"],#colophon h5.widget-title:after,.jorvik-modal,.woocommerce #respond input#submit:hover,.woocommerce a.button:hover,.woocommerce button.button:hover,.woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover,.woocommerce a.button.alt:hover,.woocommerce button.button.alt:hover,.woocommerce input.button.alt:hover{background:' + to + ';}';			
			var styleBgColor = '.woocommerce span.onsale{background-color:' + to + ';}';
			var styleColor = 'a,a:hover,a:focus,a:active,.single-entry-content a,.entry-title:before,.entry-title:after,.entry-header .entry-title a:hover,.entry-footer span.tags-links,.comment-list a:hover,.comment-navigation .nav-previous a,.comment-navigation .nav-next a,#top-bar a,#top-bar a:hover,#top-bar .fa,#primary-menu li a:hover,#primary-menu li.current-menu-item a,#primary-menu li:hover.menu-item-has-children:after,#primary-menu ul li a:hover,.pagination a:hover,.pagination .current,.site-search a.jorvik-account:hover,.site-search a.jorvik-search:hover,.site-search a.jorvik-cart:hover,.site-search a.wishlist_products_counter:hover,.site-search a.jorvik-cart.items,.site-search a.jorvik-cart.items .item-count,#wc-sticky-addtocart .options-button,#add_payment_method .cart-collaterals .cart_totals .discount td,.woocommerce-cart .cart-collaterals .cart_totals .discount td,.woocommerce-checkout .cart-collaterals .cart_totals .discount td,.woocommerce nav.woocommerce-pagination ul li a:focus,.woocommerce nav.woocommerce-pagination ul li a:hover,.woocommerce nav.woocommerce-pagination ul li span.current{color:' + to + ';}';		
			var styleBorderColor = '.sticky,#primary-menu > li:hover,#primary-menu > li.current-menu-item,.woocommerce-info,.woocommerce-message{border-color:' + to + ';}';
			var styleBorderLeftColor = '.comment-navigation .nav-next a:after{border-left-color:' + to + ';}';
			var styleBorderRightColor = '.comment-navigation .nav-previous a:after{border-right-color:' + to + ';}';
			var styleSocialMenu = '.button,a.button,button,input[type="button"],input[type="reset"],input[type="submit"],#footer-menu a[href*="codepen.io"]:before,#footer-menu a[href*="digg.com"]:before,#footer-menu a[href*="dribbble.com"]:before,#footer-menu a[href*="dropbox.com"]:before,#footer-menu a[href*="facebook.com"]:before,#footer-menu a[href*="flickr.com"]:before,#footer-menu a[href*="foursquare.com"]:before,#footer-menu a[href*="plus.google.com"]:before,#footer-menu a[href*="github.com"]:before,#footer-menu a[href*="instagram.com"]:before,#footer-menu a[href*="linkedin.com"]:before,#footer-menu a[href*="pinterest.com"]:before,#footer-menu a[href*="getpocket.com"]:before,#footer-menu a[href*="reddit.com"]:before,#footer-menu a[href*="skype.com"]:before,#footer-menu a[href*="stumbleupon.com"]:before,#footer-menu a[href*="tumblr.com"]:before,#footer-menu a[href*="twitter.com"]:before,#footer-menu a[href*="vimeo.com"]:before,#footer-menu a[href*="wordpress.com"]:before,#footer-menu a[href*="wordpress.org"]:before,#footer-menu a[href*="youtube.com"]:before,#footer-menu a[href^="mailto:"]:before,#footer-menu a[href*="spotify.com"]:before,#footer-menu a[href*="twitch.tv"]:before,#footer-menu a[href$="/feed/"]:before,.woocommerce #respond input#submit,.woocommerce a.button,.woocommerce button.button,.woocommerce input.button,.woocommerce #respond input#submit.alt,.woocommerce a.button.alt,.woocommerce button.button.alt,.woocommerce input.button.alt,.woocommerce #respond input#submit.alt.disabled,.woocommerce #respond input#submit.alt.disabled:hover,.woocommerce #respond input#submit.alt:disabled,.woocommerce #respond input#submit.alt:disabled:hover,.woocommerce #respond input#submit.alt:disabled[disabled],.woocommerce #respond input#submit.alt:disabled[disabled]:hover,.woocommerce a.button.alt.disabled,.woocommerce a.button.alt.disabled:hover,.woocommerce a.button.alt:disabled,.woocommerce a.button.alt:disabled:hover,.woocommerce a.button.alt:disabled[disabled],.woocommerce a.button.alt:disabled[disabled]:hover,.woocommerce button.button.alt.disabled,.woocommerce button.button.alt.disabled:hover,.woocommerce button.button.alt:disabled,.woocommerce button.button.alt:disabled:hover,.woocommerce button.button.alt:disabled[disabled],.woocommerce button.button.alt:disabled[disabled]:hover,.woocommerce input.button.alt.disabled,.woocommerce input.button.alt.disabled:hover,.woocommerce input.button.alt:disabled,.woocommerce input.button.alt:disabled:hover,.woocommerce input.button.alt:disabled[disabled],.woocommerce input.button.alt:disabled[disabled]:hover{box-shadow: inset 0 0 0 ' + to + ';}';
			var styleSocialMenuHover = '#footer-menu a[href*="codepen.io"]:hover:before,#footer-menu a[href*="digg.com"]:hover:before,#footer-menu a[href*="dribbble.com"]:hover:before,#footer-menu a[href*="dropbox.com"]:hover:before,#footer-menu a[href*="facebook.com"]:hover:before,#footer-menu a[href*="flickr.com"]:hover:before,#footer-menu a[href*="foursquare.com"]:hover:before,#footer-menu a[href*="plus.google.com"]:hover:before,#footer-menu a[href*="github.com"]:hover:before,#footer-menu a[href*="instagram.com"]:hover:before,#footer-menu a[href*="linkedin.com"]:hover:before,#footer-menu a[href*="pinterest.com"]:hover:before,#footer-menu a[href*="getpocket.com"]:hover:before,#footer-menu a[href*="reddit.com"]:hover:before,#footer-menu a[href*="skype.com"]:hover:before,#footer-menu a[href*="stumbleupon.com"]:hover:before,#footer-menu a[href*="tumblr.com"]:hover:before,#footer-menu a[href*="twitter.com"]:hover:before,#footer-menu a[href*="vimeo.com"]:hover:before,#footer-menu a[href*="wordpress.com"]:hover:before,#footer-menu a[href*="wordpress.org"]:hover:before,#footer-menu a[href*="youtube.com"]:hover:before,#footer-menu a[href^="mailto:"]:hover:before,#footer-menu a[href*="spotify.com"]:hover:before,#footer-menu a[href*="twitch.tv"]:hover:before,#footer-menu a[href$="/feed/"]:hover:before{background:' + to + ';box-shadow: inset 0 -40px 0 ' + to + ';}';
			$('head').append('<style>' + styleBackground + styleBgColor + styleColor + styleBorderColor + styleBorderLeftColor + styleBorderRightColor + styleSocialMenu + styleSocialMenuHover + '</style>');
		} );
	} );

} )( jQuery );
