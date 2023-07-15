<?php

function bd_block_difencial() {
    register_block_pattern(
    'bd-patterns/diferencial-slide',
    array(
    'title'       => __( 'Diferenciais', 'bd-block-pattern' ),
    'description' => _x( 'Diferenciais da Prokitchen', 'Block pattern description', 'bd-block-pattern' ),
    'content'     => "<!-- wp:group {\"className\":\"diferencial-header\",\"layout\":{\"type\":\"flex\",\"orientation\":\"vertical\"}} -->\n<div class=\"wp-block-group diferencial-header\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:beta-digital/block-title-subtitle -->\n<div class=\"wp-block-beta-digital-block-title-subtitle\"><div class=\"bd-block-page-titles\"><div class=\"\"><h3 class=\"bd-block-page-titles__subtitle\">Diferencial</h3><h2 class=\"bd-block-page-titles__title\">Conheça antes de comprar: teste equipamentos com a PRO Kitchen Lab</h2></div></div></div>\n<!-- /wp:beta-digital/block-title-subtitle --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"verticalAlignment\":\"center\",\"justifyContent\":\"right\"}} -->\n<div class=\"wp-block-buttons\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link wp-element-button\">Falar com especialista</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:group -->\n\n<!-- wp:cb/carousel {\"slidesToShow\":1,\"className\":\"diferencial-slide\"} -->\n<div class=\"wp-block-cb-carousel cb-single-slide diferencial-slide\" data-slick=\"{\&quot;slidesToShow\&quot;:1,\&quot;slidesToScroll\&quot;:1,\&quot;speed\&quot;:300,\&quot;dots\&quot;:true,\&quot;autoplay\&quot;:false,\&quot;autoplaySpeed\&quot;:3000,\&quot;infinite\&quot;:false,\&quot;responsive\&quot;:[{\&quot;breakpoint\&quot;:769,\&quot;settings\&quot;:{\&quot;slidesToShow\&quot;:1,\&quot;slidesToScroll\&quot;:1}}]}\"><!-- wp:cb/slide -->\n<div class=\"wp-block-cb-slide\"><!-- wp:group {\"className\":\"diferencial-slide__image\",\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group diferencial-slide__image\"><!-- wp:image {\"id\":132,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"https://prokitchen.local/wp-content/uploads/2023/06/servico-prokitchen.jpg\" alt=\"\" class=\"wp-image-132\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:paragraph -->\n<p><strong>A cozinha certa para seu negócio</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph -->\n<p>Consultoria personalizada na escolha dos melhores equipamentos de cozinha industrial, de acordo com suas necessidades e orçamento.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:cb/slide -->\n\n<!-- wp:cb/slide -->\n<div class=\"wp-block-cb-slide\"><!-- wp:group {\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group\"><!-- wp:image {\"id\":142,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-full\"><img src=\"https://prokitchen.local/wp-content/uploads/2023/06/ivario-prokitchen.jpg\" alt=\"\" class=\"wp-image-142\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:paragraph -->\n<p><strong>Teste equipamentos</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph -->\n<p>Através de nossa cozinha laboratório nossos clientes têm a oportunidade de conhecer e testar equipamentos antes da compra.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:cb/slide -->\n\n<!-- wp:cb/slide -->\n<div class=\"wp-block-cb-slide\"><!-- wp:group {\"layout\":{\"type\":\"constrained\"}} -->\n<div class=\"wp-block-group\"><!-- wp:image {\"id\":143,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"https://prokitchen.local/wp-content/uploads/2023/06/chef-prokitchen-1024x622.jpg\" alt=\"\" class=\"wp-image-143\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:group -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:paragraph -->\n<p><strong>Treinamento para sua equipe</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:66.66%\"><!-- wp:paragraph -->\n<p>Clientes PRO Kitchen contam com treinamentos para aprender a utilização correta dos equipamentos.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div>\n<!-- /wp:cb/slide --></div>\n<!-- /wp:cb/carousel -->
    "));
}
add_action( 'init', 'bd_block_difencial' );