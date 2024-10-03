<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Enqueue scripts and styles for the back end.
 */
function lvysvacationrentals_admin_scripts() {
    
        global $wp_version;
    
        // Load our admin stylesheet.
	wp_enqueue_style( 'lvysvacationrentals-admin-style', get_template_directory_uri() . '/css/admin-style.css' );
        
        // Load our admin script.
	wp_enqueue_script( 'lvysvacationrentals-admin-script', get_template_directory_uri() . '/js/admin-script.js' );

        //localize script
        $newui = $wp_version >= '3.5' ? '1' : '0'; //check wp version for showing media uploader
        wp_localize_script( 'lvysvacationrentals-admin-script', 'LVYSVACATIONRENTALSADMIN', array(
                                                                        'new_media_ui'	=>  $newui,
                                                                    ));
        wp_enqueue_media();
}

/**
 * Enqueue scripts and styles for the front end.
 */
function lvysvacationrentals_public_scripts() {

        // Load our public style stylesheet.
        wp_enqueue_style( 'lvysvacationrentals-bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css', array(), NULL );

        // Load our public style stylesheet.
        wp_enqueue_style( 'lvysvacationrentals-font-awesome-style', get_template_directory_uri() . '/css/font-awesome.min.css', array(), NULL );

        // Load our public style stylesheet.
        wp_enqueue_style( 'lvysvacationrentals-slick-style', get_template_directory_uri() . '/css/slick.css', array(), NULL );


	// Load our main stylesheet.
	wp_enqueue_style( 'lvysvacationrentals-style', get_stylesheet_uri(), array(), NULL );
	

        // Load main jquery
        wp_enqueue_script( 'jquery', array(), NULL );

        // Load public script
        wp_enqueue_script( 'lvysvacationrentals-bootstrap-script', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), NULL );

        // Load public script
        wp_enqueue_script( 'lvysvacationrentals-slick-script', get_template_directory_uri() . '/js/slick.min.js', array(), NULL );

        // Load validate script
        wp_enqueue_script( 'lvysvacationrentals-validate-script', get_template_directory_uri() . '/js/jquery.validate.js', array(), NULL );
        
        // Load public script
	wp_enqueue_script( 'lvysvacationrentals-public-script', get_template_directory_uri() . '/js/public-script.js', array(), NULL );

        wp_localize_script( 'lvysvacationrentals-public-script', 'LVYSVACATIONRENTALSFRONTEND',
                array( 
                    'ajaxurl' => admin_url( 'admin-ajax.php' )
                )
        );
}

/**
 * Enqueue scripts and styles for the admin login screen.
 */
function lvysvacationrentals_login_stylesheet() {
    wp_enqueue_style( 'lvysvacationrentals-login-style', get_stylesheet_directory_uri() . '/css/login-style.css' );
}

//add action to load scripts and styles for the back end
add_action( 'admin_enqueue_scripts', 'lvysvacationrentals_admin_scripts' );

//add action load scripts and styles for the front end
add_action( 'wp_enqueue_scripts', 'lvysvacationrentals_public_scripts' );

//add action load scripts and styles for admin login screen
add_action( 'login_enqueue_scripts', 'lvysvacationrentals_login_stylesheet' );
?>