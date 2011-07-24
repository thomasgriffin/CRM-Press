<?php
/**
 *
 * This file adds a filter to the upload_mimes hook to allow for new types of files to be uploaded.
 *
 * @package CRM Press
 *
 */

add_filter( 'upload_mimes', 'crmpress_add_upload_support' );
/**
 *
 * This function adds MIME support for additional Adobe file types (PSD, EPS and AI).
 *
 * MIME types found at http://www.webmaster-toolkit.com/mime-types.shtml
 *
 * @since 1.0
 *
 */
function crmpress_add_upload_support( $mimes ) {

	$mimes['psd'] = 'application/psd';
	$mimes['eps'] = 'application/postscript';
	$mimes['ai'] = 'application/postscript';
	return $mimes;
	
}
