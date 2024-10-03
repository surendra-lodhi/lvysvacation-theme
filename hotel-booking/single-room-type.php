<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php get_header(); ?>

<?php
while ( have_posts() ) :
	the_post();

	if ( post_password_required() ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo get_the_password_form();
		return;
	}

	$properties_banner_and_button_background_colour = get_field('properties_banner_and_button_background_colour');
	$properties_number_guests = get_field('properties_number_guests');
	$properties_number_of_bedrooms = get_field('properties_number_of_bedrooms');
	$properties_number_of_bathrooms = get_field('properties_number_of_bathrooms');
	$properties_amenities_and_extras_lists = get_field('properties_amenities_and_extras_lists');
	$properties_location_iframe = get_field('properties_location_iframe');
	$properties_things_to_know_left_side_title = get_field('properties_things_to_know_left_side_title');
	$properties_things_to_know_left_side_content = get_field('properties_things_to_know_left_side_content');

	$properties_things_to_know_right_side_title = get_field('properties_things_to_know_right_side_title');
	$properties_things_to_know_right_side_content = get_field('properties_things_to_know_right_side_content');
	$properties_cta = get_field('properties_cta');
    $review_lists = get_field('review_lists');
    $mphb_bed = get_field('mphb_bed');
    // echo '<pre>';
    // print_r($mphb_bed);
    // echo '</pre>';

	?>
<section class="hero-section properties-hero-section wave-line-blue <?php echo $properties_banner_and_button_background_colour; ?>" style="background-color:rgb(240 176 214 / 40%); ">
    <div class="container">
        <div class="hero-content">
            <h1>
                <span><?php the_title(); ?> 
                    <div class="wave-line-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="282.28" height="14.349" viewBox="0 0 282.28 14.349">
                          <path id="Squiggle_line" data-name="Squiggle line" d="M279.984,0h0a18.525,18.525,0,0,0-13.089,5.33,13.922,13.922,0,0,1-10.035,4.236,13.952,13.952,0,0,1-10.038-4.236c-.189-.185-.409-.31-.606-.485V4.8c-.242-.216-.519-.363-.768-.564a18.369,18.369,0,0,0-2.018-1.48c-.227-.14-.473-.238-.708-.367a18.517,18.517,0,0,0-2.51-1.192c-.159-.057-.322-.087-.477-.14a18.626,18.626,0,0,0-2.9-.761c-.087-.015-.178-.011-.265-.026a18.654,18.654,0,0,0-15.913,5.065,13.918,13.918,0,0,1-10,4.228,13.921,13.921,0,0,1-10-4.232,18.8,18.8,0,0,0-26.224,0,13.908,13.908,0,0,1-10,4.232,13.916,13.916,0,0,1-9.989-4.228,18.511,18.511,0,0,0-2-1.62c-.125-.091-.231-.2-.356-.288a18.139,18.139,0,0,0-2.059-1.215c-.2-.106-.4-.22-.6-.318a18.713,18.713,0,0,0-2.351-.927c-.117-.038-.235-.068-.356-.106A18.291,18.291,0,0,0,141.362,0a1.649,1.649,0,0,0-.2.042,1.824,1.824,0,0,0-.2-.042,18.518,18.518,0,0,0-13.089,5.33,13.922,13.922,0,0,1-10.035,4.236,13.946,13.946,0,0,1-10.038-4.236,18.72,18.72,0,0,0-26.167,0A13.923,13.923,0,0,1,71.611,9.565,13.929,13.929,0,0,1,61.581,5.329a18.717,18.717,0,0,0-26.16,0A13.915,13.915,0,0,1,25.4,9.568,13.923,13.923,0,0,1,15.37,5.336,18.486,18.486,0,0,0,2.3,0a2.392,2.392,0,0,0,0,4.781A13.911,13.911,0,0,1,12.32,9.019,18.492,18.492,0,0,0,25.4,14.349a18.5,18.5,0,0,0,13.078-5.33,14,14,0,0,1,19.8-.257c.087.083.174.17.257.257a18.491,18.491,0,0,0,13.078,5.33,18.5,18.5,0,0,0,13.078-5.33,14,14,0,0,1,19.8-.257c.087.083.174.17.257.257a18.518,18.518,0,0,0,13.089,5.33,18.516,18.516,0,0,0,13.086-5.33,13.946,13.946,0,0,1,10.038-4.236,1.824,1.824,0,0,0,.2-.042,1.649,1.649,0,0,0,.2.042,13.959,13.959,0,0,1,2.729.269V5.06c.235.049.462.136.7.2a13.385,13.385,0,0,1,1.567.485c.386.148.765.329,1.139.515.333.163.655.341.973.53.4.242.8.481,1.177.761.208.155.4.337.594.5a13.252,13.252,0,0,1,1.094.969,18.489,18.489,0,0,0,13.074,5.33l.027,0,.03,0a18.5,18.5,0,0,0,13.078-5.33,13.942,13.942,0,0,1,19.748-.257c.087.083.174.17.257.257a18.5,18.5,0,0,0,13.082,5.33l.026,0,.026,0a18.492,18.492,0,0,0,13.078-5.33,13.942,13.942,0,0,1,19.748-.257c.087.083.174.17.257.257a18.51,18.51,0,0,0,13.1,5.33,18.516,18.516,0,0,0,13.086-5.33,13.952,13.952,0,0,1,10.038-4.236,2.392,2.392,0,0,0,0-4.781" transform="translate(0 0)" fill="#94e3e1"/>
                        </svg>
                    </div>
                </span>
            </h1>
        </div>
    </div>
