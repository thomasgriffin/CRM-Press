<?php
/**
 *
 * This file registers our sidebars that will be used throughout the site.
 *
 * @package CRM Press
 *
 */
 
if ( function_exists( 'register_sidebar' ) )
	register_sidebar( array(
			'name' => 'Home Row 1',
			'id' => 'home-row-1',
			'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget' => '</div></li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	) );
		
if ( function_exists( 'register_sidebar' ) )
	register_sidebar( array(
			'name' => 'Home Row 2',
			'id' => 'home-row-2',
			'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget' => '</div></li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	) );

if ( function_exists( 'register_sidebar' ) )
	register_sidebar( array(
			'name' => 'Home Row 3',
			'id' => 'home-row-3',
			'before_widget' => '<li id="%1$s" class="widget %2$s"><div class="widget-wrap">',
			'after_widget' => '</div></li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	) );