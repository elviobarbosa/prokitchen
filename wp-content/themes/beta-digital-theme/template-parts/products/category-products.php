<section class="footer-prod-categories">
    
    <div class="footer-prod-categories__container">
        <h3 class="footer-prod-categories__subtitle">Produtos</h3>
        <h2 class="footer-prod-categories__title">Soluções completas em equipamentos</h2>
        <?php
        $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
        $parent_cat = get_terms('prod-type_category', $parent_cat_arg);
        $post_cat = get_the_terms( $post->ID, 'prod-type_category' );
        $post_terms = join(',', wp_list_pluck($post_cat, 'slug'));

        foreach ($parent_cat as $catVal) :
            $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
            $child_cat = get_terms( 'prod-type_category', $child_arg );
            $open = ( str_contains($post_terms, $catVal->slug)  && !is_archive() ) ? 'accordeon-opened' : '';
            $image = get_field('imagem_da_categoria', $catVal);
            $data_img = ($image) ? 'data-js="prod-image" data-url="' . $image['url'] . '"' : '';
            ?>
            <div class="footer-prod-categories__inner" <?php echo $data_img ?> >
                <div class="footer-prod-categories__parent">
                    <a href="<?php echo site_url('produtos-por-categoria/') . $catVal->slug ?>">
                        <?php echo wp_kses_post($catVal->name) ?>
                    </a>
                </div>
                <ul class="footer-prod-categories__list">
                    <?php
                    foreach( $child_cat as $child_term ) : 
                    ?>
                        <li class="footer-prod-categories__item">
                            <a href="<?php echo site_url('produtos-por-categoria/') . $child_term->slug ?>" 
                                alt="Ver categoria: <?php echo $child_term->name ?>">
                                <?php echo $child_term->name ?>
                            </a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="footer-prod-categories__img" data-js="image-category"></div>
    <div style="clear: both"></div>
</section>