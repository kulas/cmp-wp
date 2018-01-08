<?php

namespace App;

// Creates Issue and Expert custom post types
function create_cpts() {
    register_post_type( 'issue', array(
        'labels' => array(
            'name' => __( 'Issues' ),
            'singular_name' => __( 'Issue' ),
            'add_new' => __( 'Add New' ),
            'add_new_item' => __( 'Add New Issue' ),
            'edit' => __( 'Edit' ),
            'edit_item' => __( 'Edit Issue' ),
            'view' => __( 'View' ),
            'view_item' => __( 'View Issue' ),
            'search_items' => __( 'Search Issues' ),
            'all_items' => __( 'All Issues' ),
            'not_found' => __( 'No issues found.' ),
            'not_found_in_trash' => __( 'No issues found in Trash.' ),
        ),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
        'rewrite' => array('with_front' => 'false', 'slug' => 'carnegie-magazine/issue'),
        'public' => true,
        'menu_icon' => 'dashicons-book'
    ));

    register_post_type( 'expert', array(
        'labels' => array(
            'name' => __( 'Experts' ),
            'singular_name' => __( 'Expert' ),
            'add_new' => __( 'Add New' ),
            'add_new_item' => __( 'Add New Expert' ),
            'edit' => __( 'Edit' ),
            'edit_item' => __( 'Edit Expert' ),
            'view' => __( 'View' ),
            'view_item' => __( 'View Expert' ),
            'search_items' => __( 'Search Experts' ),
            'all_items' => __( 'All Experts' ),
            'not_found' => __( 'No experts found.' ),
            'not_found_in_trash' => __( 'No experts found in Trash.' ),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-businessman'
        )
    );

    register_taxonomy('specialties', 'expert', array(
        'labels' => array(
            'name' => __('Specialties'),
            'singular_name' => __('Specialties'),
            'search_items' => __('Search Specialties'),
            'all_items' => __('All Specialties'),
            'parent_item' => __('Parent Specialties'),
            'parent_item_colon' => __('Parent Specialties:'),
            'edit_item' => __('Edit Specialty'),
            'update_item' => __('Update Specialty'),
            'add_new_item' => __('Add New Specialty'),
            'new_item_name' => __('New Specialty Name'),
            'menu_name' => __('Specialties'),
            'not_found' => __('No specialties found.'),
            'not_found_in_trash' => __('No specialties found in Trash')
        ),
        'hierarchical' => false, // more like tags
        'rewrite' => array('slug' => 'specialty', 'with_front' => false)
    ));

    register_taxonomy( 'museums', 'expert', array(
        'labels' => array(
            'name' => __('Museums'),
            'singular_name' => __('Museum'),
            'search_items' => __('Search Museums'),
            'all_items' => __('All Museums'),
            'parent_item' => __('Parent Museums'),
            'parent_item_colon' => __('Parent Museums:'),
            'edit_item' => __('Edit Museum'),
            'update_item' => __('Update Museum'),
            'add_new_item' => __('Add New Museum'),
            'new_item_name' => __('New Museum Name'),
            'menu_name' => __('Museums'),
            'not_found' => __('No museums found.'),
            'not_found_in_trash' => __('No museums found in Trash')
        ),
        'hierarchical' => true, // more like categories
        'rewrite' => array('slug' => 'museum', 'with_front' => false)
    ));
}

add_action( 'init', 'App\\create_cpts' );
?>
