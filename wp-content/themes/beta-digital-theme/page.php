<?php
get_header();
?>

<main <?php post_class('page') ?>>
   <?php the_content() ?>
</main>

<?php 
 if ( is_page('portfolio') ) :
   get_template_part('template-parts/products/category-products');
 endif;
?>

<?php
get_footer();
?>