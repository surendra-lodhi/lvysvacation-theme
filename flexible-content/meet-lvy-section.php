<?php 
$heading = get_sub_field('heading');
$content = get_sub_field('content');
$image = get_sub_field('image');
?>
<section class="meet-lvy-section">
    <div class="container">
        <div class="meet-lvy-wrap">
            <div class="meet-lvy-content">
                <?php if(!empty($heading)) {  ?>
                    <h2><?php echo $heading; ?><span class="wave-line"><img src="<?php echo get_template_directory_uri(); ?>/images/wave-line-purple.svg" alt=""></span></h2>
                <?php } ?>
                <?php if(!empty($content)) {  ?>
                    <p><?php echo $content; ?></p>
                <?php } ?>
            </div>
            <?php if(!empty($image)) {  ?>
                <div class="meet-lvy-pic">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</section>