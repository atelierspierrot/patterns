<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use \ReflectionClass, \Exception;

/**
 * A singleton abstract class
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractSingleton 
{

    private static $_instances = array();

    private function __construct(){}

    protected function init(){}

    public static function &getInstance() 
    {
        $classname = get_called_class(); 
        if (!isset(self::$_instances[ $classname ])) {
            $reflection_obj = new ReflectionClass($classname);
            $callable = $reflection_obj->getMethod('__construct')->isPublic();
            if ($callable) {
                self::$_instances[ $classname ] = call_user_func_array(array($reflection_obj, 'newInstance'), func_get_args());
            } else {
                self::$_instances[ $classname ] = new $classname;
            }
            self::$_instances[ $classname ]->init();
        }
        $instance = self::$_instances[ $classname ];
        return $instance;
    }

    public function __clone()
    {
        throw new Exception(
            sprintf('Cloning of a "%s" instance is not allowed!', get_called_class())
        );
    }

}
/*
abstract class AbstractSingleton 
{

	private static $_instance = array();

	private function __construct(){}

	protected function init(){}

	public static function &getInstance() 
	{
	   $classname = get_called_class(); 
	   if (!isset(self::$_instance[ $classname ])) 
	   {
		  self::$_instance[ $classname ] = new $classname();
		  self::$_instance[ $classname ]->init();
	   }
	   $instance = self::$_instance[ $classname ];
	   return $instance;
	}
	
    public function __clone()
    {
        throw new Exception(
            sprintf('Cloning of a "%s" instance is not allowed!', get_called_class())
        );
    }

}
*/
// Endfile