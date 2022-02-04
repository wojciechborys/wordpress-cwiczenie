<?php
/**
 * Template Name: Blog
 */

get_header();

$tax = get_queried_object();
$posts = (get_query_var('paged')) ? get_query_var('paged') : 10; ?>

<div class="wrapper">
	<div class="container-fluid" id="content">
		<div class="row">
            <div class="col-12">
                <div class="container mx-auto">
                    <div class="row">
                        <div class="col-12">
                            <?php
                                if ( function_exists('yoast_breadcrumb') ) {
                                    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

			<div class="col-12">
				<main>
                   <div class="row">
                        <div class="col-12 text-center">
                            <h2 class="my-5"><?php echo $tax->name ?></h2>
                        </div>
                    </div>

                    <article class="blog">
                        <div class="container mx-auto">
                            <div class="row mpad">
                                <div class="col-lg-9 pr-lg-5 blog__content">
                                    <?php brandpixel_pagination() ?>
                                    <div class="row newest">
                                        <?php
                                        $args = array(
                                            'posts_per_page' => 10,
                                            'tag'            =>  $tax->slug,
                                        ); ?>

                                        <?php
                                        $the_query = new WP_Query( $args ); ?>
                                        <div class="col-12">
                                            <div class="row">
                                                <?php while ( $the_query->have_posts() ):
                                                    $the_query->the_post() ?>
                                                    <div class="row mb-4">
                                                        <?php if(get_the_post_thumbnail()): ?>
                                                            <div class="col-lg-4">
                                                                <a href="<?php echo get_the_permalink() ?> ">
                                                                    <div class="blog-sec__thumbnail">
                                                                        <?php echo get_the_post_thumbnail() ?>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        <?php endif ?>
                            
                                                        <div class="col-lg pl-lg-4 centered mt-3 mt-lg-0">
                                                            <div class="blog-sec__content">
                                                                <a href="<?php echo get_the_permalink() ?>">
                                                                    <h3 class="h5"><?php the_title() ?> </h3>
                                                                </a>
                                                                <p><?php echo get_the_date() ?></p>
                                                                <p class="blog-sec__content--excerpt"><?php echo get_the_excerpt() ?></p>
                                                                <p class="blog-sec__content--readmore">
                                                                    <a href=" <?php echo get_the_permalink() ?> ">Lesen Sie weiter</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>                            
                                                <?php endwhile ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php brandpixel_pagination() ?>
                                </div>

                                <div class="col-lg-3">
                                    <div class="sidebar-wrapper">
                                        <?php dynamic_sidebar( 'left-sidebar-blog' )?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>


                    <?php wp_reset_postdata() ?>
                    </main> 
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
