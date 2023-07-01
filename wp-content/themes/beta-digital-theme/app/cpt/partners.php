<?php

function posttype_parceiros() 
{    
    $labels = array(
        'name'                => ( 'Parceiros'),
        'singular_name'       => ( 'Parceiro'),
        'menu_name'           => ( 'Parceiros'),
        'parent_item_colon'   => ( 'Parceiros'),
        'all_items'           => ( 'All'),
        'view_item'           => ( 'View'),
        'add_new_item'        => ( 'Add new'),
        'add_new'             => ( 'Add new'),
        'edit_item'           => ( 'Edit'),
        'update_item'         => ( 'Update'),
        'search_items'        => ( 'Search'),
        'not_found'           => ( 'Not found'),
        'not_found_in_trash'  => ( 'Not found')
            );
    
    register_post_type( 'post_parceiros',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-admin-site',
            'labels'            => $labels,
            'public'            => false,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => false,
            'show_in_rest'      => true,
            'hierarchical'      => false,
            'supports'          => array( 'title', 'thumbnail' ),
        )
    );
}

add_action('init', 'posttype_parceiros');