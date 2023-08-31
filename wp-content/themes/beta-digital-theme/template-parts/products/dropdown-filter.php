<div class="prod-category-mobile__container">
    <div class="prod-category-mobile__title-container">
        <h3 class="prod-category-mobile__title">
            <?php 
            $categories = get_the_terms( $post->ID, 'prod-type_category' );
            $categoriyList = '';
            usort( $categories, function( $a, $b ) {
                return $a->parent - $b->parent;
            } );

            if ( $categories && ! is_wp_error( $categories ) ) {
                foreach ( $categories as $category ) {
                    $categoriyList .= $category->name . ' > ';
                }
            }
            echo substr($categoriyList, 0, -2);
            ?>
        </h3>
        <div class="prod-category-mobile__filter">
            <h3>Categorias <?php the_SVG('plus') ?></h3>
            <select onchange="location = this.value;">
                <?php
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

                foreach ($parent_cat as $catVal) :
                    $child_arg = array( 'hide_empty' => false, 'parent' => $catVal->term_id );
                    $child_cat = get_terms( $catVal->taxonomy, $child_arg );
                    ?>
                    <optgroup label="<?php echo wp_kses_post($catVal->name) ?>">
                        <?php
                        foreach( $child_cat as $child_term ) :
                            ?>
                            <option value="<?php echo site_url('produtos-por-categoria/') . $child_term->slug ?>"><?php echo $child_term->name ?></option>
                            <?php
                        endforeach;
                        ?>
                    </optgroup>
                <?php
                endforeach;
                ?>
            </select>
        </div>
        
    </div>
</div>