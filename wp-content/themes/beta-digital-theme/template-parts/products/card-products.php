<?php
$terms = get_terms( array( 
    'taxonomy' => 'tax_name',
    'parent'   => 0
) );
    $post_cat = get_the_terms( $args['ID'], 'prod-type_category' );
    $cat_list = '';
    $siteURL = site_URL('/produtos/categoria');
    if ($post_cat && !is_wp_error($post_cat)) {
        foreach ($post_cat as $term) {
            if ($term->parent !== 0) {
                $cat_list .= "<a href='{$siteURL}/{$term->slug}' title='{$term->name}' class='c-card-products__category'>{$term->name}</a>";
            }
        }
    }
    $post_terms = join(',', wp_list_pluck($post_cat, 'slug'));
    
?>
<div class="c-card-products">

    <div class="c-card-products__image">
        <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>">
            <figure class="c-card-products__figure"><?php the_post_thumbnail('medium') ?></figure>
        </a>
    </div>

    <div class="c-card-products__content">
        <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>">
            <h2 class="c-card-products__name"><?php echo $args['title'] ?></h2>
        </a>
        
        <a href="<?php echo $args['guid'] ?>" alt="Veja mais detalhes do produto: <?php echo $args['title'] ?>">
            <div class="c-card-products__resume">
                <p><?php echo $args['resume'] ?></p>
            </div>
        </a>

        <div class="c-card-products__categories">
            <?php echo $cat_list; ?>
        </div>
    </div>

</div>