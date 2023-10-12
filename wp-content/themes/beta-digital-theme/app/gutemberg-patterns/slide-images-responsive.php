
<?php

function bd_block_slide_responsive() {
    register_block_pattern(
    'bd-patterns/diferencial-slide-header',
    array(
    'title'       => __( 'Slide responsivo', 'bd-block-pattern' ),
    'description' => _x( 'Slide responsivo', 'Slide responsivo', 'bd-block-pattern' ),
    'category'    => "beta-digital",
    'content'     => "
    <!-- wp:group {\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group\"><!-- wp:group {\"className\":\"header-slide-desktop\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group header-slide-desktop\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group -->\n\n<!-- wp:group {\"className\":\"header-slide-mobile\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group header-slide-mobile\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group --></div>\n<!-- /wp:group -->
    "));
}
add_action( 'init', 'bd_block_slide_responsive' );