<?php
/**
 *
 * This file registers our default taxonomies.
 *
 * @package CRM Press
 *
 */

add_action( 'init', 'crmpress_register_default_taxonomies', 0 );
/**
 *
 * This function registers the default taxonomies for the CRM Press theme.
 *
 * The following filters are added to this function by default:
 *
 * crmpress_poc_tax_args, crmpress_sources_tax_args
 *
 * @since 1.0
 *
 */
function crmpress_register_default_taxonomies() {

	$poc_args = array(
		'hierarchical' => true,
		'labels' => array(
			'name' => 'Points of Contact',
			'singular_name' => 'Point of Contact'
		),
		'query_var' => true,
		'rewrite' => true
	);
	register_taxonomy( 'poc', 'post', apply_filters( 'crmpress_poc_tax_args', __( $poc_args, 'crmpress' ) ) );
	
	$sources_args = array(
		'hierarchical' => true, 
		'labels' => array(
			'name' => 'Sources',
			'singlular_name' => 'Source'
		),
		'query_var' => true, 
		'rewrite' => true
	);
	register_taxonomy( 'sources', 'post', apply_filters( 'crmpress_sources_tax_args', __( $sources_args, 'crmpress') ) ); 	
	
}