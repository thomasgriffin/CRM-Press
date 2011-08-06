<?php
/**
 *
 * This file mobilizes our CSS files.
 *
 * @package CRM Press
 *
 */

add_action( 'admin_init', 'crmpress_admin_css' );
/**
 *
 * This function registers and enqueues our admin stylesheet for the dashboard widget.
 *
 * @since 1.1
 *
 */
function crmpress_admin_css() {

	global $pagenow;
	
	wp_register_style( 'crmpress-admin', CRMPRESS_CSS_URL . '/admin-css.css' );
	
	if ( $pagenow == 'index.php' )
		wp_enqueue_style( 'crmpress-admin' );
	
}