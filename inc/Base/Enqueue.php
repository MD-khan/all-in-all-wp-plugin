<?php
/**
 * @package Taxi Service
 */
namespace Inc\Base;
class Enqueue {
	
	/**
	 * Register enqueue
	 * @return [type] [description]
	 */
	public function register()
	{
		add_action('admin_enqueue_scripts', array($this, 'enqueue') );
	}


	/**
	 * Enque scripts and css
	 * @return 
	 */
	public function enqueue()
	{
		wp_enqueue_style('pluginstyle', PLUGIN_URL.'assets/taxistyle.css' );
		wp_enqueue_script('pluginscript', PLUGIN_URL. 'assets/taxistyle.js'  );
	}

	
} // Enqueue class