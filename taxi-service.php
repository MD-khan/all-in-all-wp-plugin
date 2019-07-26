<?php
/**
 * @package Taxi Service
 */
/*
Plugin Name: Taxi Service 
Plugin URI: http://monirkhan.net./
Description: Used by Thousands Car Service Companies around the world. It  is a complete taxi/car service plugin that can calculate fare, book passangers.
Version: 1.0.0
Author: MD Monirujaman Khan
Author URI: http://monirkhan.net./
License: GPLv2 or later
Text Domain: Taxi Service
*/

/*
This program isfree software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/
if( ! defined('ABSPATH') ) {
	die;
}

if ( file_exists(dirname(__FILE__ ).'/vendor/autoload.php') ) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use  Inc\admin\AdminPages;
class TaxiService 
{
	public $plugin_base_name;
	public function __construct() 
	{
		$this->plugin_base_name = plugin_basename(__FILE__);
		//add_action('init', array( $this, 'customPostType') );
	}

	// Activate the plugin
	public function activate()
	{
		Activate::activate();
		flush_rewrite_rules();
	}
	public function deactivate()
	{
		Deactivate::deactivate();
		flush_rewrite_rules();
	}

	// Register plugin features
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue') );
		add_action('admin_menu', array($this, 'add_admin_pages'));
		add_filter("plugin_action_links_$this->plugin_base_name", array($this, 'setting_link') );
		add_action('init', array( $this, 'custom_post_type') );
	}

	public function setting_link( $links )
	{
		$setting_link = '<a href="admin.php?page=taxi_service_plugin"> Setting </a> ';	
		array_push($links, $setting_link);
		return $links;
	}

	public function add_admin_pages()
	{
		add_menu_page('Taxi_Service', 'Taxi Service', 'manage_options', 'taxi_service_plugin' , 
			array($this, 'admin_index'), 'dashicons-megaphone', 10);
	}
	
	public function admin_index()
	{
		require_once(plugin_dir_path(__FILE__).'templates/admin_page.php');
	}
	// Create Custom Post Type
	public function custom_post_type()
	{
		register_post_type('rideshare', [ 'public' => true, 'label' => 'Ride Share' ] );
	}
	// Enqueue 
	public function enqueue()
	{
		wp_enqueue_style('pluginstyle', plugins_url('/assets/taxistyle.css', __FILE__) );
		wp_enqueue_script('pluginscript', plugins_url('/assets/taxistyle.js', __FILE__) );
	}
}

if ( class_exists('TaxiService') ) {
	$taxiService = new TaxiService();
	$taxiService->register();
}

// Activation
register_activation_hook(__FILE__, array( $taxiService, 'activate') );
// Deactivation
register_deactivation_hook(__FILE__, array( $taxiService, 'deactivate') );







