<?php 
$terms =  get_terms( array(
    'taxonomy'   => 'around_gulfport_tax',
    'hide_empty' => false,
    'orderby' => 'term_id'
) );
?>
<section class="tabs-section">
    <div class="container">
        <?php if(!empty($terms)) { ?>
           <ul class="tabs-header">
            <?php foreach ($terms as $key => $term) { ?>
                <li class="tabs-header-title js-tabs-title" data-term_ids="<?php echo $term->term_id;  ?>" ><?php echo $term->name; ?></li>
              <?php } ?>
           </ul>
        <?php } ?>

        <?php 
        $args = array('post_type'=> 'around_gulfport','posts_per_page' => 6);
        $around_gulfport_query = new WP_Query($args);
        if($around_gulfport_query->have_posts()){ ?> 

           <div class="tabs-content js-tabs-content" >
                <div class="around_gulfport-wrap">
                    <?php while ($around_gulfport_query->have_posts()) {
                        $around_gulfport_query->the_post();
                        $google_map_link = get_field('google_map_link',get_the_ID());
                        $contact_number = get_field('contact_number',get_the_ID());
                        $feature_img = get_the_post_thumbnail_url();
                        ?>
                    
                        <div class="near-places-lists">
                            <?php if(!empty( $feature_img)) { ?>
                                <div class="near-places-pic">
                                    <img src="<?php echo $feature_img; ?>" alt="<?php echo get_the_title(); ?>">
                                </div>
                            <?php } ?>
                            <div class="near-places-content">
                                <h3><?php echo get_the_title(); ?></h3>
                                <?php the_content(); ?>
                                <ul class="contact-lists">
                                    <?php if(!empty($google_map_link)) { ?>
                                        <li><a href="<?php echo $google_map_link; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/map-icon.svg" alt="">Find on Google maps</a></li>
                                    <?php } ?>
                                    <?php if(!empty($contact_number)) { ?>
                                        <li><a href="tel:<?php echo $contact_number; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/phone-icon-outline.svg" alt="">Contact on <?php echo $contact_number; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <nav class="navigation pagination" role="navigation">
                    <div class="nav-links">
                        <?php
                        $paginate_links = paginate_links(array(
                            'format' => '?paged=%#%',
                            'current' => 1,
                            'total' => $around_gulfport_query->max_num_pages,
                            'prev_text' => __('Previous'),
                            'next_text' => __('Next'),
                        ));
                        if ($paginate_links) {
                            ?>
                            <!--<div class="pagination">-->
                            <?php echo $paginate_links; ?>
                            <!--</div>-->
                        <?php } ?>
                    </div>
                </nav>
           </div>
        <?php } ?>
    </div>
</section>
<?php 
wp_reset_postdata();
wp_reset_query();
?>