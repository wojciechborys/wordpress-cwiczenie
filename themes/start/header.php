<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

?>

<!DOCTYPE html>
<html class="mt-0" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
    <meta property="og:title" content="<?php bloginfo( 'name' ); ?>" />
    <meta property="og:description" content="<?php echo get_field('meta_description', 'option') ?>" />
    <meta property="description" content="<?php echo get_field('meta_description', 'option') ?>" />
    <meta property="og:image" content="<?php echo get_field('og-image', 'option')['sizes']['large'] ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> 
<div id="top"></div>
<div class="site" id="page">
    <header id="header">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-12">
                    <div class="row mpad">
                        <div class="col-6 d-lg-none centered">
                            <button title="Menu" class="navbar-toggler collapsed" type="button" id="toggler">
                                <span class="icon-bar top-bar"></span>
                                <span class="icon-bar middle-bar"></span>
                                <span class="icon-bar bottom-bar"></span>	
                            </button>  
                        </div>  

                        <?php if(get_field('logo', 'option')): ?>
                            <div class="col-6 col-lg-4 centered justify-content-end justify-content-lg-start">
                                <a href="<?php echo get_home_url() ?>">
                                    <img class="logo" alt="logotyp" src="<?php echo get_field('logo', 'option')['sizes']['medium'] ?>">
                                </a>
                            </div>
                        <?php endif ?>
                  
                        <div class="col-12 col-lg-8 centered justify-content-end">
                            <div id="wrapper-navbar" class="w-100" itemscope itemtype="http://schema.org/WebSite">
                                <h2 class="d-none">Nawigacja</h2>
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location'  => 'header',
                                        'container_class' => 'collapse navbar-light navbar-collapse primary-navigation',
                                        'container_id'    => 'navbarNavDropdown',
                                        'menu_class'      => 'navbar-nav centered',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'top-menu',
                                        'walker'          => new brandpixel_wp_Bootstrap_Navwalker(),
                                        'depth'           => 2,
                                    )
                                ); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>