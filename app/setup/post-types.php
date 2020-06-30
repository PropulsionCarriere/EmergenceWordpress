<?php
/**
 * Register post types.
 *
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @hook    init
 * @package WPEmergeTheme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// phpcs:disable
/*
register_post_type( 'app_custom_post_type', array(
	'labels' => array(
		'name'               => __( 'Custom Types', 'app' ),
		'singular_name'      => __( 'Custom Type', 'app' ),
		'add_new'            => __( 'Add New', 'app' ),
		'add_new_item'       => __( 'Add new Custom Type', 'app' ),
		'view_item'          => __( 'View Custom Type', 'app' ),
		'edit_item'          => __( 'Edit Custom Type', 'app' ),
		'new_item'           => __( 'New Custom Type', 'app' ),
		'search_items'       => __( 'Search Custom Types', 'app' ),
		'not_found'          => __( 'No custom types found', 'app' ),
		'not_found_in_trash' => __( 'No custom types found in trash', 'app' ),
	),
	'public'              => true,
	'exclude_from_search' => false,
	'show_ui'             => true,
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'_edit_link'          => 'post.php?post=%d',
	'query_var'           => true,
	'menu_icon'           => 'dashicons-admin-post',
	'supports'            => array( 'title', 'editor', 'page-attributes' ),
	'rewrite'             => array(
		'slug'       => 'custom-post-type',
		'with_front' => false,
	),
));
*/
// phpcs:enable

register_post_type( 'partenaires', array(
	'labels' => [
		'name'               => __( 'Partenaires', 'app' ),
		'singular_name'      => __( 'Partenaire', 'app' ),
		'add_new'            => __( 'Ajouter partenaire', 'app' ),
		'add_new_item'       => __( 'Ajouter partenaire', 'app' ),
		'view_item'          => __( 'Voir partenaire', 'app' ),
		'edit_item'          => __( 'Modifier partenaire', 'app' ),
		'new_item'           => __( 'Nouveau partenaire', 'app' ),
		'search_items'       => __( 'Chercher partenaire', 'app' ),
		'not_found'          => __( 'No partenaire trouvé', 'app' ),
		'not_found_in_trash' => __( 'No partenaire trouvé dans la corbeille', 'app' ),
	],
	'public'              => true,
	'exclude_from_search' => false,
	'show_ui'             => true,
	'capability_type'     => 'post',
	'hierarchical'        => false,
	'_edit_link'          => 'post.php?post=%d',
	'query_var'           => true,
	'menu_icon'           => 'dashicons-admin-post',
	'supports'            => ([ 'title', 'thumbnail'  ]),
	'rewrite'             => ([
		'slug'       => 'partenaire',
		'with_front' => false,
	]),
));

?>