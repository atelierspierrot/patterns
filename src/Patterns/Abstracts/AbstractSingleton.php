<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use \ReflectionClass;
use \Exception;

/**
 * A singleton abstract class
 *
 * No abstract method is defined but the best practice is to define an `init()` method in
 * the child class as it will be called after instance creation. Arguments passed to the
 * `getInstance` and `getInstanceByClassname` methods will be transmitted to the `__construct`
 * or `init` method.
 *
 * The complete stack trace for an instance creation is:
 *
 * - if the constructor is public (*bad practice*):
 *
 *       $class->__construct( arguments )
 *       $class->init()
 *
 * - if the constructor is not public (*good practice*):
 *
 *       $class = new classname
 *       $class->init( arguments )
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractSingleton 
{

    /**
     * The instances stack
     */
    private static $_instances = array();

    /**
     * Constructor : classic object constructor
     *
     * The best practice is to define a `private` constructor to avoid object direct 
     * creation ; if the constructor is public, it will receive the arguments passed
     * to the `getInstance` method.
     */
    private function __construct(){}

    /**
     * Initializer : this method is called after any instance creation
     *
     * This method will receive the arguments passed to the `getInstance` method while
     * creating a new instance ; you can use it to define a special constructor with
     * required arguments.
     *
     * Note that the `init()` method must be callable by this mother class: you MUST define
     * it as `public` or `protected`.
     */
//    protected function init(){}

    /**
     * Static object getter: creation of an instance of the current calling class
     *
     * @param any You can define as many parameters as wanted, they will be passed to
     *            the `__construct` or `init` methods
     * @return object This may return an instance of an object
     */
    public static function &getInstance() 
    {
        $classname = get_called_class(); 
        if (!isset(self::$_instances[ $classname ])) {
            self::createInstance($classname, func_get_args());
        }
        $instance = self::$_instances[ $classname ];
        return $instance;
    }

    /**
     * Static object getter: creation of an instance from the class name passed in first argument
     *
     * @param string $classname The classname to create object from
     * @param any You can define as many parameters as wanted, they will be passed to
     *            the `__construct` or `init` methods
     * @return object This may return an instance of an object
     */
    public static function &getInstanceByClassname($classname) 
    {
        $arguments = func_get_args();
        array_shift($arguments);
        if (!isset(self::$_instances[ $classname ])) {
            self::createInstance($classname, $arguments);
        }
        $instance = self::$_instances[ $classname ];
        return $instance;
    }

    /**
     * Real object instances creation
     *
     * @param string $classname The classname to create object from
     * @param array $arguments The arguments to pass to the `__construct` or `init` method
     * @return void
     */
    private static function createInstance($classname, array $arguments = array())
    {
        $reflection_obj = new ReflectionClass($classname);
        if ($reflection_obj->getMethod('__construct')->isPublic()) {
            self::$_instances[ $classname ] = call_user_func_array(array($reflection_obj, 'newInstance'), $arguments);
            if (
                method_exists(self::$_instances[ $classname ], 'init') &&
                is_callable(array(self::$_instances[ $classname ], 'init'))
            ) {
                self::$_instances[ $classname ]->init();
            }
        } else {
            self::$_instances[ $classname ] = new $classname;
            if (
                method_exists(self::$_instances[ $classname ], 'init') &&
                is_callable(array(self::$_instances[ $classname ], 'init'))
            ) {
                call_user_func_array(array(self::$_instances[ $classname ], 'init'), $arguments);
            }
        }
    }

    /**
     * Object cloning is avoid
     *
     * @throws Exception Trying to clone a Singleton object will throw an Excpetion
     */
    public function __clone()
    {
        throw new Exception(
            sprintf('Cloning a "%s" instance is not allowed!', get_called_class())
        );
    }

}

// Endfile