<?php
    // Exit if accessed directly
    if ( !defined( 'ABSPATH' ) ) exit;
    
    /*
     * Custom Theme Options
     */
    if( function_exists('acf_add_options_page') ) {

        // Lvys Vacation Rentals General Settings
        $general_settings   = array(
                                    'page_title' 	=> __( 'Lvys Vacation Rentals Settings(For Frontend View)', 'lvysvacationrentals' ),
                                    'menu_title'	=> __( 'Lvys Vacation Rentals Settings', 'lvysvacationrentals' ),
                                    'menu_slug' 	=> 'lvysvacationrentals-general-settings',
                                    'capability'	=> 'edit_posts',
                                    'redirect'          => false,
                                    'icon_url'          => 'dashicons-admin-customizer'
                                );
        acf_add_options_page( $general_settings );

    }