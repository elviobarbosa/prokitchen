<?php
get_header();
$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';

$categories = get_terms( array(
    'taxonomy' => 'prod-type_category',
    'parent'   => 0, 
) );

?>
<?php get_template_part('template-parts/components/cta') ?>
<?php get_template_part('template-parts/products/contact') ?>
<main <?php post_class('archive-products ' . $desktop) ?>>

    <div class="prod-category">
        <?php
        if (wp_is_mobile()) {
            get_template_part('template-parts/products/dropdown-filter');
        } else {
            get_template_part('template-parts/products/sidebar-filter');
        }
        ?>
    </div>

    <article>
        <?php
            foreach ( $categories as $category ) {
                $category_posts = get_posts( array(
                    'post_type'      => 'post_produtos',
                    'posts_per_page' => -1,
                    'tax_query'      => array(
                        array(
                            'taxonomy' => 'prod-type_category',
                            'field'    => 'term_id',
                            'terms'    => $category->term_id,
                        ),
                    ),
                ) );
            
                echo '<h2 class="archive-products__category-name">' . $category->name . '</h2>';
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
            }            
        ?>
   </article>
</main>

<?php get_footer(); ?>