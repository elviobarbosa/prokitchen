<?php
define("URLTEMA", get_bloginfo("template_url"));
define("RESOURCES", get_bloginfo("template_url") . "/resources/");
define("IMGPATH", RESOURCES . "images/");
define("SVGPATH", IMGPATH . "svg/");
define("WHATSAPP", '85997947644');
define("WHATSAPP_TEXT", 'Olá estou com dúvidas e preciso falar com um especialista.');


require_once 'app/cpt.php';
require_once 'app/config.php';
require_once 'app/utils.php';
require_once 'app/ajax.php';
require_once 'app/enqueue.php';
require_once 'app/gutemberg-patterns.php';
require_once 'app/members.php';
require_once 'app/shortcodes.php';

function change_taxonomies_slug( $args, $taxonomy ) {
   
    /*item category*/
    if ( 'prod_category' === $taxonomy ) {
       $args['rewrite']['slug'] = 'produtos-por-categoria';
    }
    
    return $args;
 }
 //add_filter( 'register_taxonomy_args', 'change_taxonomies_slug', 10, 2 );

 