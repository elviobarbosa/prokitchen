<?php
/* Template name: Front Page */
get_header();
?>

<main id="front-page" <?php post_class() ?>>
    <?php the_content() ?>
</main>
 
<?php
get_footer();
?>