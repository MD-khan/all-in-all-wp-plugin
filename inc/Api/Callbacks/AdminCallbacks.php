<?php
/**
 * @package Taxi Service
 */
namespace Inc\Api\Callbacks;
use \Inc\Base\BaseController;

class AdminCallbacks  extends BaseController {

	public function adminDashboard()
	{
		 return require_once("$this->plugin_path/templates/admin_page.php");
	}

	public function taxiServiceOptionGroup( $input )
	{
	 	return $input;	
	}

	public function taxiServiceAdminSection()
	{
		echo "Check this admin section";	
	}

	public function taxiServiceTextExample()
	{
		$value = esc_attr( get_option('text_example') );
		echo '<input type="text" class="regular-text" name="text_example" value="'.$value.'" placeholder="write something here">';	
	}

}