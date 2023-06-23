<?php
//================== STYLES e SCRIPTS ====================

function wpdocs_theme_name_scripts() {

    // wp_enqueue_script( 'frontend-ajax', URLTEMA . '/resources/scripts/agenda.js', array('jquery'), null, true );
    // wp_localize_script(
    //     'frontend-ajax',
    //     'frontend_ajax_object',
    //     array(
    //         'ajaxurl' => admin_url( 'admin-ajax.php' ),
    //         'nonce'   => wp_create_nonce('ajax-nonce')
    //     )
    // );
   
    //styles
    wp_enqueue_style('site-style', get_template_directory_uri() . '/dist/styles/frontend.css?' . rand(), array());
    
    function prefix_add_footer_styles() {
        wp_enqueue_style( 'font-inter', 'https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600&display=swap' );
    };
    
    //scripts
    wp_enqueue_script( 'jquery' );
 }
 
 add_action( 'get_footer', 'prefix_add_footer_styles' );
 add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );
 
 //================== STYLES e SCRIPTS ====================