<?php
function posttype_ondecomprar() 
{    
    $labels = array(
        'name'                => ( 'Onde comprar'),
        'singular_name'       => ( 'Onde comprar'),
        'menu_name'           => ( 'Onde comprar'),
        'parent_item_colon'   => ( 'Onde comprar'),
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
    
    register_post_type( 'post_ondecomprar',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-cart',
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

add_action('init', 'posttype_ondecomprar');