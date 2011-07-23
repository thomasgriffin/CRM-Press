<?php
/**
 *
 * This file registers our navigation menus that will be used throughout the site.
 *
 * @package CRM Press
 *
 */

if ( function_exists( 'register_nav_menu' )) { 
	register_nav_menu( 'primary', 'Primary Navigation Menu' );
	register_nav_menu( 'secondary', 'Secondary Navigation Menu' );
}

/**
 *
 * This function adds our primary fallback nav menu. It simply displays the home page link. To replace this, create a new WP 3.0 Nav Menu by going
 * to Appearance > Menus
 *
 * @since 1.0
 *
 */
function crmpress_fallback_primary_nav() {

	echo '<ul id="menu-primary-navigation" class="menu">';
		echo '<li>';
			printf( __( '<a href="%s" title="<?php esc_attr( the_title() ); ?>">Home</a>', 'inline' ), trailingslashit( home_url() ) );
		echo '</li>';
	echo '</ul>';

}