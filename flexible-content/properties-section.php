<?php 
$args = array('post_type' => 'mphb_room_type','posts_per_page' => -1);
$show_properties_meta = get_sub_field('show_properties_meta');
$mphb_room_type = new WP_Query($args );
if($mphb_room_type->have_posts()) {
?>
<section class="properties-section <?php if($show_properties_meta){ ?> properties-product <?php } ?>">
    <div class="container">
        <div class="properties-wrap">
            <?php 
            while ($mphb_room_type->have_posts()) { 
                $mphb_room_type->the_post();
                $properties_banner_and_button_background_colour = get_field('properties_banner_and_button_background_colour');
                $properties_number_of_bedrooms = get_field('properties_number_of_bedrooms');
                $properties_number_of_bathrooms = get_field('properties_number_of_bathrooms');
                ?>
                <div class="properties-single">
                    <div class="properties-pic">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                            <div class="overlay">
                                <p>View property</p>
                            </div>
                        </a>
                    </div>
                    <h3><?php the_title(); ?></h3>
                    <?php if($show_properties_meta ) { ?>
                        <div class="star-rating">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 16" class="HappyRatingStarIcon-sc-qukodd-0 DtFnc">
                                <path fill-rule="evenodd" d="M8.172 13.282l3.964 2.434c.726.446 1.614-.213 1.423-1.047l-1.05-4.577 3.505-3.084c.64-.562.296-1.629-.545-1.696l-4.613-.398L9.051.589c-.325-.785-1.432-.785-1.757 0L5.489 4.904l-4.613.398C.036 5.37-.31 6.436.33 6.999l3.505 3.083-1.05 4.577c-.191.834.697 1.494 1.423 1.048l3.963-2.425z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 16" class="HappyRatingStarIcon-sc-qukodd-0 DtFnc">
                                <path fill-rule="evenodd" d="M8.172 13.282l3.964 2.434c.726.446 1.614-.213 1.423-1.047l-1.05-4.577 3.505-3.084c.64-.562.296-1.629-.545-1.696l-4.613-.398L9.051.589c-.325-.785-1.432-.785-1.757 0L5.489 4.904l-4.613.398C.036 5.37-.31 6.436.33 6.999l3.505 3.083-1.05 4.577c-.191.834.697 1.494 1.423 1.048l3.963-2.425z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 16" class="HappyRatingStarIcon-sc-qukodd-0 DtFnc">
                                <path fill-rule="evenodd" d="M8.172 13.282l3.964 2.434c.726.446 1.614-.213 1.423-1.047l-1.05-4.577 3.505-3.084c.64-.562.296-1.629-.545-1.696l-4.613-.398L9.051.589c-.325-.785-1.432-.785-1.757 0L5.489 4.904l-4.613.398C.036 5.37-.31 6.436.33 6.999l3.505 3.083-1.05 4.577c-.191.834.697 1.494 1.423 1.048l3.963-2.425z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 16" class="HappyRatingStarIcon-sc-qukodd-0 DtFnc">
                                <path fill-rule="evenodd" d="M8.172 13.282l3.964 2.434c.726.446 1.614-.213 1.423-1.047l-1.05-4.577 3.505-3.084c.64-.562.296-1.629-.545-1.696l-4.613-.398L9.051.589c-.325-.785-1.432-.785-1.757 0L5.489 4.904l-4.613.398C.036 5.37-.31 6.436.33 6.999l3.505 3.083-1.05 4.577c-.191.834.697 1.494 1.423 1.048l3.963-2.425z"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 17 16" class="HappyRatingStarIcon-sc-qukodd-0 DtFnc">
                                <path fill-rule="evenodd" d="M8.172 13.282l3.964 2.434c.726.446 1.614-.213 1.423-1.047l-1.05-4.577 3.505-3.084c.64-.562.296-1.629-.545-1.696l-4.613-.398L9.051.589c-.325-.785-1.432-.785-1.757 0L5.489 4.904l-4.613.398C.036 5.37-.31 6.436.33 6.999l3.505 3.083-1.05 4.577c-.191.834.697 1.494 1.423 1.048l3.963-2.425z"></path>
                            </svg>
                        </div>
                        <ul class="facilities-lists">
                            <?php if(!empty($properties_number_of_bedrooms)) { ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/images/bedroom-icon.svg" alt=""><?php echo $properties_number_of_bedrooms; ?> bedrooms</li>
                            <?php } ?>
                            <?php if(!empty($properties_number_of_bathrooms)) { ?>
                                <li><img src="<?php echo get_template_directory_uri(); ?>/images/bathroom-icon.svg" alt=""><?php echo $properties_number_of_bathrooms; ?> bathrooms</li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                    <a href="<?php echo get_the_permalink(); ?>" class="btn-primary <?php echo $properties_banner_and_button_background_colour; ?>">Take a look</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php 
}
wp_reset_postdata();
wp_reset_query();
//echo do_shortcode('[mphb_rooms]');
?>