</section>
<?php 
$galleryIds = mphb_tmpl_get_room_type_gallery_ids();
?>
<section class="properties-photos-section">
    <div class="container">
        <div class="share">Share<img src="<?php echo get_template_directory_uri(); ?>/images/share-icon.svg" alt=""></div>
        <div class="grid-container properties-photos">
        	<?php if(get_the_post_thumbnail_url()) { ?>
	          	<div class="item">
	              	<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
	          	</div>
	      	<?php } ?>
	      	<?php foreach ($galleryIds as $key => $galleryId) {
	      		if($key > 3 ){
	      			break;
	      		} ?>
				<div class="item">
	              	<img src="<?php echo wp_get_attachment_url($galleryId); ?>" alt="">
	          	</div>
	      	<?php } ?> 
          
          <!-- <div class="item">
              <img src="images/properties-pic3.jpg" alt="">
          </div>
          <div class="item">
              <img src="images/properties-pic4.jpg" alt="">
          </div>
          <div class="item">
              <img src="images/properties-pic5.jpg" alt="">
          </div> -->
        </div>
        <div class="btn-block">
            <button type="button" class="btn-primary <?php echo $properties_banner_and_button_background_colour; ?>" data-bs-toggle="modal" data-bs-target="#galleryModal">See all photos</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="share">Share<img src="<?php echo get_template_directory_uri(); ?>/images/share-icon.svg" alt=""></div>
              </div>
              <div class="modal-body">
                <div class="grid-container properties-photos-gallery">
                  <?php if(get_the_post_thumbnail_url()) { ?>
			          	<div class="item">
			              	<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
			          	</div>
			      	<?php } ?>
                  <?php foreach ($galleryIds as $key => $galleryId) { ?>
						<div class="item">
			              	<img src="<?php echo wp_get_attachment_url($galleryId); ?>" alt="">
			          	</div>
		      		<?php 
		      		// code...
		      	} ?> 
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>

<section class="properties-details-section">
    <div class="container">
        <div class="properties-details">
            <div class="properties-intro">
                <h3>Cottage on the beach in Gulfport</h3>
                <div class="facilities-rating">
                    <ul class="facilities-lists">
                    	<?php if(!empty($properties_number_guests)) { ?>
	                        <li><img src="<?php echo get_template_directory_uri(); ?>/images/guest-icon.svg" alt=""><?php echo $properties_number_guests; ?> guests</li>
	                    <?php } ?>
	                    <?php if(!empty($properties_number_of_bedrooms)) { ?>
                        	<li><img src="<?php echo get_template_directory_uri(); ?>/images/bedroom-icon.svg" alt=""><?php echo $properties_number_of_bedrooms; ?> bedrooms</li>
                        <?php } ?>
                        <?php if(!empty($mphb_bed)) { ?>
                            <li><img src="<?php echo get_template_directory_uri(); ?>/images/bedroom-icon.svg" alt=""><?php echo $mphb_bed; ?></li>
                        <?php } ?><abbr></abbr>
	                    <?php if(!empty($properties_number_of_bathrooms)) { ?>
                        	<li><img src="<?php echo get_template_directory_uri(); ?>/images/bathroom-icon.svg" alt=""><?php echo $properties_number_of_bathrooms; ?> bathrooms</li>
                        <?php } ?>
                    </ul>
                    <div class="star-rating">
                       <img src="<?php echo get_template_directory_uri(); ?>/images/stars-rating.svg" alt="">
                    </div>
                </div>
                <?php the_content(); ?>
				<?php if(!empty($properties_amenities_and_extras_lists)) { ?>               
	                <div class="amenities-and-extras">
	                    <h3>Amenities and extras</h3>
	                    <ul>
	                    	<?php foreach ($properties_amenities_and_extras_lists as $key => $properties_amenities_and_extras_list) { ?>
	                        <li><div class="amenities-icon"><img src="<?php echo $properties_amenities_and_extras_list['icons']; ?>" alt=""></div><?php echo $properties_amenities_and_extras_list['title']; ?></li>
	                       <?php } ?>
	                    </ul>
	                </div> 
	            <?php } ?>
            </div>
            <div class="booking-panel">
                <!-- <h6>$220 a night</h6>
                <form class="custom-form">
                  <div class="row">
                    <div class="col-half">
                        <input type="date" id="startDate" placeholder="Check in">
                    </div>
                    <div class="col-half">
                        <input type="date" id="endDate" placeholder="Check out">
                    </div>
                    <div class="col-full">
                        <select>
                            <option>Number of guests</option>
                            <option>Adults</option>
                            <option>Children</option>
                            <option>Infants</option>
                            <option>Pets</option>
                        </select>
                    </div>
                    <div class="btn-block text-center"><button type="submit" class="btn-primary">Reserve The Little Cottage</button></div>
                    <p>You will not be charged for this yet</p>
                  </div>
                </form> -->

                <?php echo do_shortcode('[mphb_availability id="'.get_the_ID().'"]'); ?>
            </div>
        </div>
    </div>
