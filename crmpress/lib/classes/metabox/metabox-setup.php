<?php
/**
 *
 * This file sets up our meta box inputs for our users.
 *
 * @package CRM Press
 *
 */

global $prefix, $meta_boxes;
$prefix = 'crm_';
$meta_boxes = array();

$meta_boxes[] = array(
    'id' => 'client_information',
    'title' => 'Client Information',
    'pages' => array('post'), // post type
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => true, // Show field names left of input
    'fields' => array(
        array(
            'name' => 'Client Email',
            'id' => $prefix.'client_email',
            'desc' => 'Client Email',
            'type' => 'text',
        ),
        array(
            'name' => 'Client Phone',
            'id' => $prefix.'client_phone',
            'desc' => 'Client Phone',
            'type' => 'text',
        ),
        array(
            'name' => 'Client URL',
            'id' => $prefix.'client_url',
            'desc' => 'Client URL',
            'type' => 'text',
        ),
        array(
            'name' => 'Other Referral',
            'id' => $prefix.'other_referral',
            'desc' => 'Other Referral Source',
            'type' => 'text',
        )
    )
);

$meta_boxes[] = array(
    'id' => 'project_information',
    'title' => 'Project Information',
    'pages' => array('post'), // post type
	'context' => 'normal',
	'priority' => 'high',
	'show_names' => true, // Show field names left of input
    'fields' => array(
        array(
            'name' => 'Project Status',
            'id' => $prefix.'project_status',
            'type' => 'radio_inline',
            'options' => array(
            	array('name' => 'In Progress', 'value' => 'in progress'),
            	array('name' => 'No Response', 'value' => 'no response'),
            	array('name' => 'Forwarded Away', 'value' => 'forwarded away'),
            	array('name' => 'Quoted and Lost', 'value' => 'quoted and lost'),
            	array('name' => 'Quoted and Won', 'value' => 'quoted and won')
            )
        ),
        array(
            'name' => 'Status Summary',
            'id' => $prefix.'status_summary',
            'type' => 'text',
        ),
        array(
        	'name' => 'Action Item',
        	'id' => $prefix.'actionitem', 
        	'type' => 'select',
        	'options' => array(
        		array('name' => '', 'value' => ''),
        		array('name' => 'Awaiting Start Date', 'value' => 'awaiting start date'),
        		array('name' => 'Awaiting Client Approval', 'value' => 'awaiting approval'),
        		array('name' => 'Sending Contract', 'value' => 'sending contract'),
        		array('name' => 'Sending Deposit Invoice', 'value' => 'sending deposit invoice'),
        		array('name' => 'Awaiting Content', 'value' => 'awaiting content'),
        	)
        ),
        array(
        	'name' => 'Reason',
        	'id' => $prefix.'reason', 
        	'type' => 'select',
        	'options' => array(
        		array('name' => '', 'value' => ''),
				array('name' => 'accepted project', 'value' => 'accepted project'),
        		array('name' => 'project too small', 'value' => 'project too small'),
        		array('name' => 'not interested', 'value' => 'not interested'),
        		array('name' => 'outside expertise', 'value' => 'outside expertise'),
        		array('name' => 'timeframe too short', 'value' => 'timeframe too short')
        	)
        ),
        array(
        	'name' => 'Revenue',
        	'id' => $prefix.'revenue',
        	'type' => 'text_money',
        ),
        array(
        	'name' => 'Expense',
        	'id' => $prefix.'expense',
        	'type' => 'text_money',
        ),
        array(
        	'name' => 'Start Date',
        	'id' => $prefix.'start_date',
        	'desc' => 'Start Date (YYYY-MM-DD)',
        	'type' => 'text_date',	
        ),
        array(
        	'name' => 'End Date',
        	'id' => $prefix.'end_date',
        	'desc' => 'End Date (YYYY-MM-DD)',
        	'type' => 'text_date',
        ),
        array(
        	'name' => 'File Upload',
        	'id' => $prefix.'img_upload',
        	'desc' => 'Attach files',
        	'type' => 'file_list',
        ),							
    )
);