<?php
/**
 * Plugin Name:       Beta Digital Blocks
 * Description:       Blocks developed by Elvio Barbosa - Beta Digital.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       beta-digital-blocks
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

add_filter( 'block_categories_all' , function( $categories ) {

    // Adding a new category.
	$categories[] = array(
		'slug'  => 'beta-digital-category',
		'title' => 'Beta Digital'
	);

	return $categories;
} );

function create_block_beta_digital_blocks_block_init() {
	register_block_type( __DIR__ . '/build/block-product-content' );
	register_block_type( __DIR__ . '/build/block-product-header' );
	register_block_type( __DIR__ . '/build/block-title-subtitle' );
	register_block_type( __DIR__ . '/build/block-category-image' );
	register_block_type( __DIR__ . '/build/block-header-front' );
}
add_action( 'init', 'create_block_beta_digital_blocks_block_init' );

require_once(__DIR__ . '/src/rest.php');
