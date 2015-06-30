<?php
/**
 * piedTheme functions and definitions
 *
 * @package piedTheme
 */

if ( ! function_exists( 'piedtheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function piedtheme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on piedTheme, use a find and replace
	 * to change 'piedtheme' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'piedtheme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'piedtheme' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
//		'image',
//		'video',
//		'quote',
//		'link',
	) );

	// Set up the WordPress core custom background feature.
//	add_theme_support( 'custom-background', apply_filters( 'piedtheme_custom_background_args', array(
//		'default-color' => 'ffffff',
//		'default-image' => '',
//	) ) );
}
endif; // piedtheme_setup
add_action( 'after_setup_theme', 'piedtheme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function piedtheme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'piedtheme_content_width', 700 );
}
add_action( 'after_setup_theme', 'piedtheme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function piedtheme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'piedtheme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'piedtheme_widgets_init' );

/**
 * Enqueue scripts and styles.
 *
 */
function piedtheme_scripts() {
	wp_enqueue_style( 'piedtheme-style', get_stylesheet_uri() );

    wp_enqueue_style( 'piedtheme-layout-style' , get_template_directory_uri() . '/layouts/content-sidebar.css');

    wp_enqueue_style('piedtheme-fonts', 'http://fonts.googleapis.com/css?family=Bitter:400,700|Raleway:400,100,700');

    wp_enqueue_style('piedtheme-fontawesome', 'http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');

    wp_enqueue_script( 'piedtheme-superfish', get_template_directory_uri() . '/js/superfish.min.js', array('jquery'), '20140328', true );

    wp_enqueue_script( 'piedtheme-superfish-settings', get_template_directory_uri() . '/js/superfish-settings.js', array('piedtheme-superfish'), '20140328', true );

    wp_enqueue_script( 'piedtheme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'piedtheme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

    wp_enqueue_script( 'pidetheme-hide-search', get_template_directory_uri() . '/js/hide-search.js', array(), '20140404', true );


    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'piedtheme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
