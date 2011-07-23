<?php
/**
 *
 * Boots up all the information necessary to output the content part of the document.
 *
 * This is where the bulk of the action happens for our theme. Let's get started, shall we?
 *
 * @package CRM Press
 *
 */

add_action( 'crmpress_content', 'crmpress_content_structure_start', 3 );
/**
 *
 * This function outputs the beginning structure of the CRM Press content structure.
 *
 * We add a low priority to this action to make sure that it fires before anything else in the crmpress_content hook.
 *
 * The following hooks are added to this function by default:
 *
 * crmpress_before_content
 *
 * @since 1.0
 *
 */
function crmpress_content_structure_start() {

echo '<div id="main-content">';
	echo '<div class="wrap">';
	
		do_action( 'crmpress_before_content_sidebar_wrapper' );
	
		echo '<div class="content-sidebar-wrapper">';
		
		do_action( 'crmpress_before_content' ); // This hook fires right before the content div
		
		echo '<div id="content">';

}

add_action( 'crmpress_content', 'crmpress_do_content' );
/**
 *
 * This function outputs the loop for any of CRM Press' pages or posts. This is the meat of the theme and where a lot of the action happens.
 *
 * The following hooks are added to this function by default:
 *
 * crmpress_before_post, crmpress_before_post_title, crmpress_post_title, crmpress_after_post_title, crmpress_before_post_content, crmpress_post_content,
 * crmpress_after_post_content, crmpress_after_post, crmpress_pagination, crmpress_alternate_loop
 *
 * @since 1.0
 *
 */
function crmpress_do_content() {

if ( have_posts() ) : while ( have_posts() ) : the_post(); // Begin our content loop

	do_action( 'crmpress_before_post' ); ?>
	
	<article <?php post_class(); ?>> 
	
		<?php do_action( 'crmpress_before_post_title' ); ?>
		<?php do_action( 'crmpress_post_title' ); ?>
		<?php do_action( 'crmpress_after_post_title' ); ?>
		
		<?php do_action( 'crmpress_before_post_content' ); ?>
		<?php do_action( 'crmpress_post_content' ); ?>
		<?php do_action( 'crmpress_after_post_content' ); ?>
		
	</article><!--end .post_class-->
	
	<?php
	
	do_action( 'crmpress_after_post' );
	
	endwhile; // Partially end our loop. We'll add in another loop if we have no posts
	
	do_action( 'crmpress_pagination' ); // Add pagination on posts if necessary
	
	else: do_action( 'crmpress_alternate_loop' );
	
	endif;
	
}

add_action( 'crmpress_content', 'crmpress_content_structure_end', 20 );
/**
 *
 * This function outputs the ending structure of the CRM Press content.
 *
 * We add a high priority to this action to make sure that it fires after anything else in the crmpress_content hook.
 *
 * The following hooks are added to this function by default:
 *
 * crmpress_after_content
 *
 * @since 1.0
 *
 */
function crmpress_content_structure_end() {

		echo '</div><!--end #content-->';
			
		do_action( 'crmpress_after_content' );
			
		echo '</div><!--end .content-sidebar-wrapper-->';
		
		do_action( 'crmpress_after_content_sidebar_wrapper' );
		
	echo '</div><!--end #main-content .wrap-->';
	echo '</div><!--end #main-content-->';

}