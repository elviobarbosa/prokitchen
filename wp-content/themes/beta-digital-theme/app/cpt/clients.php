<?php
function posttype_clientes() 
{    
    $labels = array(
        'name'                => ( 'Clientes'),
        'singular_name'       => ( 'Clientes'),
        'menu_name'           => ( 'Clientes'),
        'parent_item_colon'   => ( 'Clientes'),
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
    
    register_post_type( 'post_clientes',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-money',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => false,
            'show_in_rest'      => true,
            'hierarchical'      => false,
            'rewrite'           => array('slug' => 'clientes', 'with_front' => false),
            'supports'          => array( 'title', 'editor', 'thumbnail'),
        )
    );
}

add_action('init', 'posttype_clientes');