<?php
get_header();
$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';
$cat_name = single_term_title("", false);
$product_cat = get_term_by( 'name', $cat_name, 'prod-type_category' );
$queried_term = get_queried_object();
$taxonomy = $queried_term->taxonomy;
?>
<?php get_template_part('template-parts/components/cta') ?>
<?php get_template_part('template-parts/products/contact') ?>
<main <?php post_class('archive-products ' . $desktop) ?>>
    <div class="prod-category">
        <?php
        if (wp_is_mobile()) {
            get_template_part('template-parts/products/dropdown-filter');
        } else {
            get_template_part('template-parts/products/sidebar-filter', null, ['tax' => true]);
        }
        ?>
    </div>

    <article class="archive-products__container">
        <?php
            $product_cat = get_term_by( 'name', $cat_name, 'prod-type_category' ) ? get_term_by( 'name', $cat_name, 'prod-type_category' ) : get_term_by( 'name', $cat_name, 'prod_category' );
          
            if ( $product_cat && ! is_wp_error( $product_cat ) ) :
                $category_posts = get_posts( array(
                    'post_type'      => 'post_produtos',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field'    => 'term_id',
                            'terms'    => $product_cat->term_id,
                        ),
                    ),
                ) );
        
                echo '<h2 class="archive-products__category-name"></h2>';
                echo '<div class="archive-products__grid">';
                foreach ( $category_posts as $post ) {
                    
                    get_template_part('template-parts/products/card-products', null, [
                        'title'    => $post->post_title,
                        'resume'   => $post->post_excerpt,
                        'guid'     => $post->guid,
                        'ID'       => $post->ID,
                        'show_cat' => true
                    ]);
                }
                echo '</div>';
            endif;
        ?>
   </article>
</main>

<?php get_footer(); ?>