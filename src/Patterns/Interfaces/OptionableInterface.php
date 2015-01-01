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

namespace Patterns\Interfaces;

/**
 * A simple interface to manage a set of options
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
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

// Endfile