<?php if(get_field('tekst-cta-2', 'option') ): ?>
    <section class="cta-2 lozad" data-background-image="<?php echo get_field('cta-2-bckg', 'option')['sizes']['large'] ?>">
        <div class="container mx-auto">
            <div class="row mpad">
                <div class="col-lg-10 mx-auto">
                    <div class="row">
                        <div class="col">
                            <?php echo get_field('tekst-cta-2', 'option') ?>
                        </div>

                        <?php if(get_field('telephone', 'option' )): ?>
                            <div class="col-6 centered-max">
                                <div class="button-tel"><a href="tel:<?php the_field('telephone', 'option' ); ?>">ANRUF</a></div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>