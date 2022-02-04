<?php
/**
 * Template Name: Pojedynczy produkt
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
				<main>
                    <section class="mt-5">
                        <div class="container mx-auto">
                            <div class="row mpad">
                                <div class="col-12">
                                    <h2 class="text-uppercase">Doppelstabmatten<br> <?php the_title() ?></h2>
                                </div>
                            </div>

                            <div class="row mt-4 mt-lg-5 mpad">
                                <div class="col-lg-6">
                                    <?php get_template_part('/code-templates/map') ?>        
                                </div>
                                <div class="col-lg-6 mt-4 mt-lg-0">
                                    <?php the_field('opis_1') ?>
                                </div>
                            </div>
                            <div class="row mt-c mb-c mpad">
                                <div class="col-lg-8 mx-auto">
                                    <?php the_field('opis_2') ?>
                                </div>
                            </div>
                        </div>
                    </section>
					

                </main>
            </div>
        </div>
    </div>
</div>   
<?php get_footer(); ?>

