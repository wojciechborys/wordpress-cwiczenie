<?php
/**
 * brandpixel functions and definitions
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/pagination.php',                      // Custom pagination for this theme.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
    '/woocommerce.php',                     // Load custom Woocommerce functions.
);

foreach ( $includes as $file ) {
	$filepath = locate_template( '/inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opcje globalne',
		'menu_title'	=> 'Dane o zasięgu globalnym',
		'menu_slug' 	=> 'opcje-globalne',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Opcje globalne',
		'menu_title'	=> 'Opcje globalne',
		'parent_slug'	=> 'opcje-globalne',
	));
	
}

/*
add_shortcode ('woo_cart_but', 'woo_cart_but' );


function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <a class="menu-item cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a>
        <?php
	        
    return ob_get_clean();
 
}

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );

function woo_cart_but_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    ?>
    <div class="position-relative">
        <a class="cart-contents menu-item" href="<?php echo $cart_url; ?>" title="<?php _e( 'Zobacz swój koszyk' ); ?>"></a>
        <?php if ( $cart_count > 0 ): ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php endif; ?>
    </div>

    <?php
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}

add_filter( 'wp_nav_menu_top-menu_items', 'woo_cart_but_icon', 10, 2 ); // Change menu to suit - example uses 'top-menu'

function woo_cart_but_icon ( $items, $args ) {
       $items .=  '[woo_cart_but]'; // Adding the created Icon via the shortcode already created
       
       return $items;
}
*/


/*
Plugin Name: WYSIWYG Plus
Author: Wojciech Borys
Author URI: https://creavity.pl/
Description: Plugin rozszerzający możliwości standardowego edytora WYSIWYG
*/

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

function my_mce_before_init_insert_formats( $init_array ) {  

    $style_formats = array(  
        array(  
            'title' => 'Tekst - normalny',  
            'block' => 'p',  
            'classes' => 'normal-text-regular',
            'wrapper' => false,
        ),  

        array(  
            'title' => 'Tekst - pogrubiony',  
            'block' => 'b',  
            'classes' => 'large-text-bold',
            'wrapper' => true,
        ),  

        array(  
            'title' => 'Tekst - powiększony',  
            'block' => 'p',  
            'classes' => 'large-text-regular',
            'wrapper' => false,
        ),  
        
        array(  
            'title' => 'Tekst średniej wielkości',  
            'block' => 'p',  
            'classes' => 'medium-text-regular',
            'wrapper' => false,
        ),  

        array(  
            'title' => 'Tekst - mniejszy pogrubiony',  
            'block' => 'small',  
            'classes' => 'small-text-bold',
            'wrapper' => false,
        ),  

        array(  
            'title' => 'Tekst - mniejszy',  
            'inline' => 'small',
            'classes' => 'small-text-regular',
            'wrapper' => false,
        ), 

        array(  
            'title' => 'Tekst - mniejszy',  
            'inline' => 'small',
            'classes' => 'small-text-regular',
            'wrapper' => false,
        ), 

        array(  
            'title' => 'Przycisk główny kolor ',  
            'block' => 'a',
            'classes' => 'button-primary-big',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk średni główny kolor',  
            'block' => 'a',
            'classes' => 'button-medium',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk średni główny kolor (z obramowaniem)',  
            'block' => 'a',
            'classes' => 'button-medium-border',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk średni czarny kolor (z obramowaniem)',  
            'block' => 'a',
            'classes' => 'button-medium-black-border',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk główny kolor mały',  
            'block' => 'a',
            'classes' => 'button-small-main',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk główny kolor mały (z obramowaniem)',  
            'block' => 'a',
            'classes' => 'button-small-main-border',
            'wrapper' => true,
        ), 

        array(  
            'title' => 'Przycisk czarny kolor mały (z obramowaniem)',  
            'block' => 'a',
            'classes' => 'button-small-black-border',
            'wrapper' => true,
        ), 
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
    
    return $init_array;  

}

    
/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

/**
 * Paginacja na blogu, kod z WP Beginner.
 * @autor Wojciech Borys @Creavity
 */

function numeric_posts_nav() {
 
    if( is_singular() )
        return;
 
    global $wp_query;
 
    /** Stop execution if there's only 1 page */
    if( $wp_query->max_num_pages <= 1 )
        return;
 
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
 
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
 
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
 
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
 
    echo '<div class="navigation"><ul>' . "\n";
 
    /** Previous Post Link */
    if ( get_previous_posts_link() )
        printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
 
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
 
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
 
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
 
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
 
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
 
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
 
    /** Next Post Link */
    if ( get_next_posts_link() )
        printf( '<li>%s</li>' . "\n", get_next_posts_link() );
 
    echo '</ul></div>' . "\n";
 
}

/**
 * Ogranicz standardową długość wypisu.
 * @autor Wojciech Borys @Creavity
 */

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
/**
 * Liczenie popularności postów, funkcja z WP Beginer
 * @author Wojciech Borys @Creavity
 */
 
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

require_once( ABSPATH . 'wp-admin/includes/template.php' );
   
    // Create custom widget
    class widget extends WP_Widget {
    
        function __construct() {
            parent::__construct(
            
            // Base ID of your widget
            'widget', 
            
            // Widget name will appear in UI
            __('Blog - Tagi', 'widget_domain'), 
            
            // Widget description
            array( 'description' => __( 'Widged pokazujący tagi bloga', 'widget_domain' ), ) 
            );
        }
        
        // Creating widget front-end
        
        public function widget( $args, $instance ) {
            $title = apply_filters( 'widget_title', $instance['title'] );  

            $posttags = get_tags('post_tag');

            if ($posttags) { ?>
                <div class="widget-wrapper">
                    <?php
                    echo '<h3 class="h5">Tagi</h3>';
                    foreach($posttags as $tag): ?>
                        <a class="tags__tag" href="<?php echo get_tag_link($tag->term_id) ?>"><?php echo $tag->name ?></a> 
                    <?php endforeach; ?>
                </div>
            <?php
            }
        }
                
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } 
     
    // Register and load the widget
    function load_widget() {
        register_widget( 'widget' );
    }
    add_action( 'widgets_init', 'load_widget' );

    // Create custom widget
    class widget_1 extends WP_Widget {
    
        function __construct() {
            parent::__construct(
            
            // Base ID of your widget
            'widget_1', 
            
            // Widget name will appear in UI
            __('Lista kategorii', 'BrandPixel'), 
            
            // Widget description
            array( 'description' => __( 'Widged wyświetlający listę kategorii, razem z liczebnością postów wewnątrz', 'BrandPixel' ), ) 
            );
        }
        
        // Creating widget front-end
        
        public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );        
            
        $categories = get_categories(); ?>
            <div class="widget-wrapper">
                <h3 class="h5">Kategorie</h3>
                <?php 
                foreach ($categories as $cat): ?>
                    <div class="widget-wrapper__single">
                        <a href="<?php echo get_home_url() . '/' . $cat->category_nicename ?>"> 
                            <?php echo $cat->cat_name ?>
                        </a>
                        <span><?php echo $cat->category_count ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php
        }
                
        // Updating widget replacing old instances with new
        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            return $instance;
        }
    } 
     
    // Register and load the widget
    function load_widget_1() {
        register_widget( 'widget_1' );
    }

    add_action( 'widgets_init', 'load_widget_1' );


