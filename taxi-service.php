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

// if this file is called directly, abort!!
defined( 'ABSPATH') or die( 'Hey, You are kidding me!');

// Require once, the composer autoload
if ( file_exists(dirname(__FILE__ ).'/vendor/autoload.php') ) {
	require_once dirname(__FILE__).'/vendor/autoload.php';
}

// Define some necessery Constant.
define('PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('PLUGIN', plugin_basename( __FILE__ ) );

use Inc\Base\Activate;
use Inc\Base\Deactivate;
/**
 * The code that runs during the activation
 * @return [type] [description]
 */
function activate() {
	Activate::activate();
}
/**
 * The code that run during the plugin deactivation
 * @return [type] [description]
 */
function deactivate(){
	Deactivate::deactivate();
}
register_activation_hook(__FILE__, 'activate' );
register_deactivation_hook(__FILE__,  'deactivate');


if(class_exists('Inc\\Init') ) {
	Inc\Init::register_services();
}
