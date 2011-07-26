<?php
/**
 *
 * This file removes some unnecessary items in the admin area.
 *
 * @package CRM Press
 *
 */

add_action( 'admin_menu', 'crmpress_remove_admin_menu_items' ); 
/**
 *
 * This function removes the admin menu items 'Links' and 'Comments'.
 *
 * @since 1.0
 *
 */
function crmpress_remove_admin_menu_items() {

 	$remove_menu_items = array( __( 'Links' ), __( 'Comments' ) );
 	
	global $menu;
	end ( $menu );
	
	while ( prev( $menu ) ) {
		$item = explode( ' ', $menu[key( $menu )][0] );
		if( in_array( $item[0] != NULL?$item[0]:"" , $remove_menu_items ) ) {
			unset( $menu[key( $menu )] );
		}
	}
	
}

add_action( 'admin_menu', 'crmpress_remove_submenus' );
/**
 *
 * This function removes post 'Tags' from the Post submenu.
 *
 * @since 1.0
 *
 */
function crmpress_remove_submenus() {

	global $submenu, $menu;
	unset( $submenu['edit.php'][16] );
	unset( $menu[59] ); // remove the extra menu separator
	  
}

add_action( 'admin_menu' , 'crmpress_remove_page_fields' );
/**
 *
 * This function removes unnecessary meta boxes from the post editing screen.
 *
 * @since 1.0
 *
 */
function crmpress_remove_page_fields() {

	remove_meta_box( 'commentstatusdiv' , 'post' , 'normal' );
	remove_meta_box( 'commentsdiv' , 'post' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'post' , 'normal' );
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
	remove_meta_box( 'authordiv' , 'post' , 'normal' );
	remove_meta_box( 'postcustom' , 'post' , 'normal' );
	remove_meta_box( 'revisionsdiv'	, 'post' , 'normal' );
	remove_meta_box( 'tagsdiv-post_tag', 'post', 'normal' );
	
}

add_action( 'widgets_init', 'crmpress_remove_widgets', 1 );
/**
 *
 * This function removes unnecessary widgets from the Appearance > Widgets section.
 *
 * @since 1.0
 *
 */
function crmpress_remove_widgets() {

	//unregister_widget( 'WP_Widget_Pages' );
	//unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	//unregister_widget( 'WP_Widget_Meta' );
	//unregister_widget( 'WP_Widget_Search' );
	unregister_widget( 'WP_Widget_Categories' );
	//unregister_widget( 'WP_Widget_Recent_Posts' );
	//unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	
}

/**
 *
 * This remove_action calls below remove unnecessary header items that are outputted by WordPress.
 *
 * @since 1.0
 *
 */
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link' );
remove_action( 'wp_head', 'start_post_rel_link' );
remove_action( 'wp_head', 'adjacent_posts_rel_link' );