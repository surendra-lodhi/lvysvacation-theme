<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage LVYSVACATIONRENTALS
 * @since Lvys Vacation Rentals 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php } ?>
        <?php
            if( class_exists('acf') ) {
                $favicon = get_field( 'lvysvacationrentals_options_favicon', 'option' );
                $favicon = ! empty($favicon) ? $favicon['url'] : '';
                if( !empty( $favicon ) ) {
        ?>
            <!-- Favicon -->
            <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
        <?php
                }
            }
        ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php 
$site_logo = get_field('lvysvacationrentals_options_site_logo','option');
    ?>
   <header id="header">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <?php if(!empty($site_logo)) { ?>
                <div class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo $site_logo; ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                </div>
            <?php } ?>
            <?php if ( has_nav_menu( 'primary' ) ) : ?>
                <div class="nav-menu">
                    <a class="menulinks"><i></i></a>
                        <?php
                                wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'mainmenu',
                                        'container' => ''
                                 ) );
                        ?>
                </div>
            <?php endif; ?>
        </div>    
    </div>
</header>