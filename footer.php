<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage LVYSVACATIONRENTALS
 * @since Lvys Vacation Rentals 1.0
 */
?>
<?php 
$c_phone = get_field('lvysvacationrentals_options_c_phone','option');
$c_email = get_field('lvysvacationrentals_options_c_email','option');
$s_li_link = get_field('lvysvacationrentals_options_s_li_link','option');
$s_x_link = get_field('lvysvacationrentals_options_s_x_link','option');
$s_fb_link = get_field('lvysvacationrentals_options_s_fb_link','option');
$s_in_link = get_field('lvysvacationrentals_options_s_in_link','option');
$s_yt_link = get_field('lvysvacationrentals_options_s_yt_link','option');
$f_logo = get_field('lvysvacationrentals_options_f_logo','option');
$f_copy = get_field('lvysvacationrentals_options_f_copy','option');
$f_website_by = get_field('lvysvacationrentals_options_f_website_by','option');
//$ = get_field('','option');
?>

		<!-- Footer start here -->
    <footer class="site-footer">
        <div class="footer-top">
            <div class="container">
            	<div class="row">
                    <?php if ( has_nav_menu( 'properties' ) ) { ?>
            		<div class="col-lg-3 col-md-4">
                    	<div class="properties">
                            <h3>Properties</h3>
                            <?php
                                wp_nav_menu( array(
                                        'theme_location' => 'properties',
                                        'menu_class'     => '',
                                        'container' => ''
                                 ) );
                        ?>
                        </div>
                    </div>
                <?php } ?>
                    <div class="col-lg-6 col-md-5">
                    	<div class="book-today">
                            <?php if(!empty($c_phone) || !empty($c_email)) { ?> 
                                <h3>Book Today</h3>
                                <?php if(!empty($c_phone)) { ?> 
                                    <p><a href="tel:<?php echo $c_phone; ?>">Call us on <?php echo $c_phone; ?></a></p>
                                <?php } ?>
                                <?php if(!empty($c_email)) { ?> 
                                    <p><a href="mailto:<?php echo $c_email; ?>"><?php echo $c_email; ?></a></p>
                                <?php } ?>
                            <?php } ?>
                            <ul>

                                <?php if(!empty($s_li_link)) { ?> 
                                    <li class="linkedin"><a href="<?php echo $s_li_link   ;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                <?php } ?>
                                <?php if(!empty($s_x_link)) { ?> 
                                    <li class="twitter"><a href="<?php echo $s_x_link   ;?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/x-twitter.svg" alt=""></a></li>
                                <?php } ?>

                                <?php if(!empty($s_fb_link)) { ?> 
                                    <li class="facebook"><a href="<?php echo $s_fb_link   ;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>

                                <?php if(!empty($s_in_link)) { ?> 
                                    <li class="instagram"><a href="<?php echo $s_in_link   ;?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <?php } ?>

                                <?php if(!empty($s_yt_link)) { ?> 
                                    <li class="youtube"><a href="<?php echo $s_yt_link   ;?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php if(!empty($f_logo)) { ?> 
                    <div class="col-lg-3 col-md-3">
                        <div class="footer-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo $f_logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
                            </a>
                        </div>
                    </div>
                <?php } ?>
            	</div>
            </div>
        </div>
		<div class="copyright">
            <div class="container">
                <div class="row">
                    <?php if(!empty($f_copy)) { ?> 
                        <div class="col-lg-7 col-sm-12">
                            <div class="copy-menu">
                                <?php echo $f_copy; ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php if(!empty($f_website_by)) { ?> 
                        <div class="col-lg-5 col-sm-12">
                            <div class="website-by">
                                <?php echo $f_website_by; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>      
        </div>
	</footer><!-- Footer End here -->

        <?php wp_footer(); ?>
    </body>
</html>
