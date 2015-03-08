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

use \Patterns\Interfaces\OptionableInterface;

/**
 * A simple object options manager
 * 
 * This class is a helper to create an object that may handle a set of options.
 * The options can be defined globally or individually, overwritten during the
 * object life-cycle and accessed easily. The `get` accessor allows to define
 * a default value returned if no other value is found.
 *
 * This class as an exact copy as a trait at `\Patterns\Traits\Optionable`.
 * It MUST be updated with it each time.
 *
 * @see     \Patterns\Traits\Optionable
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractOptionable
    implements OptionableInterface
{

    /**
     * @var array
     */
    protected $_options = array();

    /**
     * Set an array of options
     *
     * @param   array   $options    A table of options to define, key=>value pairs
     * @return  self
     */
    public function setOptions(array $options)
    {
        $this->_options = $options;
        return $this;
    }

    /**
     * Set the value of a specific option
     *
     * @param   string  $name   The index of the option to define
     * @param   mixed   $value  The option value to define
     * @return  self
     */
    public function setOption($name, $value)
    {
        $this->_options[$name] = $value;
        return $this;
    }

    /**
     * Get the array of options
     *
     * @return  array   The current options array
     */
    public function getOptions()
    {
        return $this->_options;
    }

    /**
     * Get the value of a specific option
     *
     * @param   string  $name       The index of the option to get
     * @param   mixed   $default    The default value to return if the option is not defined
     * @return  mixed   The current option's value if defined, `$default` otherwise
     */
    public function getOption($name, $default = null)
    {
        return isset($this->_options[$name]) ? $this->_options[$name] : $default;
    }

}

// Endfile
