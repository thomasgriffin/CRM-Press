<?php
/* Active Projects Widget */
/** Add our function to the widgets_init hook. **/
add_action( 'widgets_init', 'crmpress_active_projects_load_widgets' );
function crmpress_active_projects_load_widgets() {
	register_widget( 'Active_Projects_Widget' );
}

/** Define the Widget as an extension of WP_Widget **/
class Active_Projects_Widget extends WP_Widget {
	function Active_Projects_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'widget_active_projects', 'description' => 'Shows all posts in the Active Project category' );

		/* Widget control settings. */
		$control_ops = array( 'id_base' => 'active-project-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'active-project-widget', 'Active Projects', $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		extract( $args );
		echo $before_widget;
		echo $before_title.'Active Projects'.$after_title;
		
		$active = new WP_Query('category_name=active-project&posts_per_page=-1&showposts=-1');
		$count = 0;
		global $prefix;
		if ($active->have_posts()):
			echo '<ol>';
			while ($active->have_posts()): $active->the_post(); global $post; $count++;?>
				<li><a href="<?php the_permalink();?>"><?php the_title();?></a> <?php edit_post_link('Edit', '(', ')');?><br /> 
				<?php $status = get_custom_field($prefix.'status_summary'); if ($status) echo '<strong>Status:</strong> '.$status.'<br />';
				$started = get_custom_field($prefix.'start_date'); if ($started) echo '<strong>Started:</strong> '.date('F j, Y', strtotime($started)).'<br />'; 
				$revenue = get_custom_field($prefix.'revenue');
				$expense = get_custom_field($prefix.'expense');
				if ($revenue) echo '<strong>Budget:</strong> $' . (number_format($revenue - $expense)) . '</li>';
			endwhile; 
			if ($count < 1) echo "<p>Don't worry. I'm sure a few of those prospects listed in the left column will make the jump over here soon.</p><p>Or, maybe you haven't set up your categories yet. This area shows posts in the Active Projects category, so create a category with a slug 'active-project'.</p>";
			echo '</ol>';
		else:
			echo "<p>Don't worry. I'm sure a few of those prospects listed in the left column will make the jump over here soon.</p><p>Or, maybe you haven't set up your categories yet. This area shows posts in the Active Projects category, so create a category with a slug 'active-project'.</p>";
		endif;
		wp_reset_query();
		
		echo $after_widget;
	}

	
}