<?php
/**
 *
 * This file creates our default 'Status' categories.
 *
 * @package CRM Press
 *
 */

add_action( 'after_setup_theme', 'crmpress_create_default_categories' );
/**
 *
 * This function creates default categories if they are not already set.
 *
 * @since 1.1
 *
 */
function crmpress_create_default_categories() {

	if( !term_exists( 'Scheduled Project', 'category' ) )
		wp_insert_term( 'Scheduled Project', 'category' );
	if( !term_exists( 'Active Project', 'category' ) )
		wp_insert_term( 'Active Project', 'category' );
	if( !term_exists( 'Closed', 'category' ) )
		wp_insert_term( 'Closed', 'category' );
	if( !term_exists( 'Complete', 'category' ) )
		wp_insert_term( 'Complete', 'category' );
	if( !term_exists( 'Forwarded Away', 'category' ) )
		wp_insert_term( 'Forwarded Away', 'category' );
	if( !term_exists( 'Outstanding Quote', 'category' ) )
		wp_insert_term( 'Outstanding Quote', 'category' );
	if( !term_exists( 'Prospect', 'category' ) )
		wp_insert_term( 'Prospect', 'category' );
	
}