</section>

<section class="location-section">
    <div class="container">
        <h3>Location</h3>
        <div class="maps">
            <?php echo $properties_location_iframe; ?>
        </div>
    </div>
</section>

<section class="things-to-know-section">
    <div class="container">
        <h3>Things to know</h3>
        <div class="things-to-know-wrap">
            <div class="row">
                <div class="col-md-6">
                    <div class="during-stay <?php echo $properties_banner_and_button_background_colour; ?>">
                        <h6><?php echo $properties_things_to_know_left_side_title; ?></h6>
                        <?php echo $properties_things_to_know_left_side_content; ?>
                        <div class="btn-block">
                            <a href="<?php echo $properties_cta['url']; ?>" class="btn-primary <?php echo $properties_banner_and_button_background_colour; ?>"><?php echo $properties_cta['title']; ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="things-to-do <?php echo $properties_banner_and_button_background_colour; ?>">
                        <h6><?php echo $properties_things_to_know_right_side_title; ?></h6>
                        <?php echo $properties_things_to_know_right_side_content; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(!empty($review_lists)) { ?>
<section class="reviews-section">
    <div class="container">
        <h3>Reviews</h3>
        <div class="reviews-lists">

    <?php foreach($review_lists as $review_list) { ?>
            <div class="review-item">
                    <ul>
                        <li><?php echo $review_list['reviewer_name']; ?></li>
                        <li><?php echo $review_list['location']; ?></li>
                        <li><?php echo $review_list['date']; ?></li>
                    </ul>
                    <div class="star-rating">
                       <img src="<?php echo get_template_directory_uri(); ?>/images/stars-rating.svg" alt="">
                    </div>
                    <p><?php echo $review_list['content']; ?> </p>
                </div>
    <?php } ?>

            
            
        </div>
    </div>
</section>
<?php } ?>
<section class="newsletter-section newsletter-ocean-bg">
    <div class="container">
        <div class="newsletter-wrap">
            <div class="mail-icon"></div>
            <div class="newsletter-content">
                <h3>Sign up to our newsletter</h3>
                <p>Lorem ipsum dolor sit ut tristique amet eget pellentesque massa ac porta sapien sed</p>
            </div>
            <div class="newsletter-form">
                <!-- <form action="" method="POST">
                    <input type="text" name="" placeholder="Full name">
                    <input type="email" name="" placeholder="Email Address">
                    <input type="submit">
                </form> -->
                <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>
    </div>
</section>
	<?php
endwhile;
?>

<?php
/**
 * @hooked \MPHB\Views\SingleRoomTypeView::renderPageWrapperEnd - 10
 */
// do_action( 'mphb_render_single_room_type_wrapper_end' );
?>



<?php 
$args = array('post_type' => 'mphb_room_type','posts_per_page' => -1,'post__not_in' => array(get_the_ID()));
$mphb_room_type = new WP_Query($args );
if($mphb_room_type->have_posts()) {
?>
<section class="properties-section related-properties">
    <div class="container">
        <div class="properties-wrap">
            <?php 
            while ($mphb_room_type->have_posts()) { 
                $mphb_room_type->the_post();
                $properties_banner_and_button_background_colour = get_field('properties_banner_and_button_background_colour');
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
                    <a href="<?php echo get_the_permalink(); ?>" class="btn-primary <?php echo $properties_banner_and_button_background_colour; ?>">Take a look</a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php 
}
?>


<?php get_footer(); ?>
