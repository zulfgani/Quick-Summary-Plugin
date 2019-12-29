<?php
/*
Plugin Name:       Quick Summary
Description:       A ClassicPress plugin that adds a meta box functionality to the post editor for a quick summary of a post.
Plugin URI:        https://forums.classicpress.net/u/Horlaes
Contributors:      Horlaes
Author:            Horlaes
Author URI:        https://github.com/horlaes/
Donate link:       https://devsrealm.com
Tags:              metabox, quote field
Version:           1.0.0
Stable tag:        1.0.0
Requires at least: 1.0.0
Tested up to:      1.1.2
Text Domain:       quicksummary
Domain Path:       /languages/
License:           GPL v2 or later
License URI:       https://www.gnu.org/licenses/gpl-2.0.txt

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 
2 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
with this program. If not, visit: https://www.gnu.org/licenses/
*/

// exit if file is called directly
if ( ! defined( 'ABSPATH' ) ) {

	exit;

}

/* Set plugin version constant. */
define( 'QUICK_SUMMARY_VERSION', '1.0.0' );

define( 'QUICK_SUMMARY__FILE__', __FILE__ );
define( 'QUICK_SUMMARY_PLUGIN_BASE', plugin_basename( QUICK_SUMMARY__FILE__ ) );
define( 'QUICK_SUMMARY_URL', plugins_url( '/', QUICK_SUMMARY__FILE__ ) );
define( 'QUICK_SUMMARY_PATH', plugin_dir_path( QUICK_SUMMARY__FILE__ ) );
define( 'QUICK_SUMMARY_ADMIN_PATH', QUICK_SUMMARY_PATH . 'admin/' );
define( 'QUICK_SUMMARY_INCLUDES_PATH', QUICK_SUMMARY_PATH . 'includes/' );

/**
 * Load plugins file
 * @since 1.0.0
 */
function quick_summary_plugins_loaded(){

	/* Load Text Domain (Language Translation) */
	load_plugin_textdomain( 'quicksummary', false, QUICK_SUMMARY_PLUGIN_BASE . '/languages/' );
	
	// if admin area
	if ( is_admin() ) {
		// include dependencies
		require_once QUICK_SUMMARY_INCLUDES_PATH . 'summary-fields.php';
	}
}
add_action( 'plugins_loaded', 'quick_summary_plugins_loaded' );

// enqueue public style
function quicksummary_enqueue_style_public() {
	
	if ( is_single() ) {

	$src = plugin_dir_url( __FILE__ ) .'public/css/quicksummary.css';

	wp_enqueue_style( 'quicksummary', $src, array(), null, 'all' );
	
	}

}
add_action( 'wp_enqueue_scripts', 'quicksummary_enqueue_style_public' );




// enqueue style
function quicksummary_css_admin( $hook ) {

	// wp_die( $hook );
	
		$src = plugin_dir_url( __FILE__ ) .'admin/css/quicksummary.css';

		wp_enqueue_style( 'quicksummary', $src, array(), null, 'all' );

}
add_action( 'admin_enqueue_scripts', 'quicksummary_css_admin' );






