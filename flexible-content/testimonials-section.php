<?php $testimonials_background_image = get_sub_field('testimonials_background_image'); 
$testimonials_icon = get_sub_field('testimonials_icon'); 
?>

<section class="testimonials-section <?php if(!$testimonials_background_image) { ?> testimonials-full-bg <?php } ?> <?php if($testimonials_icon) { ?> wave-line-right-bottom <?php } else { ?> no-quote-icon <?php } ?>" style="background-image:url(<?php echo $testimonials_background_image; ?>)">
    <div class="container">
        <div class="testimonials-bg wave-line-left-bottom">
            <?php if($testimonials_icon)  { ?>
            <div class="quote-icon">
                <img src="<?php echo $testimonials_icon; ?>" alt="">
            </div>
        <?php } ?>
            <div class="">
                <?php echo do_shortcode('[wpairbnb_usetemplate tid="1"]'); ?>
                <!-- <div class="testimonial">
                    <p>"Integer fringilla ante viverra erat auctor rhoncus. Morbi varius lacinia molestie. Integer eget dictum leo, ut tincidunt magna. Ut tristique pellentesque massa ac porta."</p>
                    <div class="author">jim Simpson</div>
                    <div class="rating"><span class="rating-value" rating-value="5"></span></div>
                </div>
                <div class="testimonial">
                    <p>"Integer fringilla ante viverra erat auctor rhoncus. Morbi varius lacinia molestie. Integer eget dictum leo, ut tincidunt magna. Ut tristique pellentesque massa ac porta."</p>
                    <div class="author">jim Simpson 2</div>
                    <div class="rating"><span class="rating-value" rating-value="5"></span></div>
                </div> -->
            </div>
        </div>
    </div>
</section>