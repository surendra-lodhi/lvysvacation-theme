<?php 
$heading = get_sub_field('heading');
$select_images = get_sub_field('select_images');
?>
<?php if(!empty($select_images)) { ?>
    <section class="gallery-section">
        <div class="container">
            <h2><?php echo $heading; ?></h2>
        </div>    
        <div id="our-gallery">
            <div id="image-gallery">
                <?php foreach ($select_images as $key => $select_image) { ?> 
                    <div class="single-item image">
                        <div class="img-wrapper">
                            <a href="<?php echo $select_image; ?>">
                                <img src="<?php echo $select_image; ?>" class="img-responsive">
                            </a>
                            <div class="img-overlay">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/plus-icon.svg" alt="">
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
<?php } ?>