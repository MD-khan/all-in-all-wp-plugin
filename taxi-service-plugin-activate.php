<?php 
/**
 * @package Taxi Service
 */
class PluginActivate {

	public static function Activate ()
	{
		flush_rewrite_rules();
	}

}