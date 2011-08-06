<?php
/**
 *
 * Boots up all the information necessary to output the footer part of the document.
 *
 * @package CRM Press
 *
 */
 
add_action( 'crmpress_footer', 'crmpress_footer_structure_start', 3 );
/**
 *
 * This function outputs the beginning structure of the CRM Press footer.
 *
 * We add a low priority to this action to make sure that it fires before anything else in the crmpress_footer hook.
 *
 * @since 1.0
 *
 */
function crmpress_footer_structure_start() {

	echo '<footer id="footer">'; // HTML 5 footer tag
	echo '<div class="wrap">';

}

add_action( 'crmpress_credits', 'crmpress_do_credits' );
/**
 *
 * This function outputs the credits to the CRM Press theme.
 *
 * @since 1.0
 *
 */
function crmpress_do_credits() {

	?>
	<p class="credit"><a href="http://www.billerickson.net/wordpress-genesis-crm/" target="_blank"><?php _e( 'Powered by CRM Press', 'crmpress' ); ?></a></p>
	<?php

}

add_action( 'crmpress_footer', 'crmpress_do_footer' );
/**
 *
 * This function outputs all the content contained within the CRM Press footer. 
 *
 * The following hooks are included in this action:
 *
 * crmpress_credits
 *
 * @since 1.0
 *
 */
function crmpress_do_footer() {

		do_action( 'crmpress_credits' );

}

add_action( 'crmpress_footer', 'crmpress_footer_structure_end', 20 );
/**
 *
 * This function outputs the beginning structure of the CRM Press footer.
 *
 * We add a high priority to this action to make sure that it fires after everything else in the crmpress_footer hook.
 *
 * @since 1.0
 *
 */
function crmpress_footer_structure_end() {

	echo '</div><!--end #footer .wrap-->';
	echo '</footer><!--end #footer-->'; // HTML 5 footer tag

}

add_action( 'crmpress_after_wireframe', 'crmpress_structure_end' );
/**
 *
 * This function outputs the ending structure of the CRM Press theme.
 *
 * The following hooks are included in this action:
 *
 * wp_footer, crmpress_after_html
 *
 * @since 1.0
 *
 */
function crmpress_structure_end() {

	echo '</section><!--end #wrapper-->'; // HTML 5 section tag
	wp_footer(); // Output this so plugins and other people don't get in a tizzy
	echo '</body><!--end body-->';

	do_action( 'crmpress_after_html' );

}