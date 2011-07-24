<?php
/**
 *
 * This file contains core functions that are used throughout the CRM Press theme.
 *
 * @package CRM Press
 *
 */

/**
 *
 * This function calculates and returns a percentage.
 *
 * @since 1.0
 *
 */
function crm_percent( $num_amount, $num_total ) {

	$count1 = $num_amount / $num_total;
	$count2 = $count1 * 100;
	$count = number_format( $count2, 0 );
	return $count . '%';
	
}

/**
 *
 * This function is shorthand post meta grabber.
 *
 * @since 1.0
 *
 */
function get_custom_field( $field ) {

	global $post;
	
	$value = get_post_meta( $post->ID, $field, true );
	if ( $value ) return esc_attr( $value );
	else return false;
	
}