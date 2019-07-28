<?php 
/**
 * @package Taxi Service
 */
namespace Inc\Base;
use \Inc\Base\BaseController;

class SettingsLinks extends BaseController {

	public function register()
	{
		add_filter("plugin_action_links_$this->plugin_name", array($this, 'setting_link') );
	}

	/**
	 * A link to setting of the plugin
	 * @param  String $links 
	 * @return array    
	 */
	public function setting_link( $links )
	{
		$setting_link = '<a href="admin.php?page=taxi_service_plugin"> Setting </a> ';	
		array_push($links, $setting_link);
		return $links;
	}
}// class