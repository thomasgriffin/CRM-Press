<?php
/**
 *
 * This file moves the WYSIWYG editor into the 'Notes' meta box.
 *
 * @package CRM Press
 *
 */

add_action( 'admin_enqueue_scripts', 'crmpress_move_posteditor', 10, 1 );
/**
 *
 * This function checks to see if we are editing or adding a new post. If so, we add in custom styling for our Notes box.
 *
 * @since 1.0
 *
 */
function crmpress_move_posteditor( $hook ) {

  	if ( $hook == 'post.php' OR $hook == 'post-new.php' ) {
		wp_enqueue_script( 'jquery' );
		add_action( 'admin_print_footer_scripts', 'crmpress_move_posteditor_scripts' );
  	}
  	
}

/**
 *
 * This function is the the add_action callback of the previous function, crmpress_move_posteditor
 *
 * @since 1.0
 *
 */
function crmpress_move_posteditor_scripts() {

	?>
	<script type="text/javascript">
		jQuery( '#postdiv, #postdivrich' ).prependTo( '#crm_notes .inside' );
	</script>
	<style type="text/css">
			#normal-sortables { margin-top: 20px; }
			#titlediv { margin-bottom: 0px; }
			#postdiv.postarea, #postdivrich.postarea { margin: 0; }
			#post-status-info { line-height: 1.4em; font-size: 13px; }
			#custom_editor .inside { margin: 2px 6px 6px 6px; }
			#ed_toolbar { display: none; }
			#postdiv #ed_toolbar, #postdivrich #ed_toolbar { display: block; }
	</style>
	<?php
	
}