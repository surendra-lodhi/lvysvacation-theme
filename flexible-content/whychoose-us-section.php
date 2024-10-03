<?php 
$heading = get_sub_field('heading');
$services_lists = get_sub_field('services_lists');
?>
<?php if(!empty($services_lists)) { ?>
<section class="whychoose-us-section">
    <div class="container">
        <h2><?php echo $heading; ?></h2>
        <div class="row">
            <?php foreach ($services_lists as $key => $services_list) {
                $image = $services_list['image'];
                $image_hover = $services_list['image_hover'];
                $title = $services_list['title'];
                $content = $services_list['content'];
                ?>
                <div class="col-md-4">
                    <div class="whychoose-item">
                        <?php if(!empty($image)) { ?>
                            <div class="icon tree-icon">
                                <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                                <img src="<?php echo $image_hover; ?>" class="hover-img" alt="<?php echo $title; ?>">
                            </div>
                        <?php } ?>
                        <?php if(!empty($title)) { ?>
                            <h3><?php echo $title; ?></h3>
                        <?php } ?>
                        <?php if(!empty($content)) { ?>
                            <p><?php echo $content; ?></p>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>