<?php
function posttype_eventos() 
{    
    $labels = array(
        'name'                => ( 'Eventos'),
        'singular_name'       => ( 'Eventos'),
        'menu_name'           => ( 'Eventos'),
        'parent_item_colon'   => ( 'Eventos'),
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
    
    register_post_type( 'post_eventos',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-buddicons-buddypress-logo',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'taxonomies'        => ['event_category'],
            'menu_position'     => 5,
            'has_archive'       => false,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'eventos', 'with_front' => false),
            'supports'          => array( 'title', 'editor', 'excerpt'),
        )
    );
}

add_action('init', 'posttype_eventos');