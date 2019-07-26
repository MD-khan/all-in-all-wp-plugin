<?php
/**
 * @package Taxi Service
 */
namespace Inc\Pages;
class Admin {
	public function __construct() 
	{
		
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
} // AdminPages class