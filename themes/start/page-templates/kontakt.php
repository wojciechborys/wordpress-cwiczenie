<?php
/**
 * Template Name: Kontakt
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$fields = get_fields(get_the_ID());

?>

<div class="wrapper">
	<div class="container-fluid" id="content">
		<div class="row">
			<div class="col-12">
				<main class="contact-bckg">
                    <div class="container mx-auto">
                        <div class="row pt-c pb-c">
                            <div class="col-lg-10 ml-auto">
                                <div class="row mpad">
                                    <div class="col-lg-6 mx-auto">
                                        <h2 class="h3 text-uppercase">Anruf</h2>
                                        <?php if(get_field('telephone', 'option' )): ?>
                                            <div class="tel-text"><a href="tel:<?php the_field('telephone', 'option' ); ?>"><?php the_field('telephone', 'option' ); ?></a></div>
                                        <?php endif ?>

                                        <?php if(get_field('email', 'option' )): ?>
                                            <div class="mail-text mb-4 mb-lg-5"><a href="mailto:<?php the_field('email', 'option' ); ?>"><?php the_field('email', 'option' ); ?></a></div>
                                        <?php endif ?>

                                        <?php echo do_shortcode('[contact-form-7 id="167" title="Kontakt"]') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </main>
            </div>
        </div>
    </div>
</div>   

<?php get_footer(); ?>