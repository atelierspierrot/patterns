<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use \Patterns\Interfaces\StaticCreatorInterface;

/**
 * This class allows to create objects that can be statically created "on-the-fly" to allow
 * method chaining constructing them like:
 *
 *     $obj = ObjectStaticCreator::create( arguments )
 *         ->method();
 *
 * This logic is implemented thru a required `init()` method in children class that will be called
 * on static creation (in non-static env) and by constructor.
 *
 * @author      Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractStaticCreator implements StaticCreatorInterface
{

    /**
     * Force any descendant to implement a special constructor `init()` as it will be called by the `create()`  static method
     */
    abstract public function init();
    
    /**
     * Magic default constructor for non-static use
     *
     * This may use the same arguments as the `init()` method.
     */
    public function __construct()
    {
        call_user_func_array(array($this, 'init'), func_get_args());
    }
    
    /**
     * Static creation of the object
     *
     * This may use the same arguments as the `init()` method.
     *
     * @return self Must return a new instance of the object created with function arguments
     */
    public static function create()
    {
        $_cls = get_called_class();
        $_obj = new $_cls;
        call_user_func_array(array($_obj, 'init'), func_get_args());
        return $_obj;
    }
    
}

// Endfile
