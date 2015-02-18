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
