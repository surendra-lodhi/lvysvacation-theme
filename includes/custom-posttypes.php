<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Register Around Gulfport Post Types
 */
function lvysvacationrentals_register_post_types() {

    $custompost_labels = array(
                            'name'               => _x( 'Around Gulfport Post', 'custom_post', 'lvysvacationrentals' ),
                            'singular_name'      => _x( 'Around Gulfport Post', 'custom_post', 'lvysvacationrentals' ),
                            'menu_name'          => _x( 'Around Gulfport Post', 'custom_post', 'lvysvacationrentals' ),
                            'name_admin_bar'     => _x( 'Around Gulfport Post', 'custom_post', 'lvysvacationrentals' ),
                            'add_new'            => _x( 'Add New', 'custom_post', 'lvysvacationrentals' ),
                            'add_new_item'       => __( 'Add New Around Gulfport Post', 'lvysvacationrentals' ),
                            'new_item'           => __( 'New Around Gulfport Post', 'lvysvacationrentals' ),
                            'edit_item'          => __( 'Edit Around Gulfport Post', 'lvysvacationrentals' ),
                            'view_item'          => __( 'View Around Gulfport Post', 'lvysvacationrentals' ),
                            'all_items'          => __( 'All Around Gulfport Post', 'lvysvacationrentals' ),
                            'search_items'       => __( 'Search Around Gulfport Post', 'lvysvacationrentals' ),
                            'parent_item_colon'  => __( 'Parent Around Gulfport Post:', 'lvysvacationrentals' ),
                            'not_found'          => __( 'No Around Gulfport Post Found.', 'lvysvacationrentals' ),
                            'not_found_in_trash' => __( 'No Around Gulfport Post Found In Trash.', 'lvysvacationrentals' ),
                        );

    $custompost_args = array(
                            'labels'             => $custompost_labels,
                            'public'             => true,
                            'publicly_queryable' => true,
                            'show_ui'            => true,
                            'show_in_menu'       => true,
                            'query_var'          => true,
                            'rewrite'            => array( 'slug'=> 'aroundgulfport', 'with_front' => false ),
                            'capability_type'    => 'post',
                            'has_archive'        => false,
                            'hierarchical'       => false,
                            'menu_position'      => null,
                            'menu_icon'          => 'dashicons-pressthis',
                            'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail', 'page-attributes' )
                        );

    register_post_type( LVYSVACATIONRENTALS_AROUND_GULFPORT_POST_TYPE, $custompost_args );
    
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
                    'name'              => _x( 'Categories', 'taxonomy general name', 'lvysvacationrentals'),
                    'singular_name'     => _x( 'Category', 'taxonomy singular name','lvysvacationrentals' ),
                    'search_items'      => __( 'Search Categories','lvysvacationrentals' ),
                    'all_items'         => __( 'All Categories','lvysvacationrentals' ),
                    'parent_item'       => __( 'Parent Category','lvysvacationrentals' ),
                    'parent_item_colon' => __( 'Parent Category:','lvysvacationrentals' ),
                    'edit_item'         => __( 'Edit Category' ,'lvysvacationrentals'), 
                    'update_item'       => __( 'Update Category' ,'lvysvacationrentals'),
                    'add_new_item'      => __( 'Add New Category' ,'lvysvacationrentals'),
                    'new_item_name'     => __( 'New Category Name' ,'lvysvacationrentals'),
                    'menu_name'         => __( 'Categories' ,'lvysvacationrentals')
                );

    $args = array(
                    'hierarchical'      => true,
                    'labels'            => $labels,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'query_var'         => true,
                    'rewrite'           => array( 'slug'=> 'aroundgulfport_tax' )
                );
	
    register_taxonomy( LVYSVACATIONRENTALS_AROUND_GULFPORT_POST_TAX, LVYSVACATIONRENTALS_AROUND_GULFPORT_POST_TYPE, $args );
    
    //flush rewrite rules
    flush_rewrite_rules();
}

//add action to create custom post type
add_action( 'init', 'lvysvacationrentals_register_post_types' );
?>