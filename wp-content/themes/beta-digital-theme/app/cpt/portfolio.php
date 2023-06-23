<?php
function posttype_portfolio() 
{    
    $labels = array(
        'name'                => ( 'Portfólio'),
        'singular_name'       => ( 'Portfólio'),
        'menu_name'           => ( 'Portfólio'),
        'parent_item_colon'   => ( 'Portfólio'),
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
    
    register_post_type( 'post_portfolio',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-admin-multisite',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'menu_position'     => 5,
            'has_archive'       => false,
            'show_in_rest'      => true,
            'hierarchical'      => false,
            'supports'          => array( 'title', 'thumbnail', 'editor'),
        )
    );
}

add_action('init', 'posttype_portfolio');