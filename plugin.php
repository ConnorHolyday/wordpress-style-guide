<?php
/*
Plugin Name: The Idea Bureau, Styleguide
Plugin URI: http://github.com/theideabureau
Description: A WordPress wrapper for The Idea Bureau styleguide
Author: The Idea Bureau
Author URI: http://theideabureau.co 
Version: 1.0
*/

session_start();

global $wp_did_header;

if ( $wp_did_header !== TRUE ) {
	require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-blog-header.php');
}

$styleguide_url = '/styleguide';

if ( substr($_SERVER['REQUEST_URI'], 0, strlen($styleguide_url)) === $styleguide_url ) {
	
	// bootstrap the theme
	$theme_path = get_theme_root() . '/' . get_template();

	// if the styleguide doesn't exist, redirect to the site home
	if ( ! file_exists($theme_path . '/styleguide') ) {
		header('Location: /');
		exit();
	}

	// set the various path variables for the styleguide
	// NOTE: this is probably the suckiest way of doing this, but i'm
	// unsure about sending lots of data via the iframe src attribute
	
	$_SESSION['styleguide_paths'] = array(
		'theme_url' => get_bloginfo('template_directory'),
		'templates_path' => $theme_path . '/styleguide',
		'core_path' => dirname(__FILE__) . '/stylguide-core',
		'core_url' => '/wp-content/plugins/theideabureau-styleguide/styleguide-core'
	);

	require('styleguide-core/index.php');

}

