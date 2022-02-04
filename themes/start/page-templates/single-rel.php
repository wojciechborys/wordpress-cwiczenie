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

                    <?php if(get_field('top_photo')): ?>
					    <section>
							<div class="container mx-auto">
								<div class="row">
									<div class="col-md-6 mt-c mx-auto">
                                        <img class="lozad w-100" data-src="<?php echo get_field('top_photo')['sizes']['medium'] ?>">
									</div>
								</div>
							</div>
                        </section>
                    <?php endif ?>

					<?php if(get_field('about')): ?>
						<section class="about mt-c mb-c">
							<div class="container mx-auto">
								<div class="row mpad">
                                    <div class="col-12">
                                        <h2><?php the_title() ?></h2>
                                    </div>
									<div class="col-10 mt-4 split mx-auto">
										<?php echo get_field('about') ?>
									</div>
								</div>
							</div>
                    	</section>
					<?php endif ?>

					<section class="specs mt-c">
						<div class="container mx-auto">
							<div class="row mpad">
								<div class="col-12 text-center">
									<h2 class="h3 specs__title"><a href="#specs">Technische spezifikation</a></h2>
								</div>
							</div>

                            <?php $icons = get_field('specyfikacja_techniczna'); ?>
                            <?php if($icons): ?>
                                <div class="row mpad" id="specs">

                                    <?php foreach($icons as $icon): ?>

                                        <div class="col-md-6 specs__icons mb-4">
                                            <div class="row">
                                                <div class="col-md-9 col-12 mx-auto">
                                                    <div class="row ml-3">
                                                        <div class="col-2 centered-max">
                                                            <img class="lozad specs__icons--single w-100" data-src="<?php echo $icon['ikona']['sizes']['thumbnail'] ?>">
                                                        </div>

                                                        <div class="col-10 pl-3 specs__icons--title">
                                                            <div class="row h-100 centered">
                                                                <div class="col-12">
                                                                    <p class="mb-0"><?php echo $icon['tytul'] ?></p>
                                                                    <p class="mb-0"><strong><?php echo $icon['podpis'] ?></strong></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
						</div>
					</section>

                    <?php get_template_part('/code-templates/map') ?>        

                </main>
            </div>
        </div>
    </div>
</div>   
<?php get_footer(); ?>

