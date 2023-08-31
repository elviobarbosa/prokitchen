<div data-js="accordeon">
<?php
    $is_tax = isset( $args['tax'] ) ? $args['tax'] : false;
    $parent_cat_arg = array('hide_empty' => false, 'parent' => 0 );
    $parent_cat = get_terms('prod-type_category', $parent_cat_arg);
    $marcas_parent_cat = get_terms('prod_category', $parent_cat_arg);

    foreach ($marcas_parent_cat as $category) {
        if ($category->name === 'Marca') {
            $marca_category = $category;
            break;
        }
    }
    array_push($parent_cat, $marca_category);

    $post_cat = get_the_terms( $post->ID, 'prod-type_category' );
    $marcas_cat = get_the_terms( $post->ID, 'prod_category' );

    if (is_array($post_cat) && is_array($marcas_cat)) {
        $concatenated_terms = array_merge($post_cat, $marcas_cat);
    } elseif (is_array($post_cat)) {
        $concatenated_terms = $post_cat;
    } elseif (is_array($marcas_cat)) {
        $concatenated_terms = $marcas_cat;
    } else {
        $concatenated_terms = array(); 
    }
    $post_terms = join(',', wp_list_pluck($concatenated_terms, 'parent'));    
    $marca_category = null;
    
    foreach ($parent_cat as $catVal) :
        $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
        $child_cat = get_terms( $catVal->taxonomy, $child_arg );
        $open = ( str_contains($post_terms, $catVal->term_id) && !is_archive() || str_contains($post_terms, $catVal->term_id) && $is_tax ) ? 'accordeon-opened' : '';
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
                    $selected = (  str_contains($post_terms, $child_term->parent) && !is_archive() || str_contains($post_terms, $child_term->parent) && $is_tax) ? 'prod-category__selected' : '';
                    ?>
                    <li class="prod-category__item <?php echo $selected ?>">
                        <a
                            href="<?php echo site_url(get_taxonomy($child_term->taxonomy)->rewrite['slug'] . '/') . $child_term->slug ?>" 
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