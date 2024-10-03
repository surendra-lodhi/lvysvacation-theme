<?php 
$form_shortcode = get_sub_field('form_shortcode');
?>
<?php if(!empty($form_shortcode)) { ?>
<section class="contact-form-section">
    <div class="container">
        <?php echo do_shortcode($form_shortcode); ?>
    </div>
</section>

<?php } ?>