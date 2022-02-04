<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="wrapper">

	<div class="container-fluid" id="content">

		<div class="row">

			<div class="col-12">
				<main>
                    <section>
                        <div class="container mx-auto">
                            <div class="row mpad">
                                <div class="col-12">
                                    <h2><?php the_title() ?></h2>
                                    <?php if ( have_posts() ) : the_post();
                                        the_content(); 
                                    endif; ?>
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
