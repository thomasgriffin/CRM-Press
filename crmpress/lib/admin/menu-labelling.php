<?php
/**
 *
 * This file contains all the functions that update menu labelling in the admin area.
 *
 * @package CRM Press
 *
 */

add_action( 'init', 'crmpress_change_post_object_label' );
/**
 *
 * This function changes the default general labelling of 'Post' to 'Contact'.
 *
 * @since 1.0
 *
 */
function crmpress_change_post_object_label() {

	global $wp_post_types;
	
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'Contacts';
	$labels->singular_name = 'Contact';
	$labels->add_new = 'Add Contact';
	$labels->add_new_item = 'Add Contact';
	$labels->edit_item = 'Edit Contacts';
	$labels->new_item = 'Contact';
	$labels->view_item = 'View Contact';
	$labels->search_items = 'Search Contacts';
	$labels->not_found = 'No Contacts found';
	$labels->not_found_in_trash = 'No Contacts found in Trash';
	
}

add_action( 'admin_menu', 'crmpress_change_post_menu_label' );
/**
 *
 * This function changes the default admin menu labelling of 'Post' to 'Contact'.
 *
 * @since 1.0
 *
 */
function crmpress_change_post_menu_label() {

	global $menu, $submenu;
	
	$menu[5][0] = 'Contacts';
	$menu[10][0] = 'Files';	
	$submenu['edit.php'][5][0] = 'Contacts';
	$submenu['edit.php'][10][0] = 'Add Contacts';
	$submenu['edit.php'][15][0] = 'Status';
	echo '';
	
}

add_action( 'gettext', 'crmpress_change_title_text' );
/**
 *
 * This function changes the default Post Title text on the Edit/Add New Post screen.
 *
 * @since 1.0
 *
 */
function crmpress_change_title_text( $translation ) {

	global $post;
	
	if ( isset( $post ) ) {
		switch ( $post->post_type ) {
			case 'post' :
				if ( $translation == 'Enter title here' ) return 'Enter Contact Name Here';
			break;
		}
	}
	
	return $translation;
	
}

add_filter( 'custom_menu_order', 'crmpress_custom_menu_order' );
add_filter( 'menu_order', 'crmpress_custom_menu_order' );
/**
 *
 * This function reorders the admin menu.
 *
 * @since 1.0
 *
 */
function crmpress_custom_menu_order( $menu_ord ) {

	if ( !$menu_ord ) return true;
	return array(
		'index.php', // this represents the dashboard link
		'edit.php', //the posts tab
		'upload.php', // the media manager
		'edit.php?post_type=page', //the posts tab
    );
    
}