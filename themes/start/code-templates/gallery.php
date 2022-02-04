<?php $gallery = get_field('gallery');
if($gallery): ?>
    <section class="gallery mt-c mb-c">
        <div class="container mx-auto mpad">
            <div class="row mb-4 mb-lg-0" >
                <?php if(is_front_page()): ?>
                    <div class="col-md-6">
                        <h2 class="text-uppercase">Unsere tore</h2>
                    </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <h2 class="text-uppercase">Wähl en Sie den Typ</h2>
                        </div>
                <?php endif ?>

                <div class="col-md-6 text-right">
                    <a data-popup class="button-primary-big">FRAGEN SIE NACH PREIS</a>
                </div>
            </div>

            <div class="row mpad minus-x">
                <?php foreach($gallery as $gal): ?>
                        
                    <?php if(is_page('fluegeltore')): ?>
                        <div class="col-md-4 p-lg-3" >
                            <div class="gallery__images">
                                <label class="gallery__label label-checkbox">
                                    <input value="<?php echo $gal['sku'] ?>" name="<?php echo $gal['sku'] ?>" type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="<?php echo $gal['photo']['sizes']['large'] ?>">
                                    <div class="gallery__label--images" style="background-image: url(<?php echo $gal['photo']['sizes']['large'] ?>)"></div>
                                </a>
                                <p class="text-right mt-3">ART.: <span class="semi-bold"><?php echo $gal['sku'] ?></span></p>
                            </div>
                        </div>

                    <?php elseif(is_page('schiebetore')): ?>
                        <div class="col-md-6 p-lg-3" >
                            <div class="gallery__images">
                                <label class="gallery__label label-checkbox">
                                    <input value="<?php echo $gal['sku'] ?>" name="<?php echo $gal['sku'] ?>" type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="<?php echo $gal['photo']['sizes']['large'] ?>">
                                    <div class="gallery__label--images" style="background-image: url(<?php echo $gal['photo']['sizes']['large'] ?>)"></div>
                                </a>
                                <p class="text-right mt-3">ART.: <span class="semi-bold"><?php echo $gal['sku'] ?></span></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-md-3 p-lg-3" >
                        <div class="gallery__images">
                            <label class="gallery__label label-checkbox">
                                <input value="<?php echo $gal['sku'] ?>" name="<?php echo $gal['sku'] ?>" type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <a href="<?php echo $gal['photo']['sizes']['large'] ?>">
                                <div class="gallery__label--images" style="background-image: url(<?php echo $gal['photo']['sizes']['large'] ?>)"></div>
                            </a>
                            <p class="text-right mt-3">ART.: <span class="semi-bold"><?php echo $gal['sku'] ?></span></p>
                        </div>
                    </div>
                    
                    <?php endif ?>

                <?php endforeach ?> 
            </div>
        </div>
    </section>
<?php endif ?> 