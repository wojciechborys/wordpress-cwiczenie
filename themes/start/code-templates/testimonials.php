<?php 
$testimonials = get_field('testimonials', 'option');

if($testimonials): ?>
    <section class="testimonials">
        <div class="container mx-auto">
            <div class="row mpad">
                <div class="col-12">
                    <h2>UNSERE TORE</h2>
                </div>
            </div>

            <div class="row mpad mt-4">
                <div class="col-lg-10 mx-auto mpad">
                    <div class="swiper-container slider-testimonials">
                        <div class="swiper-wrapper">
                            <?php foreach($testimonials as $testimonial): ?>
                                <div class="swiper-slide">
                                    <div class="row">
                                        <div class="col-12 testimonials__images">
                                            <span class="testimonials__images--info">NACHHER</span>
                                            <img class="lozad testimonials__images--before" data-src="<?php echo $testimonial['before']['sizes']['thumbnail'] ?>">
                                            <img class="lozad testimonials__images--after" data-src="<?php echo $testimonial['after']['sizes']['thumbnail'] ?>">
                                        </div>

                                        <div class="col-12 testimonials__content">
                                            <?php $ratings = $testimonial['rating']; ?>
                                            
                                            <?php
                                                $args = array(
                                                'rating' => $ratings,
                                                'type' => 'rating',
                                                'number' => 1, 
                                            );
                                            wp_star_rating( $args ); ?>

                                            <p class="testimonials__content--content">"<?php echo $testimonial['content'] ?>"</p>

                                            <p class="testimonials__content--name"><?php echo $testimonial['signature'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?> 
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?> 