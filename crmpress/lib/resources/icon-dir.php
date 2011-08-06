<?php
/**
 *
 * This file changes the icon directory.
 *
 * @package CRM Press
 *
 */
add_filter( 'icon_dir_uri', 'crmpress_icon_uri' );
/**
 *
 * This function changes the default icon directory to the admin images folder.
 *
 * @since 1.0
 *
 */
function crmpress_icon_uri( $icon_dir ) {

	return CRMPRESS_ADMIN_URL . '/images';
	 
}