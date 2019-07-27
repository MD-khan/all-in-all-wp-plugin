<?php
/**
 * @package Taxi Service
 */
namespace Inc;

// Can't be extend by other class
final class Init { 

	/**
	 * Store all the classed inside an array
	 * @return [type] array [description] Full list of class
	 */
	public static function  get_services()
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it is exist
	 * @return Nothing
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if( method_exists( $service, 'register') ) {
				$service->register();
			}//if
		} //foreach
	} //registe_service()

	/**
	 * Initialize the class
	 * @param  class $class , class from the service array
	 * @return [type]  class      [description] New instance of class
	 */
	private static function instantiate( $class ) {
		$service = new $class;
		return $service;
	}
} // class

/*
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
*/
