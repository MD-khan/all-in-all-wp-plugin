<?php 
/**
 * @package Taxi Service
 */
namespace Inc\Base;

class BaseController {

	public $plugin_path;
	public $plugin_url;
	public $plugin;

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path( dirname(__FILE__, 2 ) );
		$this->plugin_url = plugin_dir_url( dirname(__FILE__, 2 ) );
		//$this->plugin = plugin_basename( dirname(__FILE__, 3 ) ).'/taxi-service.php'; // need to refactor here !!
		$this->plugin = $this->plugin_basename( 3 );
	}

	private function plugin_basename( $levels )
	{
      	$basename = basename(dirname(__FILE__,$levels)).".php";
    	$files = glob( $this->plugin_path.$basename);
    	return plugin_basename($files[0]);
  	}
}