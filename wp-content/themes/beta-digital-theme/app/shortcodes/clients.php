<?php
function clients() {
    $argsQuery = array(
        'post_type'         => 'post_clientes',
        'post_status'       => 'publish',
        'posts_per_page'    => -1
    );
    $post_list = get_posts($argsQuery);

    $result = '';
    $i = 0;
   
    foreach ( $post_list as $post ) :
        $up = ( ($i % 2) === 0) ? 'slide-from-right' : 'slide-from-left';
        $result .= '
            <div class="clients__item js-scroll '.$up.' fade-in">
                <div class="clients__container">'.
                    '<div class="clients__image-container"><div class="clients__image"><figure>'.get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'alignleft' ) ) . '</figure></div></div>'.
                    '<h2 class="clients__title">'.$post->post_title.'</h2>' .
                    '<div class="clients__description">'.$post->post_content.'</div>
                </div>
            </div>';
            $i ++;
    endforeach;

    return '<div class="clients">' . $result . '</div>';
}
add_shortcode('clientes', 'clients');