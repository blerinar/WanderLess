<?php
/**
 * Jorvik functions and definitions
 *
 * @package Jorvik
 */

if ( ! function_exists( 'jorvik_setup' ) ) :

//Sets up theme defaults and registers support for various WordPress features

function jorvik_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'jorvik', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title
	add_theme_support( 'title-tag' );

	// Support for WooCommerce
	add_theme_support( 'woocommerce' );

	//Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'jorvik' ),
		'footer' => esc_html__( 'Footer Menu', 'jorvik' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Enable support for post formats
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );

	// Set up the WordPress core custom background feature
	add_theme_support( 'custom-background', apply_filters( 'jorvik_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for Custom Logo
	add_theme_support( 'custom-logo', array(
		'width'		=> '520',
		'height'	=> '130',
		'flex-height' => true,
		'flex-width'  => true,
	) );

	// Enable support for widgets selective refresh
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Style the visual editor to resemble the theme style
	add_editor_style( array( 'css/editor-style.css', jorvik_editor_fonts_url() ) );

	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

}
endif; // jorvik_setup
add_action( 'after_setup_theme', 'jorvik_setup' );

function jorvik_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'jorvik_content_width', 1160 );
}
add_action( 'after_setup_theme', 'jorvik_content_width', 0 );

// Set up the WordPress core custom header feature
function jorvik_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jorvik_custom_header_args', array(
		'default-image'			=> '',
		'default-text-color'	=> '1b161c',
		'header_text'			=> true,
		'width'					=> 1920,
		'height'				=> 200,
		'flex-height'			=> false,
		'flex-width'			=> false,
		'wp-head-callback'		=> '',
	) ) );
}
add_action( 'after_setup_theme', 'jorvik_custom_header_setup' );

// Enables the Excerpt meta box in Page edit screen
function jorvik_add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'jorvik_add_excerpt_support_for_pages' );

// Register widget area
function jorvik_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'jorvik' ),
		'id'            => 'jorvik-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Page Sidebar', 'jorvik' ),
		'id'            => 'jorvik-sidebar-page',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'jorvik' ),
		'id'            => 'jorvik-sidebar-shop',
		'description'   => esc_html__( 'Requires WooCommerce plugin.', 'jorvik' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Top Bar', 'jorvik' ),
		'id'            => 'jorvik-top-bar',
		'description'   => esc_html__( 'Add your own content above the header.', 'jorvik' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<b>',
		'after_title'   => '</b>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'jorvik' ),
		'id'            => 'jorvik-footer1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'jorvik' ),
		'id'            => 'jorvik-footer2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'jorvik' ),
		'id'            => 'jorvik-footer3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Middle Footer', 'jorvik' ),
		'id'            => 'jorvik-about-footer',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

}
add_action( 'widgets_init', 'jorvik_widgets_init' );

if ( ! function_exists( 'jorvik_fonts_url' ) ) :
/**
 * Register Google fonts for Jorvik
 * @return string Google fonts URL for the theme
 */
function jorvik_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google fonts: on or off', 'jorvik' ) ) {

		$fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$fonts[] = 'Libre Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'jorvik' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' =>  urlencode( implode( '|', array_unique($fonts) ) ),
			'subset' =>  urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return esc_url_raw($fonts_url);
}
endif;

if ( ! function_exists( 'jorvik_editor_fonts_url' ) ) :
/**
 * Register Google fonts for Jorvik
 * @return string Google fonts URL for the tinyMCE editor
 */
function jorvik_editor_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google fonts: on or off', 'jorvik' ) ) {

		$fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
		$fonts[] = 'Libre Franklin:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';

	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'jorvik' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' =>  urlencode( implode( '|', array_unique($fonts) ) ),
			'subset' =>  urlencode( $subsets ),
		), '//fonts.googleapis.com/css' );
	}

	return esc_url_raw($fonts_url);
}
endif;

/**
 * Enqueue scripts and styles.
 */
function jorvik_scripts() {
	if ( is_home() || is_archive() || is_search() ) {
		$grid_layout = get_theme_mod( 'grid_layout', 'masonry' );
		if ( !$grid_layout || $grid_layout == 'masonry' ) {
			wp_enqueue_script( 'masonry' );
			wp_enqueue_script( 'jorvik-masonry', get_template_directory_uri() . '/js/jorvik-masonry.js', array( 'jquery' ), '1.1', true );
		}
	}
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.3', true );
	wp_enqueue_script( 'jorvik-custom', get_template_directory_uri() . '/js/jorvik-custom.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_style( 'jorvik-fonts', jorvik_fonts_url(), array(), null );
	wp_enqueue_style( 'jorvik-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'jorvik-style', get_stylesheet_uri() );
	wp_add_inline_style( 'jorvik-style', jorvik_dynamic_style() );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jorvik_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/functions/template-tags.php';

/**
 * Custom functions.
 */
require get_template_directory() . '/functions/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/functions/customizer.php';

/**
 * Theme help page.
 */
if ( is_admin() ) {
	require get_template_directory() . '/functions/theme-help.php';
}

/**
 * TGM Plugin activation.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_once get_template_directory() . '/functions/class-tgm-plugin-activation.php';
	add_action( 'tgmpa_register', 'jorvik_reg_plugin' );
}
function jorvik_reg_plugin() {
    $plugins[] = array(
    		// Translators: If the plugin name in your language is the same, do not translate into your own language.
            'name'               => esc_html__( 'WooCommerce Wishlist Plugin', 'jorvik' ),
            'slug'               => 'ti-woocommerce-wishlist',
            'required'           => false,
    );
    tgmpa( $plugins);
}