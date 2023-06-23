<?php
get_header();
$desktop = ( !wp_is_mobile() ) ? 'single-products__desktop' : '';
while ( have_posts() ) : the_post();
    ?>
    <main <?php post_class('single-products ' . $desktop) ?>>

        <div class="prod-category">
            <?php
            if (wp_is_mobile()) {
                get_template_part('template-parts/products/dropdown-filter');
            } else {
                get_template_part('template-parts/products/sidebar-filter');
            }
            ?>
        </div>

        <div>
            <article>
                <?php
                    the_title('<h1>', '</h1>');
                    the_content()
                ?>
            </article>
            <div>
                <?php get_template_part('template-parts/products/products-related', null, [
                    'post'  => $post,
                    'title' => get_the_title()
                ]) ?>
            </div>
        </div>
    </main>

<?php 
endwhile;
get_footer(); ?>