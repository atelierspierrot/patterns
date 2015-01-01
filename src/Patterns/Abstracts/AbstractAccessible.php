<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyleft (ↄ) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/patterns>.
 */

namespace Patterns\Abstracts;

use \RuntimeException;

/**
 * Magic properties accessors
 * 
 * This abstract class defines commons magic methods to directly access (set, unset, check or get)
 * object properties. For more information about these PHP magic methods, please see in the PHP
 * manual :
 * <http://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members>.
 * 
 * The four magic methods are:
 * 
 * -   `__set`, called when you write `$obj->property = value`
 * -   `__get`, called when you write `$obj->property`
 * -   `__isset`, called when you write `isset($obj->property)` or `empty($obj->property)`
 * -   `__unset`, called when you write `unset($obj->property)`
 * 
 * For each of these methods, the property invoked MUST exist in the object, which means it must
 * be declared in its definition or already set before the magic method call. If the property can't
 * be found, a `RuntimeException` will be thrown.
 * 
 * The class will first try to execute a method called like the accessor for the property (i.e.
 * method `getProperty` for the `__get` call of the variable `property`). This way, you can define
 * a method for accessing one of an object properties with a specific work on it, or let the class
 * use the default accessor feature.
 * 
 * NOTE - This class is abstract but doesn't declare any abstract method which should be described
 * in the child class ; you can use it easily by extending it.
 *  
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractAccessible
{

    /**
     * Set an object property, accessing it by "setVariable" if the method exists
     *
     * @param   string  $var    The property object to set
     * @param   string  $val    The property value to set
     * @return  self
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __set($var, $val)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = 'set'.ucfirst($var);
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            $this->$accessor($val);
        } else {
            $this->$var = $val;
        }
        return $this;
    }

    /**
     * Get an object property, accessing it by "getVariable" if the method exists
     *
     * @param   string  $var    The property object to get
     * @return  mixed   Returns the result of the "getVariable" method, of the property otherwise
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __get($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = 'get'.ucfirst($var);
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor();
        } else {
            return $this->$var;
        }
    }

    /**
     * Test if an object property has been set, using the "issetVariable" method if defined
     *
     * @param   string  $var    The property object to test
     * @return  bool    True if the property is already set
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __isset($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = 'isset'.ucfirst($var);
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return $this->$accessor();
        } else {
            return isset($this->$var);
        }
    }

    /**
     * Test if an object property has been set, using the "unsetVariable" method if defined
     *
     * @param   string  $var    The property object to unset
     * @return  self
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __unset($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = 'unset'.ucfirst($var);
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            $this->$accessor();
        } else {
            unset($this->$var);
        }
        return $this;
    }

}

// Endfile
