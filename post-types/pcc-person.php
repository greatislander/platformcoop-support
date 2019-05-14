<?php

/**
 * Registers the `pcc_person` post type.
 */
function pcc_person_init() {
	register_post_type( 'pcc-person', array(
		'labels'                => array(
			'name'                  => __( 'People', 'platformcoop-support' ),
			'singular_name'         => __( 'Person', 'platformcoop-support' ),
			'all_items'             => __( 'All People', 'platformcoop-support' ),
			'archives'              => __( 'Person Archives', 'platformcoop-support' ),
			'attributes'            => __( 'Person Attributes', 'platformcoop-support' ),
			'insert_into_item'      => __( 'Insert into Person', 'platformcoop-support' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Person', 'platformcoop-support' ),
			'featured_image'        => _x( 'Featured Image', 'pcc-person', 'platformcoop-support' ),
			'set_featured_image'    => _x( 'Set featured image', 'pcc-person', 'platformcoop-support' ),
			'remove_featured_image' => _x( 'Remove featured image', 'pcc-person', 'platformcoop-support' ),
			'use_featured_image'    => _x( 'Use as featured image', 'pcc-person', 'platformcoop-support' ),
			'filter_items_list'     => __( 'Filter People list', 'platformcoop-support' ),
			'items_list_navigation' => __( 'People list navigation', 'platformcoop-support' ),
			'items_list'            => __( 'People list', 'platformcoop-support' ),
			'new_item'              => __( 'New Person', 'platformcoop-support' ),
			'add_new'               => __( 'Add New', 'platformcoop-support' ),
			'add_new_item'          => __( 'Add New Person', 'platformcoop-support' ),
			'edit_item'             => __( 'Edit Person', 'platformcoop-support' ),
			'view_item'             => __( 'View Person', 'platformcoop-support' ),
			'view_items'            => __( 'View People', 'platformcoop-support' ),
			'search_items'          => __( 'Search People', 'platformcoop-support' ),
			'not_found'             => __( 'No People found', 'platformcoop-support' ),
			'not_found_in_trash'    => __( 'No People found in trash', 'platformcoop-support' ),
			'parent_item_colon'     => __( 'Parent Person:', 'platformcoop-support' ),
			'menu_name'             => __( 'People', 'platformcoop-support' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => false,
		'rewrite'               => ['slug' => 'person'],
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-businessperson',
		'show_in_rest'          => true,
		'rest_base'             => 'pcc-person',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'pcc_person_init' );

/**
 * Sets the post updated messages for the `pcc_person` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `pcc_person` post type.
 */
function pcc_person_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['pcc-person'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Person updated. <a target="_blank" href="%s">View Person</a>', 'platformcoop-support' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'platformcoop-support' ),
		3  => __( 'Custom field deleted.', 'platformcoop-support' ),
		4  => __( 'Person updated.', 'platformcoop-support' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Person restored to revision from %s', 'platformcoop-support' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Person published. <a href="%s">View Person</a>', 'platformcoop-support' ), esc_url( $permalink ) ),
		7  => __( 'Person saved.', 'platformcoop-support' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Person submitted. <a target="_blank" href="%s">Preview Person</a>', 'platformcoop-support' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Person scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Person</a>', 'platformcoop-support' ),
		date_i18n( __( 'M j, Y @ G:i', 'platformcoop-support' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Person draft updated. <a target="_blank" href="%s">Preview Person</a>', 'platformcoop-support' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'pcc_person_updated_messages' );
