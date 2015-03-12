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

use \ReflectionClass;
use \Exception;

/**
 * Basic singleton object definition
 *
 * Usage
 *
 *      $instance = class::getInstance( $args )
 *
 * This trait defines an abstract `__construct` method forcing
 * your implementations to define the hard constructor yourself
 * choosing its visibility. The best practice is to make your
 * constructor protected or private.
 *
 * If your constructor is not public and the `getInstance` received
 * arguments, it will call a `init( $args )` method (if it is public)
 * fetching it received arguments. This allows to build an instance
 * with parameters.
 *
 * @author  piwi <me@e-piwi.fr>
 */
trait SingletonTrait
{

    /**
     * @var null|self
     */
    private static $_instance = null;

    /**
     * Constructor : classic object constructor
     *
     * The best practice is to define a `private` constructor to avoid object direct
     * creation ; if the constructor is public, it will receive the arguments passed
     * to the `getInstance` method.
     */
    abstract function __construct();

    /**
     * Over-write this method to emulate a public constructor as it will be called
     * by the static construction fetching its arguments.
     *
     * @param   $args
     * @return  void
     */
//    abstract public function init( $args );

    /**
     * This is the static constructor/getter of the singleton instance
     *
     * If the instance does not exist yet, it will create it fetching
     * received arguments to the constructor if it is public, or to
     * an `init()` method if it exists and is callable.
     *
     * If this method receives arguments but can not fetch them to
     * the constructor or an `init` method, a E_USER_WARNING is triggered
     * to inform user about the arguments loss.
     *
     * @return self
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            $_class     = get_called_class();
            $reflection = new ReflectionClass($_class);
            if ($reflection->isInstantiable()) {
                self::$_instance = $reflection->newInstanceArgs(func_get_args());
            } else {
                self::$_instance = new $_class();
                if (func_num_args()>0) {
                    if ($reflection->hasMethod('init') && $reflection->getMethod('init')->isPublic()) {
                        call_user_func_array(array(self::$_instance, 'init'), func_get_args());
                    } else {
                        trigger_error(
                            sprintf('The singleton type "%s" has no public constructor or "init()" method, the arguments will not be passed to the instance!', $_class),
                            E_USER_WARNING
                        );
                    }
                }
            }
        }
        return self::$_instance;
    }

    /**
     * This must throw an error as cloning a singleton is forbidden
     *
     * @return void
     * @throws \Exception
     */
    public function __clone()
    {
        throw new Exception(
            sprintf('Cloning a "%s" instance is not allowed!', get_called_class())
        );
    }

}

// Endfile
