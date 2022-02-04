<?php
/**
 * The main template file.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

?>

<div class="wrapper" id="index-wrapper">

	<div class="container-fluid" id="content" tabindex="-1">

		<div class="row">

			<main class="col-md-8" id="main">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main>
	   </div>
    </div>
</div>

<?php get_footer(); ?>
