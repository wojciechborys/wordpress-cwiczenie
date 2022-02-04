<?php
/**
 * Template Name: Strona główna
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
					<section class="hero">
						<?php if(get_field('top_text')): ?>
							<div class="container mx-auto h-100">
								<div class="row centered h-100 mpad">
									<div class="col-12">
										<?php echo get_field('top_text') ?>
									</div>
								</div>
							</div>
					
							<video autoplay muted loop>
								<source src="<?php echo get_stylesheet_directory_uri(); ?>/img/mp4/web.mp4" type="video/mp4">
							</video>
						<?php endif ?>
                    </section>
					<?php if(get_field('about')): ?>
						<section class="about mt-c mb-c" id="uber_uns">
							<div class="container mx-auto">
								<div class="row mpad">
									<div class="col-lg-7">
										<?php echo get_field('about') ?>
									</div>
								</div>
							</div>
                    	</section>
					<?php endif ?>
					<!--
					<section class="doppelstabmatten mt-c mb-c">
						<div class="container mx-auto">
							<div class="row mpad">
								<div class="col-12">
									<h2 class="text-uppercase">Doppelstabmatten</h2>
								</div>
							</div>
							<div class="row mpad">
								<div class="col-lg-6 doppelstabmatten__box lozad" data-background-image="<?php //echo get_field('photo_1')['sizes']['medium'] ?>" >
									<div class="doppelstabmatten__box--content">
										<p class="h3 doppelstabmatten__box--title mb-5"><?php //echo get_field('signature_1') ?></p>
										<?php //echo get_field('description_1') ?>
										<p class="mt-5">
											<a href="<?php //echo get_field('box_link_1') ?>" class="button-medium">Mehr Sehen</a>
										</p>
									</div>
									<p class="h3 bottom doppelstabmatten__box--title text-center"><?php //echo get_field('signature_1') ?></p>
								</div>

								<div class="col-lg-6 doppelstabmatten__box lozad" data-background-image="<?php //echo get_field('photo_2')['sizes']['medium'] ?>" >
									<div class="doppelstabmatten__box--content">
										<p class="h3 doppelstabmatten__box--title mb-5"><?php //echo get_field('signature_2') ?></p>
										<?php //echo get_field('description_2') ?>
										<p class="mt-5">
											<a href="<?php //echo get_field('box_link_2') ?>" class="button-medium">Mehr Sehen</a>
										</p>
									</div>
									<p class="h3 bottom doppelstabmatten__box--title text-center"><?php //echo get_field('signature_2') ?></p>
								</div>
							</div>
						</div>
					</section>
					-->
					<section class="angebot">
						<div class="container mx-auto mpad">
							<div class="row">
								<div class="col-12">
									<h2 class="text-uppercase">Angebot</h2>
								</div>
							</div>
							<div class="row minus-x">
								<div class="col-lg-4 angebot__box p-3" data-tab="angebot-1">
									<h3 class="angebot__box--title"><?php echo get_field('title_1') ?></h3>
									<div class="angebot__box--image">
										<img class="w-100" src="<?php echo get_field('photobox_1')['sizes']['medium'] ?>" >
										<div class="angebot__box--button centered-max">
											<a href="<?php echo get_field('link_1') ?>" class="button-medium">Mehr sehen</a>
										</div>
									</div>

									<div class="d-lg-none">
										<div class="angebot__answer d-lg-none" data-tab="angebot-1">
											<?php echo get_field('description_tabs_1') ?>
										</div>
									</div>
								</div>

								<div class="col-lg-4 p-3 angebot__box" data-tab="angebot-2">
									<h3 class="angebot__box--title"><?php echo get_field('title_2') ?></h3>
									<div class="angebot__box--image">
										<img class="w-100" src="<?php echo get_field('photobox_2')['sizes']['medium'] ?>" >
										<div class="angebot__box--button centered-max">
											<a href="<?php echo get_field('link_2') ?>" class="button-medium">Mehr sehen</a>
										</div>
									</div>

									<div class="d-lg-none">
										<div class="angebot__answer" data-tab="angebot-2">
											<?php echo get_field('description_tabs_2') ?>
										</div>
									</div>
								</div>

								<div class="col-lg-4 p-3 angebot__box" data-tab="angebot-3">
									<h3 class="angebot__box--title"><?php echo get_field('title_3') ?></h3>
									<div class="angebot__box--image">
										<img class="w-100" src="<?php echo get_field('photobox_3')['sizes']['medium'] ?>" >
										<div class="angebot__box--button centered-max">
											<a href="<?php echo get_field('link_3') ?>" class="button-medium">Mehr sehen</a>
										</div>
									</div>

									<div class="d-lg-none">
										<div class="angebot__answer" data-tab="angebot-3">
											<?php echo get_field('description_tabs_3') ?>
										</div>
									</div>
								</div>
							</div>

							<div class="row d-none d-lg-flex">
								<div class="col-md-9 mx-auto">
									<div class="angebot__answer" data-tab="angebot-1">
										<?php echo get_field('description_tabs_1') ?>
									</div>

									<div class="angebot__answer" data-tab="angebot-2">
										<?php echo get_field('description_tabs_2') ?>
									</div>

									<div class="angebot__answer" data-tab="angebot-3">
										<?php echo get_field('description_tabs_3') ?>
									</div>
								</div>
							</div>
						</div>
					</section>

					<?php get_template_part('/code-templates/gallery') ?>        
					<?php get_template_part('/code-templates/popup') ?>
                </main>
            </div>
        </div>
    </div>
</div>   
<?php get_footer(); ?>

