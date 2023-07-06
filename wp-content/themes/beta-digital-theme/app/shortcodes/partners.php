<?php
function partners() {
    $argsQuery = array(
        'post_type'         => 'post_parceiros',
        'post_status'       => 'publish',
        'posts_per_page'    => -1
    );
    $post_list = get_posts($argsQuery);
    $slickdata = [
        'slidesToShow'   => 1, 
        'slidesToScroll' => 1,
        'arrows'         => false,
        'autoplay'       => true,
        'vertical'       => true
    ];
    //data-js="slick" data-slick=\''. wp_json_encode( $slickdata )  .'\'
    $opacity = 1;
    $position = 0;
    $decorator = '';
    for ($i = 1; $i < 5; $i++) {
        $opacity -= 0.15;
        $position -= 20;
        $decorator .= '<div class="partners-slide__decorator" style="opacity:' .$opacity. '; transform: translate('.abs($position).'px, '.$position.'px) skewY(10deg)"></div>';
    }
    $result = '<div class="partners-slide">';
    $result .= '<div class="partners-slide__container" data-js="slick" data-slick=\''. wp_json_encode( $slickdata )  .'\'>';
    foreach ( $post_list as $post ) :
        $result .= '<div class="partners-slide__item">'.get_the_post_thumbnail( $post->ID, 'full', array( 'class' => 'alignleft' ) ).'</div>';
    endforeach;
    $result .= '</div>';
    $result .= $decorator;
    $result .= '</div>';
    return $result;
}
add_shortcode('parceiros', 'partners');