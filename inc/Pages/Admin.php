<?php
/**
 * @package Taxi Service
 */
namespace Inc\Pages;
use \Inc\Base\BaseController;

class Admin  extends BaseController {
	
	public function register()
	{
		add_action('admin_menu', array($this, 'add_admin_pages'));
	}
	public function add_admin_pages()
	{
		add_menu_page('Taxi_Service', 'Taxi Service', 'manage_options', 'taxi_service_plugin' , 
			array($this, 'admin_index'), 'dashicons-megaphone', 10);
	}
	public function admin_index()
	{
		require_once $this->plugin_path.'templates/admin_page.php';
	}
	
} // Admin class