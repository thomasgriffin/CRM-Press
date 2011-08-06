<?php
/**
 *
 * Boots up all the information necessary to output the post content part of the document for the home page.
 *
 * @package CRM Press
 *
 */

/**
 *
 * This function outputs the loop structure for our home template.
 *
 * The following hooks/filters are added to this function by default:
 *
 * crmpress_home_loop_args, crmpress_pre_stat_loop, crmpress_stat_loop
 *
 * @since 1.0
 *
 */
function crmpress_home_loop() {

	global $post;
	
	$args = array( 
		'showposts' => -1,
		'posts_per_page' => -1
	);
	
	$all = new WP_Query( apply_filters( 'crmpress_home_loop_args', __( $args, 'crmpress' ) ) );
	global $prefix;
	
	do_action( 'crmpress_pre_stat_loop' );
	
	global $total;
	$total = 0;
	while ( $all->have_posts() ) : $all->the_post(); global $post, $meta, $prefix;
		$meta = get_post_custom( $post->ID );
		$total++;
		do_action( 'crmpress_stat_loop' );
	endwhile;
	
	wp_reset_query(); 

}

/**
 *
 * This function outputs the loop structure for our home template.
 *
 * The following hooks/filters are added to this function by default:
 *
 * crmpress_home_loop_args, crmpress_pre_stat_loop, crmpress_stat_loop
 *
 * @since 1.0
 *
 */
function crmpress_home_widgets() {

	?>
	<ul class="home-row first">
	<?php if ( !dynamic_sidebar( 'home-row-1' ) ): ?>
		<?php _e( 'Go to Appearances > Widgets > Home Row 1 and add some widgets. You may add up to three widgets in this sidebar.', 'crmpress' ); ?>
	<?php endif; ?>
	</ul><!-- end .home-row -->
	<div class="clear"></div>
					
	<ul class="home-row">
	<?php if ( !dynamic_sidebar( 'home-row-2' ) ): ?>
		<?php _e( 'Go to Appearances > Widgets > Home Row 2 and add some widgets. You may add up to three widgets in this sidebar.', 'crmpress' ); ?>
	<?php endif; ?>
	</ul><!-- end .home-row -->
	<div class="clear"></div>
					
	<ul class="home-row last">
	<?php if ( !dynamic_sidebar( 'home-row-3' ) ): ?>
		<?php _e( 'Go to Appearances > Widgets > Home Row 3 and add some widgets. You may add up to three widgets in this sidebar.', 'crmpress' ); ?>
	<?php endif; ?>
	</ul><!-- end .home-row -->
	<div class="clear"></div>
	<?php	

}