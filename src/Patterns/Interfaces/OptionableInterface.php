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

namespace Patterns\Interfaces;

/**
 * A simple interface to manage a set of options
 *
 * @author  piwi <me@e-piwi.fr>
 */
interface OptionableInterface
{

    /**
     * Set an array of options
     * @param   array   $options
     */
    public function setOptions(array $options);

    /**
     * Set the value of a specific option
     * @param   string  $name
     * @param   mixed   $value
     */
    public function setOption($name, $value);

    /**
     * Get the array of options
     * @return  array
     */
    public function getOptions();

    /**
     * Get the value of a specific option
     * @param   string  $name
     * @param   mixed   $default
     * @return  mixed
     */
    public function getOption($name, $default = null);
}
