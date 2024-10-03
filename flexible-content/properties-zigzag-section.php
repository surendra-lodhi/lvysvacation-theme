<?php 
$properties_listings = get_sub_field('properties_listings');
$start_for_left_side_image = get_sub_field('start_for_left_side_image');
?>
<?php if(!empty($properties_listings)) { ?>
    <section class="properties-zigzag-section">
        <div class="container">
            <?php foreach ($properties_listings as $key => $properties_listing) {
                $start_for_left_side_image_class = '';
                if($start_for_left_side_image){
                    if($key % 2 == 0){
                        $start_for_left_side_image_class = 'image-left';
                    }else{
                        $start_for_left_side_image_class = 'image-right';
                    }
                }else{
                    if($key % 2 == 0){
                        $start_for_left_side_image_class = 'image-right';
                    }else{
                        $start_for_left_side_image_class = 'image-left';
                    }
                }
                $image = $properties_listing['image'];
                $heading = $properties_listing['heading'];
                $content = $properties_listing['content'];
                $cta = $properties_listing['cta'];
                $background_color = $properties_listing['background_color'];
            ?>
                <div class="properties-zigzag-row <?php echo $start_for_left_side_image_class; ?>">
                    <?php if(!empty($image)) { ?>
                        <div class="properties-zigzag-pic">
                            <img src="<?php echo $image; ?>" alt="<?php echo $heading; ?>">
                        </div>
                    <?php } ?>
                    <div class="properties-zigzag-content <?php echo $background_color; ?>">
                        <div class="properties-content-inner">
                            <?php if(!empty($heading)) { ?>
                                <h3><?php echo $heading; ?><span class="wave-line"></span></h3>
                            <?php } ?>
                            
                            <?php if(!empty($content)) { ?>
                                <p><?php echo $content; ?></p>
                            <?php } ?>
                            <?php if(!empty($cta)) { ?>
                                <a href="<?php echo $cta['url']; ?>" class="btn-primary"><?php echo $cta['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>