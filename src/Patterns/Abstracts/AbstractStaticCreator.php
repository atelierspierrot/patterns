<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use Patterns\Interfaces\StaticCreatorInterface;

/**
 * @author      Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractStaticCreator implements StaticCreatorInterface
{

    /**
     * Force any descendant to implement a constructor as it will be called by the `create()`  static method
     */
    abstract public function __construct();
    
    /**
     * @return self Must return a new instance of the object created with function arguments
     */
    public static function create()
    {
        $_cls = get_called_class();
        $_obj = call_user_func_array(array($_cls, '__construct'), func_get_args());
        return $_obj;
    }
    
}

// Endfile
