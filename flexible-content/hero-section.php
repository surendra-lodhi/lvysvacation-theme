<?php 
$background_image = get_sub_field('background_image');
$heading = get_sub_field('heading');
$cta = get_sub_field('cta');
?>

<section class="hero-section  <?php if(!is_front_page()) { ?> inner-hero-section <?php } ?>" style="background-image: url(<?php echo $background_image; ?>);">
    <div class="container">
        <?php if(!empty($heading) || !empty($cta) ){ ?>
            <div class="hero-content">
                <h1><?php echo $heading; ?></h1>
                <div class="btn-block">
                    <a href="<?php echo $cta['url']; ?>" class="btn-primary"><?php echo $cta['title']; ?></a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<?php 
wp_reset_query();
wp_reset_postdata();
?>