<?php
/**
 * @package Taxi Service
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin  extends BaseController {
	
	public $settings;
	public $callbacks;
	public $pages = array();
	public $subpages = array();

	public function __construct()
	{
		  parent::__construct();
	}

	public function register()
	{
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
		$this->setSubPages();
		$this->settings->addPages( $this->pages )->withCustomTitle('Dashboard')->addSubPages( $this->subpages)->register();
	}

	public function setPages()
	{
		$this->pages = [   
			[
				'page_title' => 'Taxi Service',
				'menu_title' => 'Taxi Service',
				'capability' => 'manage_options',
				'menu_slug' => 'taxi_service_plugin',
				'callback' => array( $this->callbacks, 'adminDashboard'),
				'icon_url' => 'dashicons-megaphone',
				'position' => '110'
			]
		];
	}

	public function setSubPages()
	{
			$this->subpages = [
			[
				'parent_slug' => 'taxi_service_plugin', 
				'page_title' => 'Custom Post Types', 
				'menu_title' => 'CPT', 
				'capability' => 'manage_options', 
				'menu_slug' => 'alecaddd_cpt', 
				'callback' => function() { echo '<h1>CPT Manager</h1>'; }
			],
			[
				'parent_slug' => 'taxi_service_plugin', 
				'page_title' => 'Custom Taxonomies', 
				'menu_title' => 'Taxonomies', 
				'capability' => 'manage_options', 
				'menu_slug' => 'alecaddd_taxonomies', 
				'callback' => function() { echo '<h1>Taxonomies Manager</h1>'; }
			],
			[
				'parent_slug' => 'taxi_service_plugin', 
				'page_title' => 'Custom Widgets', 
				'menu_title' => 'Widgets', 
				'capability' => 'manage_options', 
				'menu_slug' => 'alecaddd_widgets', 
				'callback' => function() { echo '<h1>Widgets Manager</h1>'; }
			],
		];
	}
	
} // Admin class