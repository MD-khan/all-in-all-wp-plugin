<?php
/**
 * @package Taxi Service
 */
namespace Inc;

// Can't be extend by other class
final class Init { 

	/**
	 * Store all the classed inside an array
	 * @return [type] array [description] Full list of class
	 */
	public static function  get_services()
	{
		return [
			Pages\Admin::class,
			Base\Enqueue::class
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it is exist
	 * @return Nothing
	 */
	public static function register_services()
	{
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if( method_exists( $service, 'register') ) {
				$service->register();
			}//if
		} //foreach
	} //registe_service()

	/**
	 * Initialize the class
	 * @param  class $class , class from the service array
	 * @return [type]  class      [description] New instance of class
	 */
	private static function instantiate( $class ) {
		$service = new $class;
		return $service;
	}
} // class
