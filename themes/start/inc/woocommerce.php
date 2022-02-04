<?php
/**
 * Add WooCommerce support
 *
 * @package brandpixel
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'after_setup_theme', 'brandpixel_woocommerce_support' );
if ( ! function_exists( 'brandpixel_woocommerce_support' ) ) {
	/**
	 * Declares WooCommerce theme support.
	 */
	function brandpixel_woocommerce_support() {
		add_theme_support( 'woocommerce' );

		// Add New Woocommerce 3.0.0 Product Gallery support
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-slider' );
	}
}

/**
* First unhook the WooCommerce wrappers
*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

/**
* Then hook in your own functions to display the wrappers your theme requires
*/
add_action('woocommerce_before_main_content', 'brandpixel_woocommerce_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'brandpixel_woocommerce_wrapper_end', 10);
if ( ! function_exists( 'brandpixel_woocommerce_wrapper_start' ) ) {
	function brandpixel_woocommerce_wrapper_start() {
		$container   = get_theme_mod( 'brandpixel_container_type' );
		echo '<div class="wrapper" id="woocommerce-wrapper">';
	  echo '<div class="' . esc_attr( $container ) . '" id="content" tabindex="-1">';
		echo '<div class="row">';
		echo '<main class="col-md-8" id="main">';
	}
}
if ( ! function_exists( 'brandpixel_woocommerce_wrapper_end' ) ) {
function brandpixel_woocommerce_wrapper_end() {
	echo '</main><!-- #main -->';
	get_sidebar();
  	echo '</div><!-- .row -->';
	echo '</div><!-- Container end -->';
	echo '</div><!-- Wrapper end -->';
	}
}
