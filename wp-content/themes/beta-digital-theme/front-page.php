<?php
/* Template name: Front Page */
get_header();
?>

<main id="front-page" <?php post_class() ?>>
    <?php get_template_part('template-parts/home/hero'); ?>
</main>
 
<?php
get_footer();
?>