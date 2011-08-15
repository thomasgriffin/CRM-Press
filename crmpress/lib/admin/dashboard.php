<?php
/**
 *
 * This file removes unnecessary dashboard widgets and adds in some of our own.
 *
 * @package CRM Press
 *
 */

add_action( 'wp_dashboard_setup', 'crmpress_one_column_default' );
/**
 *
 * This function sets the dashboard column to 1 instead of the default 2 columns.
 *
 * @since 1.1
 *
 */
function crmpress_one_column_default() {

	global $user_ID, $pagenow;
	$options = get_user_option( 'screen_layout_dashboard', $user_ID );

	if ( $pagenow == 'index.php' && $options != 1 )
		update_user_option( $user_ID, 'screen_layout_dashboard', 1, true );

}



add_action( 'admin_menu', 'crmpress_remove_dashboard_boxes' );
/**
 *
 * This function removes the unnecessary default dashboard widgets.
 *
 * @since 1.0
 *
 */
function crmpress_remove_dashboard_boxes() {

	remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );
	
}


add_action( 'wp_dashboard_setup', 'crmpress_custom_dashboard_widgets' );
/**
 *
 * This function adds a dashboard widget in place of all the removed ones.
 *
 * @todo figure out what to do with this
 *
 * @since 1.0
 *
 */
function crmpress_custom_dashboard_widgets() {

	wp_add_dashboard_widget( 'crmpress-dashboard-widget', 'CRM Press', 'crmpress_dashboard_widget' );
	
}

/**
 *
 * This is the callback function for the 'CRM Press' dashboard widget.
 *
 * @since 1.1
 *
 */
if ( !function_exists( 'crmpress_dashboard_widget' ) ) {
	function crmpress_dashboard_widget() {

		global $post, $prefix;

    	echo '<h2 class="dash-title">' . get_bloginfo( 'name' ) . ' Project Information</h2>';
    	
    	echo '<div class="active-projects">';
    		echo '<h2>Active Projects</h2>';
    		echo '<ul class="column-one">';
    			$active = new WP_Query( 'category_name=active-project&posts_per_page=20' );
    			while ( $active->have_posts() ) : $active->the_post();
    			$revenue = get_custom_field( $prefix . 'revenue' );
    			$expense = get_custom_field( $prefix . 'expense' );
    			$budget = $revenue - $expense;
    			$status = get_custom_field( $prefix . 'status_summary' );
    			$url = get_custom_field( $prefix . 'client_url' );
    				echo '<li>'; ?>
    					<h3><a href="<?php echo get_edit_post_link(); ?>"><?php the_title(); ?></a></h3>
    					Status: <?php echo $status; ?><br />
    					Budget: <?php if ( $revenue ) echo '$';echo $revenue; ?> - <?php if ( $expense ) echo '$';echo $expense; ?> = $<?php echo $budget; ?><br />
    					Website: <?php if ( $url ) { ?> <a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a><?php } ?>
    				<?php echo '</li>';
    			endwhile;
    		echo '</ul>';
    		
    		wp_reset_query();
    		
    	echo '</div>';
    	
    	echo '<div class="scheduled-projects">';
    		echo '<h2>Scheduled Projects</h2>';
    		echo '<ul class="column-two">';
    			$schedule = new WP_Query( 'category_name=scheduled-project&posts_per_page=10' );
    			while ( $schedule->have_posts() ) : $schedule->the_post();
    			$revenue = get_custom_field( $prefix . 'revenue' );
    			$expense = get_custom_field( $prefix . 'expense' );
    			$budget = $revenue - $expense;
    			$status = get_custom_field( $prefix . 'status_summary' );
    			$action = get_custom_field( $prefix . 'actionitem' );
    				echo '<li>'; ?>
    					<h3><a href="<?php echo get_edit_post_link(); ?>"><?php the_title(); ?></a></h3>
    					Status: <?php echo $status; ?><br />
    					Budget: <?php if ( $revenue ) echo '$';echo $revenue; ?> - <?php if ( $expense ) echo '$';echo $expense; ?> = <span style="color: #0CB636;">$<?php echo $budget; ?></span><br />
    					Action Item: <?php if ( $action ) echo $action; ?>
    				<?php echo '</li>';
    			endwhile; wp_reset_query();
    		echo '</ul>';
    	echo '</div>';
    	
    	echo '<div class="prospects">';
    		echo '<h2>Prospects</h2>';
    		echo '<ul class="column-three">';
    			$prospect = new WP_Query( 'category_name=prospect&posts_per_page=10' );
    			while ( $prospect->have_posts() ) : $prospect->the_post();
    			$email = get_custom_field( $prefix . 'client_email' );
    			$url = get_custom_field( $prefix . 'client_url' );
    			$status = get_custom_field( $prefix . 'project_status' );
    				echo '<li>'; ?>
    					<h3><a href="<?php echo get_edit_post_link(); ?>"><?php the_title(); ?></a></h3>
    					Status: <?php echo $status; ?><br />
    					Email: <?php if ( $email ) echo $email; ?><br />
    					Website: <?php if ( $url ) { ?> <a href="<?php echo $url; ?>" target="_blank"><?php the_title(); ?></a><?php } ?>
    				<?php echo '</li>';
    			endwhile; wp_reset_query();
    		echo '</ul>';
    	echo '</div>';
    		
    	echo '<div class="clear"></div>';
    	
	}
}