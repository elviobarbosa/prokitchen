<?php 
function setup() {
    //limpa do wp_head removendo tags desnecessárias
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');

    //remove smart quotes
    remove_filter('the_title', 'wptexturize');
    remove_filter('the_content', 'wptexturize');
    remove_filter('the_excerpt', 'wptexturize');
    remove_filter('comment_text', 'wptexturize');
    remove_filter('list_cats', 'wptexturize');
    remove_filter('single_post_title', 'wptexturize');

    add_filter( 'wp_mail_from', 'sender_email' );
    function sender_email( $original_email_address ) {
        return 'noreply@prokitcheb.com.br';
    }

    add_filter( 'wp_mail_from_name', 'sender_name' );
    function sender_name( $original_email_from ) {
        return 'Prokitchen';
    }

    add_filter( 'body_class', 'add_slug_body_class' );

    function add_slug_body_class( $classes ) {
        global $post;
        
        if ( isset( $post ) ) {
         $classes[] = $post->post_type . '-' . $post->post_name;

         if ( is_front_page() ) {
            $classes[] = 'front-page';
         }
        }

        return $classes;
    }

    // setup
    if (function_exists('acf_add_options_page')) :
        acf_add_options_page();
    endif;

    register_nav_menu('header-menu',__( 'Menu Principal' ));
    register_nav_menu('footer-menu',__( 'Menu Footer' ));
	
}

/**
 * Taxonomy dos produtos
 *
 * @return void
 */

function product_category() {
    // create a new taxonomy
    register_taxonomy(
        'prod_category',
        'post_produtos',
        array(
            'label' => __( 'Atuação/Marca/Modelo' ),
            'rewrite' => array( 'slug' => 'produtos-atuacao' ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );

    register_taxonomy(
        'prod-type_category',
        'post_produtos',
        array(
            'label' => __( 'Categoria do Produto' ),
            'rewrite' => array( 'slug' => 'produtos-por-categoria' ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'product_category' );

function register_custom_image_sizes() {
    if ( ! current_theme_supports( 'post-thumbnails' ) ) {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'main-image' );
        add_theme_support( 'main-image-mobile' );
        add_theme_support( 'main-image-tablet' );
        add_theme_support( 'square' );
        add_theme_support( 'portfolio-medium' );
    }
    add_image_size( 'full-image', 1920, 962, true);
    add_image_size( 'main-image', 1311, 657, true);
    add_image_size( 'main-image-mobile', 350, 263, true);
    add_image_size( 'main-image-tablet', 768, 576, true);
    add_image_size( 'square', 800, 800, true);
    add_image_size( 'portfolio-medium', 367, 248, true);
}
add_action( 'after_setup_theme', 'register_custom_image_sizes' );

function add_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'full-image' => __( 'Custom 1311x657' ),
        'main-image' => __( 'Custom 1311x657' ),
        'main-image-mobile' => __( 'Custom 350x263' ),
        'main-image-tablet' => __( 'Custom 768x576' ),
        'square' => __( 'Custom 800x800' ),
        'portfolio-medium' => __( 'Custom 367x248' ),
    ) );
}
add_filter( 'image_size_names_choose', 'add_custom_image_sizes' );

add_action( 'init', 'setup' );

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});