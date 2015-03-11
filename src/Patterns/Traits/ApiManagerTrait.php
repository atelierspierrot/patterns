<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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

namespace Patterns\Traits;

/**
 * Use this trait to define an "API manager" which will test objects compliance
 *
 * Quick usage:
 *
 *      $obj->setApi(array(
 *          'name1' => '\MustExtend\ThisClass',
 *          'name2' => '\MustImplement\ThisInterface',
 *      ));
 *
 *      // test object validity:
 *      if ($obj->hasApi('name1')) {
 *          $obj->isApiValid('name1', $my_api_object);
 *      }
 *
 *      // get object condition:
 *      $obj->getApi('name2');
 *
 */
trait ApiManagerTrait
{

    private static $__api;

    /**
     * Define the object's API conditions
     *
     * @param   array   $api
     * @throws  \ErrorException if an API entry is not a valid class or interface name
     * @throws  \ErrorException if an API entry has not a string key
     */
    public static function setApi(array $api)
    {
        foreach ($api as $name=>$class) {
            if (is_string($name)) {
                if (
                    !empty($class) &&
                    (class_exists($class) || interface_exists($class))
                ) {
                    self::$__api[$name] = $class;
                } else {
                    throw new \ErrorException(
                        sprintf('An API entry must be a valid class or interface (got "%s" for index "%s")!',
                            $class, $name)
                    );
                }
            } else {
                throw new \ErrorException(
                    sprintf('An API index must be a string (got "%s")!', $name)
                );
            }
        }
    }

    /**
     * Tests if an API entry exists
     *
     * @param   string  $name
     * @return  bool
     */
    public static function hasApi($name)
    {
        return (bool) array_key_exists($name, self::$__api);
    }

    /**
     * Returns an API entry
     *
     * @param   string  $name
     * @return  null|string
     */
    public static function getApi($name)
    {
        return (self::hasApi($name) ? self::$__api[$name] : null);
    }

    /**
     * Tests if an object passes its API condition
     *
     * @param   string          $name
     * @param   object|callable $object
     * @return  bool
     */
    public static function isApiValid($name, $object)
    {
        if (self::hasApi($name) && is_object($object)) {
            $api = self::getApi($name);
            foreach (array($api, trim($api, '\\')) as $cl) {
                if ((
                    class_exists($cl) &&
                    (($object instanceof $cl) || in_array($cl, class_parents($object)))
                ) || (
                    interface_exists($cl) &&
                    in_array($api, class_implements(get_class($object)))
                )) {
                    return true;
                }
            }
        }
        return false;
    }

}

// Endfile