<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2016 Pierre Cassat <me@e-piwi.fr> and contributors
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at
 * <http://github.com/atelierspierrot/patterns>.
 */

namespace Patterns\Abstracts;

use \RuntimeException;
use \Patterns\Interfaces\AccessibleInterface;

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
 * NOTE - This class is abstract but does not declare any abstract method which should be described
 * in the child class ; you can use it easily by extending it.
 *
 * @TODO    review this to erase duplication (and variations) with \Patterns\Traits\AccessibleTrait
 * @author  piwi <me@e-piwi.fr>
 */
abstract class AbstractAccessible
    implements AccessibleInterface
{

    /**
     * Validate and format an accessible property name
     *
     * @param   string  $var    Concerned object's property
     * @return  mixed
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    protected function validateAccessibleProperty($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" does not exist in object "%s"!', $var, get_class($this))
            );
        }
        return $var;
    }

    /**
     * Constructs the name of the method to access a property
     *
     * @param   string  $var        Concerned object's property
     * @param   string  $prefix     Concerned access type in 'get', 'set', 'unset', 'isset'
     * @return  string
     */
    protected function getAccessorName($var, $prefix)
    {
        return $prefix . ucfirst($var);
    }

    /**
     * Set an object property, accessing it by "setVariable" if the method exists
     *
     * Called when you write `$obj->property = value`
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
                sprintf('Property "%s" does not exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = $this->getAccessorName($var, 'set');
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            call_user_func(array($this, $accessor), $val);
        } else {
            $this->{$var} = $val;
        }
        return $this;
    }

    /**
     * Get an object property, accessing it by "getVariable" if the method exists
     *
     * Called when you write `$obj->property`
     *
     * @param   string  $var    The property object to get
     * @return  mixed   Returns the result of the "getVariable" method, of the property otherwise
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __get($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" does not exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = $this->getAccessorName($var, 'get');
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return call_user_func(array($this, $accessor));
        } else {
            return $this->{$var};
        }
    }

    /**
     * Test if an object property has been set, using the "issetVariable" method if defined
     *
     * Called when you write `isset($obj->property)` or `empty($obj->property)`
     *
     * @param   string  $var    The property object to test
     * @return  bool    True if the property is already set
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __isset($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" does not exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = $this->getAccessorName($var, 'isset');
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            return call_user_func(array($this, $accessor));
        } else {
            return isset($this->{$var});
        }
    }

    /**
     * Test if an object property has been set, using the "unsetVariable" method if defined
     *
     * Called when you write `unset($obj->property)`
     *
     * @param   string  $var    The property object to unset
     * @return  self
     * @throws  \RuntimeException if the property doesn't exist in the object
     */
    public function __unset($var)
    {
        if (!property_exists($this, $var)) {
            throw new RuntimeException(
                sprintf('Property "%s" does not exist in object "%s"!', $var, get_class($this))
            );
        }
        $accessor = $this->getAccessorName($var, 'unset');
        if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
            call_user_func(array($this, $accessor));
        } else {
            unset($this->{$var});
        }
        return $this;
    }
}
