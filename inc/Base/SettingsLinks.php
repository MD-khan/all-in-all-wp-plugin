<?php 
/**
 * @package Taxi Service
 */
namespace Inc\Base;
class SettingsLinks {

	protected $plugin_base_name;

	public function __construct()
	{
		$this->plugin_base_name = PLUGIN;
	}

	public function register()
	{
		add_filter("plugin_action_links_$this->plugin_base_name", array($this, 'setting_link') );
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

}