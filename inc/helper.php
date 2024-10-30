<?php
/* Cresta Addonds Helper functions */

/*  Get all register post type */
function cresta_addons_for_elementor_show_list() {
	$args = array( 'public' => true );
	$allPostTypes = get_post_types( $args, 'objects', 'and' );
	foreach ( $allPostTypes as $allposts => $allpost ) {
		$all[$allpost->name] = $allpost->label;
	}
	return $all;
}