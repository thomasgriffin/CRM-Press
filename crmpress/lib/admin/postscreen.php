<?php
/**
 *
 * This file contains functions that change the Post editing screen.
 *
 * @package CRM Press
 *
 */

add_filter( 'manage_posts_columns', 'crmpress_add_new_columns' );
/**
 *
 * This function adds new post columns.
 *
 * @since 1.0
 *
 */
function crmpress_add_new_columns( $crm_columns ) {

	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Contact Name', 'column name');
	$new_columns['status'] = __('Status');	
	$new_columns['poc'] = __('Point Of Contact');
	$new_columns['source'] = __('Source');		
	$new_columns['date'] = _x('Date', 'column name');
	return $new_columns;
	
}

add_action( 'manage_posts_custom_column', 'crmpress_manage_columns', 10, 2 );
/**
 *
 * This function adds taxonomies to the new post column.
 *
 * @since 1.0
 *
 */
function crmpress_manage_columns( $column_name, $id ) {

	global $post;
	
	switch ( $column_name ) {
		case 'status':
			$category = get_the_category(); 
			echo $category[0]->cat_name;
	    	    break;
		case 'poc':
			echo get_the_term_list( $post->ID, 'poc', '', ', ', '' );
		        break;
 		case 'source':
			echo get_the_term_list( $post->ID, 'sources', '', ', ', '' );
		        break;
		default:
			break;
	} // end switch
	
}