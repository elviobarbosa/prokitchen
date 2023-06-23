<?php

function posttype_produtos() 
{    
    $labels = array(
        'name'                => ( 'Produtos'),
        'singular_name'       => ( 'Produto'),
        'menu_name'           => ( 'Produtos'),
        'parent_item_colon'   => ( 'Produtos'),
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
    
    register_post_type( 'post_produtos',
        array(
            'show_ui' => true,
            'menu_icon'         => 'dashicons-admin-appearance',
            'labels'            => $labels,
            'public'            => true,
            'show_in_menu'      => true,
            'show_in_nav_menus' => true,
            'taxonomies'        => ['post_tag', 'prod_category', 'prod-type_category'],
            'menu_position'     => 5,
            'has_archive'       => true,
            'show_in_rest'      => true,
            'hierarchical'      => true,
            'rewrite'           => array('slug' => 'produtos', 'with_front' => false),
            'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt'),
        )
    );
}

add_action('init', 'posttype_produtos');