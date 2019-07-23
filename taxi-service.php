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

class TaxiService 
{
	public function __construct() 
	{
		add_action('init', array( $this, 'customPostType') );
	}

	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue') );
	}

	
	// Create Custom Post Type
	protected function customPostType()
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







