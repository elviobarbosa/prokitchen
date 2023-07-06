<?php
/* Template name: Front Page */
get_header();
?>

<main id="front-page" <?php post_class('v-line') ?>>
    <?php the_content() ?>
</main>

<?php get_template_part('template-parts/products/category-products') ?>

<?php
get_footer();
?>