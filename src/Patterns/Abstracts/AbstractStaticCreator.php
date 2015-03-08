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

namespace Patterns\Abstracts;

use \Patterns\Interfaces\StaticCreatorInterface;

/**
 * This class allows to create objects that can be statically created "on-the-fly" to allow
 * method chaining constructing them like:
 *
 *     $obj = ObjectStaticCreator::create( arguments )
 *         ->method();
 *
 * This logic is implemented through a required `init()` method in children class that will be called
 * on static creation (in non-static environment) and by constructor.
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractStaticCreator
    implements StaticCreatorInterface
{

    /**
     * Force any descendant to implement a special constructor `init()` as it will be called by the `create()` static method
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
