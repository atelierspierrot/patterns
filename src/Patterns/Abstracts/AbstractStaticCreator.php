<?php
/**
 * PHP patterns
 * Copyleft (ↄ) 2013-2015 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
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
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractStaticCreator
    implements StaticCreatorInterface
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
