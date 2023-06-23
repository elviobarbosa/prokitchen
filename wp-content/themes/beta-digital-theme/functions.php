<?php
define("URLTEMA", get_bloginfo("template_url"));
define("RESOURCES", get_bloginfo("template_url") . "/resources/");
define("IMGPATH", RESOURCES . "images/");
define("SVGPATH", IMGPATH . "svg/");
define("WHATSAPP_1", '(85) 99182-1650');
define("WHATSAPP_2", '(85) 99150-2369');
define("WHATSAPP_LINK_1", 'https://api.whatsapp.com/send?phone=558591821650&text=Olá estou intressado nos produtos DURAPLIK, você pode me ajudar?');
define("WHATSAPP_LINK_2", 'https://api.whatsapp.com/send?phone=558591502369&text=Olá estou intressado nos produtos DURAPLIK, você pode me ajudar?');

require_once 'app/cpt.php';
require_once 'app/config.php';
require_once 'app/utils.php';
require_once 'app/ajax.php';
require_once 'app/enqueue.php';

require_once 'app/members.php';

function change_taxonomies_slug( $args, $taxonomy ) {
   
    /*item category*/
    if ( 'prod_category' === $taxonomy ) {
       $args['rewrite']['slug'] = 'produtos-por-categoria';
    }
    
    return $args;
 }
 add_filter( 'register_taxonomy_args', 'change_taxonomies_slug', 10, 2 );