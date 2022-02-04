<?php if(get_field('tekst-cta', 'option') ): ?>
    <section class="cta">
        <div class="container mx-auto">
            <div class="row mpad">
                <div class="col-12">
                    <?php echo get_field('tekst-cta', 'option') ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>