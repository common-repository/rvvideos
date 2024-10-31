<?php
/*
Plugin Name: RVVideos - RestoVisio's videos
Plugin URI: http://www.restovisio.com
Description: Converts RestoVisio URLs into Video embed codes
Version: 1.7
Author: Axel
Author URI: http://www.restovisio.com
*/

/*	Copyright 2011 RestoVisio (webmaster@restovisio.com)

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

// Enabling debug
define('WP_DEBUG', false);

define('RVVIDEOS_REGEXP',	'~\[http://.+\.restovisio\.com/restaurant/[a-z0-9_-]+-([0-9]+)\.htm[a-z#]{0,}\]~');
define('RVVIDEOS_WIDTH',	550);
define('RVVIDEOS_HEIGHT',	319);


/**
* Dynamically replaces RV URLs
* into the embedded video player
* on display only, not on save!
* Posts remain unchanged into 
* database !
**/
function rvvideos_plugin($content) {
	$regexp = array("~<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>~siU", "~http://www\.restovisio\.com/restaurant/[a-z0-9_-]+-([0-9]+)\.htm[a-z#]{0,}~");
	$width	= get_option('rvvideos_width');
	$height	= get_option('rvvideos_height');
	return preg_replace(RVVIDEOS_REGEXP, '<center><iframe width="'.$width.'" height="'.$height.'" border="0" frameborder="0" scrolling="no" src="http://www.restovisio.com/api/v2/video/embed.html?establishment_id=$1?source=embed&autostart=no"></iframe></center>', $content);
}


/**
* Displaying the plugin
* option page with form
* !!! No HTML here !!! 
* Including external file 
* to keep code clean
**/
function rvvideos_option_page() {
	include 'html/admin-options.php';
}


/**
* Adding the plugin option
* page into admin menu
**/
function rvvideos_add_menu() {	
	add_options_page('RVVideos Plugin options', 'RVVideos options', 8, __FILE__, 'rvvideos_option_page'); 
}
 

/**
* When plugin is enabled
* Adding default options
**/ 
function rvvideos_activate() {
	add_option('rvvideos_width', RVVIDEOS_WIDTH);
	add_option('rvvideos_height', RVVIDEOS_HEIGHT);
}

/**
* When plugin is disabled
* Removing options
**/
function rvvideos_deactive() {
	delete_option('rvvideos_width');
	delete_option('rvvideos_height');
}


/**
* Registers form fields
* When options are changed
**/
function rvvideos_admin_init() {
	load_plugin_textdomain('rvvideos', false, basename( dirname( __FILE__ ) ) . '/languages');
	register_setting('rvvideos_options', 'rvvideos_width', 'intval');
	register_setting('rvvideos_options', 'rvvideos_height', 'intval');
}


function rvvideos_admin_scripts() {
	wp_enqueue_script('rvvideos_scripts', plugins_url('js/script.js', __FILE__));
	wp_localize_script('rvvideos_scripts', 'rvvideos_js_i18n', array(
		'rvvideos_invalid_width'		=> __('Width must be a numeric between 100 and 1000', 'rvvideos'),
		'rvvideos_invalid_height'		=> __('Height must be a numeric between 58 and 581', 'rvvideos'),
	) );
}


/**
* Hooks, filters and actions
**/
register_activation_hook(__FILE__,		'rvvideos_activate');
register_deactivation_hook(__FILE__,	'rvvideos_deactive');
add_action('admin_menu',				'rvvideos_add_menu'); 
add_action('admin_init',				'rvvideos_admin_init');
add_action('admin_enqueue_scripts',		'rvvideos_admin_scripts');
add_filter('the_content',				'rvvideos_plugin');
add_filter('the_content_rss',			'rvvideos_plugin');
add_filter('comment_text',				'rvvideos_plugin');
add_filter('the_excerpt',				'rvvideos_plugin');