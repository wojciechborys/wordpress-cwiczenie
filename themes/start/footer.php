<?php

/**
 * The template for displaying the footer.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>  
        
        <?php get_template_part('/code-templates/cta') ?>        
        <?php get_template_part('/code-templates/testimonials') ?>
        <?php get_template_part('/code-templates/cta-2') ?>

        <footer class="page-footer">
            <div class="mpad" id="wrapper-footer">
                <div class="container mx-auto">
                    <div class="row">
                        <div class="col-lg-3 mr-auto mb-4 mb-lg-0"> 
                            <a href="<?php echo get_home_url() ?>">
                                <img class="logo w-100" alt="logotyp" src="<?php echo get_field('logo', 'option')['sizes']['medium'] ?>">
                            </a>
                        </div>

                        <div class="col-lg-3 ml-auto">
                            <?php if(get_field('telephone', 'option' )): ?>
                                <div class="tel-text"><a href="tel:<?php the_field('telephone', 'option' ); ?>"><?php the_field('telephone', 'option' ); ?></a></div>
                            <?php endif ?>

                            <?php if(get_field('email', 'option' )): ?>
                                <div class="mail-text"><a href="mailto:<?php the_field('email', 'option' ); ?>"><?php the_field('email', 'option' ); ?></a></div>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <nav>
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location'  => 'footer-1',
                                        'menu_class'      => 'centered',
                                        'fallback_cb'     => '',
                                        'menu_id'         => 'bottom-menu',
                                        'walker'          => new brandpixel_wp_Bootstrap_Navwalker(),
                                        'depth'           => 1,
                                    )
                                ); ?>
                            </nav>
                        </div>
                    </div>

                    <div class="row footer-credit">
                        <div class="col-lg-6 page-footer__copyright">
                            <span>
                                <strong class="text-uppercase"><?php echo bloginfo( 'name' ); ?></strong> &copy; <?php echo date("Y"); ?> 
                            </span>
                        </div>

                        <div class="col-lg-6 mt-3 d-flex mt-lg-0 justify-content-lg-end">
                            <span> 
                                Design und Implementierung:
                                <a target="_blank" href="https://www.brandpixel.de"><img width="50" src="<?php echo get_template_directory_uri(); ?>/img/png/brandpixel-total-white.png" alt="Brandpixel Logo"></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>