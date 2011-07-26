<?php
/**
 *
 * Boots up all the information necessary to output the post content part of the document.
 *
 * This is where the bulk (and I mean the real meaty bulk) of the action happens for our theme. Let's get started, shall we?
 *
 * @package CRM Press
 *
 */

add_action( 'crmpress_post_title', 'crmpress_do_post_title' );
/**
 *
 * This function outputs the post title for all posts.
 *
 * @since 1.0
 *
 */
function crmpress_do_post_title() {

	global $post;

	if ( !is_page( $post->ID ) && !is_single()  ) {
		echo '<h2 class="entry-title">'; ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		<?php echo '</h2>'; ?>
	<?php }
	
	elseif ( !is_page( $post->ID ) ) { 
		echo '<div class="headline">';
			echo '<h2 class="entry-title">';
				echo the_title(); 
			echo '</h2>';
			edit_post_link( __( '<em>(Edit this entry)</em>', 'crmpress' ), '<p class="edit-link">', '</p>' );
		echo '</div><!-- end .headline -->';
	}

}

add_action( 'crmpress_before_post_content', 'crmpress_post_meta_information' );
/**
 *
 * This function outputs the single post content.
 *
 * The following hooks are added to this function by default:
 *
 * crmpress_extra_custom_fields
 *
 * @since 1.0
 *
 */
function crmpress_post_meta_information() {
	
	global $post, $prefix;
	
	$email = get_custom_field( $prefix . 'client_email' );
	$phone = get_custom_field( $prefix . 'client_phone' );
	$url = get_custom_field( $prefix . 'client_url' );
	$other_referral = get_custom_field( $prefix . 'other_referral' );
	$result = get_custom_field( $prefix . 'project_status' );
	$summary = get_custom_field( $prefix . 'status_summary' );
	$action = get_custom_field( $prefix . 'actionitem' );
	$forward = get_custom_field( $prefix . 'forwarded_to' );
	$reason = get_custom_field( $prefix . 'reason' );
	$revenue = get_custom_field( $prefix . 'revenue' );
	$expense = get_custom_field( $prefix . 'expense' );
	$start = get_custom_field( $prefix . 'start_date' );
	$end = get_custom_field( $prefix . 'end_date' );
	do_action( 'crmpress_extra_custom_fields' ); // Hook to add extra custom fields
	
	echo '<div class="column-one">';
		echo '<h2>Client Information</h2>';
			echo '<p>';
				echo '<strong>Prospect ID:</strong> ' . $post->ID . '<br />';
				echo '<strong>Status:</strong> '; the_terms( $post->ID, 'category', '', '' ); echo '<br />';
				if ( $email ) echo '<strong>Email</strong>: ' . $email . '<br />';
				if ( $url ) echo '<strong>URL</strong>: ' . $url . '<br />';
				if ( $phone ) echo '<strong>Phone</strong>: ' . $phone . '<br />';
				if ( $other_referral ) echo '<strong>Other Referral</strong>: ' . $other_referral . '<br />';
				echo '<strong>Source:</strong> '; the_terms( $post->ID, 'sources', '', '', '' ); echo '<br />';
				echo '<strong>Point of Contact:</strong> '; the_terms( $post->ID, 'poc', '', ' &middot; ', '' ); echo '<br />';
				if ( $action ) echo '<strong>Timeline:</strong> ' . $action . '<br />';
			echo '</p>';
	echo '</div><!-- end .column-one -->';
		
	echo '<div class="column-two">';
		echo '<h2>Project Information</h2>';
			echo '<p>';
				if ( $result ) echo '<strong>Result:</strong> ' . $result . '<br />';
				if ( $forward ) echo '<strong>Forwarded to:</strong> ' . $forward . '<br />';
				if ( $reason ) echo '<strong>Reason:</strong> ' . $reason . '<br />';
				if ( $revenue ) echo '<strong>Revenue:</strong> $' . number_format( $revenue ) . '<br />';
				if ( $expense) echo '<strong>Expense:</strong> $' . number_format( $expense ) . '<br />';
				if ( $start ) echo '<strong>Start Date: </strong>' . date( 'F j, Y', strtotime( $start ) ) . '<br />';
				if ( $end ) echo '<strong>End Date: </strong>' . date( 'F j, Y', strtotime( $end ) ) . '<br />'; 
				if ( $summary ) echo '<strong>Status:</strong> ' . $summary . '<br />';
			echo '</p>';
	echo '</div><!-- end .column-two -->';
		
	echo '<div class="column-three">';
		echo '<h2>Attachments</h2>';
			echo '<p>';
				$args = array(
					'post_type' => 'attachment',
					'numberposts' => null,
					'post_status' => null,
					'post_parent' => $post->ID
				);
				$attachments = get_posts( $args );
				if ( $attachments ) {
					echo '<ul class="attachment-list">';
						foreach ( $attachments as $attachment ) {
							echo '<li>' . wp_get_attachment_link( $attachment->ID, array( 32,32 ), 0, 1, false );
							echo '<span>';
							echo wp_get_attachment_link( $attachment->ID, '' , false, false, $attachment->post_title ); 
							echo '</span></li>';
						}
					echo '</ul>';
				} else {
					echo '<p><em>There are no attachments at this time.</em></p>';
				}
	echo '</div><!-- end .column-three -->';					

	if ( $content = $post->post_content ) {
		echo '<div class="notes">';
			echo '<h2>Project Notes</h2>';
				the_content();
		echo '</div><!-- end .notes -->';
	}
	
	echo '<div class="clear"></div>';
				
}




