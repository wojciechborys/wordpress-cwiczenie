<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

//Enqueue CSS and Javascript async

function enqueue_scripts() {
	$the_theme = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );
	//LoadCSS - Use the 'loadCSS_parser()' function to implement loadCSS to CSS scripts below
	//LoadCSS v2.1.0 - See https://github.com/filamentgroup/loadCSS/
	wp_enqueue_script( 'loadCSS', get_template_directory_uri() . '/js/vendors/cssrelpreload.js', false, null, false );
	
	//Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap', false );   //Disable if you're not using this
	
	//Critical CSS Inline styling - To prevent a flashof unstyled HTML when using LoadCSS, disable if you're not using this
	//Use https://jonassebastianohlsson.com/criticalpathcssgenerator/ or the 'grunt-criticalcss' wrapper with Grunt
	wp_register_style( 'site-critical', false );
	wp_enqueue_style( 'site-critical' );
	wp_add_inline_style( 'site-critical', file_get_contents(get_stylesheet_directory() . '/css/critical.min.css'), array( 'google-fonts' ) );	//Depends on 'google-fonts'

	wp_enqueue_style( 'bootstrap-styles', get_stylesheet_directory_uri() . '/css/vendors/bootstrap.min.css', array(), $theme_version );
	wp_enqueue_style( 'swipercss', get_stylesheet_directory_uri() . '/css/vendors/swiper.min.css', array(), $theme_version );

	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'swiperjs', get_template_directory_uri() . '/js/vendors/swiper.min.js', array(), $theme_version, true );
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/specified/scripts.js', array(), $theme_version, true );
	wp_enqueue_script( 'lozad', get_template_directory_uri() . '/js/vendors/lozad.js', array(), $theme_version, true );

	if(is_front_page() || is_page('fluegeltore') || is_page('schiebetore') || is_page('pforte') ) {
		wp_enqueue_script( 'lightboxjs', get_template_directory_uri() . '/js/vendors/baguetteBox.min.js', array(), $theme_version, true );
		wp_enqueue_style( 'lightboxcss', get_stylesheet_directory_uri() . '/css/vendors/baguetteBox.min.css', array(), $theme_version );
		wp_enqueue_script( 'initLightbox', get_template_directory_uri() . '/js/specified/initializeLightbox.js', array(), $theme_version, true );
	}

	if(!is_user_logged_in()) {
		wp_enqueue_style( 'custom_admin_css', get_template_directory_uri() . '/css/login.css', array() );
	}

	//CSS - Remove any references to this file from your theme. i.e. in header.php, as it will be loaded here instead
	//E.g. bloginfo('stylesheet_url');
	wp_enqueue_style( 'site', get_template_directory_uri() . '/style.css', array( 'site-critical' ) );   //Your website's CSS, depends on 'site-critical'
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts', 15 );   //Prirority: 1 (High)
