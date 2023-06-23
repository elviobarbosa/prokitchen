<div data-js="accordeon">
<?php
    $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
    $parent_cat = get_terms('prod-type_category', $parent_cat_arg);
    $post_cat = get_the_terms( $post->ID, 'prod-type_category' );
    $post_terms = join(',', wp_list_pluck($post_cat, 'slug'));
    
    foreach ($parent_cat as $catVal) :
        $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
        $child_cat = get_terms( 'prod-type_category', $child_arg );
        $open = ( str_contains($post_terms, $catVal->slug)  && !is_archive() ) ? 'accordeon-opened' : '';
        ?>
        <div class="prod-category__group accordeon-group <?php echo $open ?>">
            <div class="prod-category__title-container accordeon-control">
                <h3 class="prod-category__title"><?php echo wp_kses_post($catVal->name) ?></h3>
                <div>
                    <span class="prod-category__plus accordeon-open"><img src="<?php echo IMGPATH?>svg/plus.svg"></span>
                    <span class="prod-category__minus accordeon-close"><img src="<?php echo IMGPATH?>svg/minus.svg"></span>
                </div>
            </div>

            <ul class="prod-category__list accordeon-content">
                <?php
                foreach( $child_cat as $child_term ) : 
                    $selected = (  str_contains($post_terms, $child_term->slug) && !is_archive() ) ? 'prod-category__selected' : '';
                    ?>
                    <li class="prod-category__item <?php echo $selected ?>">
                        <a
                            href="<?php echo site_url('produtos-por-categoria/') . $child_term->slug ?>" 
                            alt="Ver categoria: <?php echo $child_term->name ?>">
                            <span><?php echo $child_term->name ?></span>
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