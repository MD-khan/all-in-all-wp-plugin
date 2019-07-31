<?php
/**
 * @package Taxi Service
 */
namespace Inc\Pages;
use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;

class Admin  extends BaseController {
	
	public $settings;
	public $pages = array();
	public function __construct()
	{
		$this->settings = new SettingsApi();
		$this->pages = [   
			[
				'page_title' => 'Taxi Service',
				'menu_title' => 'Taxi Service',
				'capability' => 'manage_options',
				'menu_slug' => 'taxi_service_plugin',
				'callback' => function() { echo '<h1> Taxi service plugin </h1>'; },
				'icon_url' => 'dashicons-megaphone',
				'position' => '110'
			],
			[
				'page_title' => 'Lyft Service',
				'menu_title' => 'Lyft Service',
				'capability' => 'manage_options',
				'menu_slug' => 'lyft_service_plugin',
				'callback' => function() { echo '<h1> Lyft service plugin </h1>'; },
				'icon_url' => 'dashicons-external',
				'position' => '111'
			]
		];
	}

	public function register()
	{
		$this->settings->addPages( $this->pages )->register();
	}
	
} // Admin class