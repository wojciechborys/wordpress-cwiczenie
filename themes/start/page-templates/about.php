<?php
/**
 * Template Name: O nas
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

                    <div class="container mx-auto">
                        <div class="row">
                            <div class="col-4 col-lg-2 mx-auto mt-c mb-c">
                                <img class="lozad w-100" data-src="<?php echo get_field('logo', 'option')['sizes']['thumbnail'] ?>" >
                            </div>
                        </div>
                    </div>

                    <section class="aboutus mpad">
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php the_field('tekst_o_nas') ?>
                                </div>

                                <div class="col-lg-6 aboutus__photo">
                                    <img alt="Photo" src="<?php echo get_field('zdjecie_o_nas')['sizes']['medium'] ?>">
                                </div>
                            </div>
                        </div>
                    </section>
                   
                    <section class="values mt-c mpad">
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col-12">
                                    <?php the_field('nasze_wartosci') ?>
                                </div>
                            </div>

                            <div class="row minus-x">
                                <?php 
                                $wartosci = get_field('values'); 
                                if($wartosci):
                                    foreach($wartosci as $wart): ?>
                                        <div class="col-lg-3 col-md-6 text-center">
                                            <div class="row m-3 values__single">
                                                <div class="col-12"> 
                                                    <img class="values__single--icon" alt="icon" src="<?php echo $wart['zdjecie']['sizes']['thumbnail'] ?>">
                                                </div> 

                                                <div class="col-12">
                                                    <p class="values__single--title large-text-regular"><?php echo $wart['tytul'] ?></p>
                                                    <p class="values__single--desc"><?php echo $wart['opis'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;
                                endif; ?>
                            </div>    
                        </div>
                    </section>

                    <section class="cta mt-c mpad">
                        <div class="container mx-auto">
                            <div class="row">
                                <div class="col-12">
                                    <?php the_field('cta') ?>
                                    <div class="text-center">
                                        <a class="button-medium mr-lg-3 mb-3 mb-lg-0">Ich gehe online store</a>
                                        <a class="button-medium-border">Ich habe eine Frage</a>
                                    </div>
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

