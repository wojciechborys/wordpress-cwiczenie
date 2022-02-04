<?php
/**
 * Theme basic setup.
 *
 * @package brandpixel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Set the content width based on the theme's design and stylesheet.
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

add_action( 'after_setup_theme', 'brandpixel_setup' );

if ( ! function_exists ( 'brandpixel_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brandpixel_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on iconbrand, use a find and replace
		 * to change 'iconbrand' to the name of your theme in all the template files
		 */

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'high' => __( 'Górna belka', 'creavity' ),
			'header' => __( 'Nawigacja', 'creavity' ),
			'footer-1' => __( 'Footer 1', 'creavity' ),
			'footer-2' => __( 'Footer 2', 'creavity' ),
			'footer-3' => __( 'Footer 3', 'creavity' ),
			'footer-4' => __( 'Footer 4', 'creavity' ),
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
		 * Adding Thumbnail basic support
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Adding support for Widget edit icons in customizer
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
		) );

	}
}

// Custom 503, 403 and 500 Error messages templates. Dont modify HTACCESS file, this function does it automatically. 
function brandpixel_custom_error_pages() {

    // Get HTACCESS path & dynamic website url
    $htaccess_file = '.htaccess';
    $website_url = get_bloginfo('url').'/';

    // Check & prevent writing error pages more than once
    $check_file = file_get_contents($htaccess_file);
    $this_string = '# BEGIN WordPress Error Pages';

    if( strpos( $check_file, $this_string ) === false) {

    // Setup Error page locations dynamically
    $error_pages .= PHP_EOL. PHP_EOL . '# BEGIN WordPress Error Pages'. PHP_EOL. PHP_EOL;
    $error_pages .= 'ErrorDocument 403 '.$website_url.'error-403'.PHP_EOL;
	$error_pages .= 'ErrorDocument 500 '.$website_url.'error-500'.PHP_EOL;
	$error_pages .= 'ErrorDocument 503 '.$website_url.'error-503'.PHP_EOL;
    $error_pages .= PHP_EOL. '# END WordPress Error Pages'. PHP_EOL;

    // Write the error page locations to HTACCESS
    $htaccess = fopen( $htaccess_file, 'a+');
    fwrite( $htaccess, $error_pages );
    fclose($htaccess);

    }
}

add_action('init','brandpixel_custom_error_pages'); // This will run the function everytime, not ideal!

// register_activation_hook( __FILE__, 'royal_custom_error_pages' ); // Using a plugin, runs only once!