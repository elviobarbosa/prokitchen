<?php

function get_custom_post_categories( $request ) {
	global $wpdb;

	$params =  $request->get_params() ;
	$category = $wpdb->prepare( '%s', $params['category'] );
	$cpt = $wpdb->prepare( '%s', $params['cpt'] );

	// Define os argumentos para a obtenção dos Custom Post Types
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	$args = array(
		'post_type' => $cpt,
		'tax_query' => array(
			array(
			'taxonomy' => $category,
			'field'    => 'slug',
			'terms'    => $term->slug,
			),
		),
	);

	// $args = array(
	// 	'post_type'         => 'post_produtos',
	// 	'tax_query' => array(
	// 		array(
	// 			'taxonomy' => 'prod_category',
	// 			'field'    => 'term_id',

	// 		),
	// 	), // Substitua 'custom_post_type' pelo nome do seu Custom Post Type.
	//    'posts_per_page' => -1,
	//    // Adicione outros argumentos de acordo com a necessidade do usuário
	//    // Exemplo: 'category' => $params['category'],
	// );

	//$cats = get_categories($args);
	//var_dump($cats);
	// Consulta os Custom Post Types de acordo com os argumentos
	$query = new WP_Query( $args );

	// Verifica se há Custom Post Types encontrados
	if ( $query->have_posts() ) {
	   $categories = array();

	   // Loop para obter as categorias dos Custom Post Types encontrados
	   while ( $query->have_posts() ) {
		  $query->the_post();

		  // Adiciona as categorias do Custom Post Type ao array
		  $post_categories = get_the_category();
		  foreach ( $post_categories as $category ) {
			 $categories[] = $category;
		  }
	   }

	   // Restaura os dados originais do post global do WordPress
	   wp_reset_postdata();

	   return $categories;
	} else {
	   // Caso não haja Custom Post Types encontrados
	   return array();
	}
}

add_action('rest_api_init', function () {
	register_rest_route('api/v1', '/categories', [
	   'methods' => 'GET',
	   'callback' => 'get_custom_post_categories',
	   'permission_callback' => function () {
		  // Verifica se a solicitação tem a origem correta
		  $site_url = get_bloginfo( 'url' );
		  //echo $site_url;
		  $allowed_origin = 'https://prokitchen.local';
		  //echo 'URl' .isset($_SERVER['HTTP_ORIGIN']) . $_SERVER['HTTP_ORIGIN'];
		  if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowed_origin) {
			 return true; // Permite a solicitação
		  } else {
			 return true; //new WP_Error('rest_forbidden', 'Acesso restrito à API.', ['status' => 403]);
		  }
	   },
	]);
});

