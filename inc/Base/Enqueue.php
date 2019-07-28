<?php
/**
 * @package Taxi Service
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class Enqueue  extends BaseController {
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
		wp_enqueue_style('pluginstyle', $this->plugin_url.'assets/taxistyle.css' );
		wp_enqueue_script('pluginscript', $this->plugin_url. 'assets/taxistyle.js'  );
	}
} // Enqueue class