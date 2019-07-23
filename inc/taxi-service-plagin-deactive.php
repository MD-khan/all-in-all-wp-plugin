<?php 
/**
 * @package Taxi Service
 */
class PluginDectivate {

	public static function Deactivate ()
	{
		flush_rewrite_rules();
	}

}