add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" >-</button>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" >+</button>';
}

function codex_custom_init() {
    $labels = array(
      'name' => _x('Lokalizacje', 'post type general name'),
      'singular_name' => _x('Lokalizacje', 'post type singular name'),
      'add_new' => _x('Dodaj nową lokalizację', 'lokalizacje'),
      'add_new_item' => __('Dodaj nową lokalizację'),
      'edit_item' => __('Edytuj  lokalizację'),
      'new_item' => __('Nowa lokalizacja'),
      'all_items' => __('Wszystkie Lokalizacje'),
      'view_item' => __('Wyświetl lokalizację'),
      'search_items' => __('Szukaj w lokalizacjach'),
      'not_found' =>  __('Nie znaleziono lokalizacji'),
      'not_found_in_trash' => __('Nie znaleziono lokalizacji w koszu'), 
      'parent_item_colon' => '',
      'menu_name' => __('Lokalizacje')
    );

    $args = array(
      'labels' => $labels,
      'public' => true,
      'menu_icon' => 'dashicons-info',
      'publicly_queryable' => true,
      'show_ui' => true, 
      'show_in_menu' => true, 
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'has_archive' => false, 
      'hierarchical' => false,
      'menu_position' => null,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    ); 

    register_post_type('lokalizacje', $args);
  }
  
  add_action( 'init', 'codex_custom_init' );


add_shortcode('get_custom_lang_switcher', 'get_custom_lang_switcher_func');
function get_custom_lang_switcher_func() {
     
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
        $content .= '<div class="language-switcher">';
            foreach($languages as $l){
                if($l['country_flag_url']){
                      $selected = '';
                      if($l['active']) {
                        $selected = "class='active'";
                      }
                    $content .= '<span '.$selected.'><a href="'.$l['url'].'">'.$l['code'].'</a></span>';
                  }
             }
         $content .= '</div>';
     }
     
    return $content;
}


function show_field() {
    $screen = get_current_screen();

    if (strpos($screen->id, 'acf-options-opcje-globalne') == true) {
        $field = get_field('miejscowosci', 'option');
        if($field){
            foreach( $field as $fiel) {
                $name = $fiel['city'];
                if ( get_page_by_title( $fiel['city'], OBJECT, 'lokalizacje' ) == null ) {
                    $post_details = array(
                        'post_title'    => $name,
                        'post_content'  => ' ',
                        'post_status'   => 'publish',
                        'post_author'   => 1,
                        'post_type'     => 'lokalizacje'
                    );
                    wp_insert_post( $post_details );
                }
            }
        }
    }
}

add_action('acf/save_post', 'show_field', 20);

?>

