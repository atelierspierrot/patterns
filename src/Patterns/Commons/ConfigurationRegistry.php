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

namespace Patterns\Commons;

/**
 * A manager for a configuration registry as an array with a depth of 2
 * 
 * This class handles a simple and classic registry of values (stored in an array
 * as `key=>value` pairs) except that it accepts and manages the first depth keys
 * of the array like a `scope` and permits to access values within scopes directly.
 * 
 * The rule here is that when you used to call `$obj->get(property)` you can now call
 * `$obj->get(scope:property)` ; this is very useful for configuration entries, that
 * are often stored in complex arrays identified by a simple key.
 * 
 * @author    Piero Wbmstr <me@e-piwi.fr>
 */
class ConfigurationRegistry
{

    /**
     * @var array
     */
    protected $registry;

    /**
     * Construction : initialization of the registry on an empty array
     */
    public function __construct()
    {
        $this->registry = array();
    }

    /**
     * Set the value of a specific option with depth
     *
     * @param   string  $name   The index of the configuration value to get, with a scope using notation `index:name`
     * @param   mixed   $value  The value to set for $name
     * @param   string  $scope  The scope to use in the configuration registry if it is not defined in the `$name` parameter
     * @return  self
     */
    public function set($name, $value, $scope = null)
    {
        if (strpos($name, ':')) {
            list($entry, $name) = explode(':', $name);
            $cfg = $this->getConfig($entry, array(), $scope);
            $cfg[$name] = $value;
            return $this->setConfig($entry, $cfg, $scope);
        } else {
            return $this->setConfig($name, $value, $scope);
        }        
    }

    /**
     * Get the value of a specific option with depth
     *
     * @param   string  $name       The index of the configuration value to get, with a scope using notation `index:name`
     * @param   mixed   $default    The default value to return if so (`null` by default)
     * @param   string  $scope      The scope to use in the configuration registry if it is not defined in the `$name` parameter
     * @return  mixed   The value retrieved in the registry or the default value otherwise
     */
    public function get($name, $default = null, $scope = null)
    {
        if (strpos($name, ':')) {
            list($entry, $name) = explode(':', $name);
            $cfg = $this->getConfig($entry, array(), $scope);
            return isset($cfg[$name]) ? $cfg[$name] : $default;
        } else {
            return $this->getConfig($name, $default, $scope);
        }        
    }

    /**
     * Set an array of options
     *
     * @param   array   $options    The array of values to set for the configuration entry
     * @param   string  $scope      The scope to use in the configuration registry (optional)
     * @return  self
     */
    public function setConfigs(array $options, $scope = null)
    {
        if (!is_null($scope)) {
            $this->registry[$scope] = $options;
        } else {
            $this->registry = $options;
        }

        return $this;
    }

    /**
     * Set the value of a specific option (no scope notation allowed here)
     *
     * @param   string  $name   The index of the configuration value
     * @param   mixed   $value  The value to set for the configuration entry
     * @param   string  $scope  The scope to use in the configuration registry (optional)
     * @return  self
     */
    public function setConfig($name, $value, $scope = null)
    {
        if (!is_null($scope)) {
            if (!isset($this->registry[$scope])) {
                $this->registry[$scope] = array();
            }
            $this->registry[$scope][$name] = $value;
        } else {
            $this->registry[$name] = $value;
        }

        return $this;
    }

    /**
     * Alias of the `setConfig` method
     *
     * @see self::setConfig()
     */    
    public function addConfig($name, $value, $scope = null)
    {
        return $this->setConfig($name, $value, $scope);
    }

    /**
     * Get the array of options (from a specific scope if so)
     * 
     * @param   mixed   $default    The default value to return if so (`null` by default)
     * @param   string  $scope      The scope to use in the configuration registry (optional)
     * @return  array|mixed|null
     */
    public function getConfigs($default = null, $scope = null)
    {
        if (!is_null($scope)) {
            return isset($this->registry[$scope]) ? $this->registry[$scope] : $default;
        }
        return $this->registry;
    }

    /**
     * Get the value of a specific option (no scope notation allowed here)
     *
     * @param   string  $name       The index of the configuration value to get
     * @param   mixed   $default    The default value to return if so (`null` by default)
     * @param   string  $scope      The scope to use in the configuration registry (optional)
     * @return  mixed
     */
    public function getConfig($name, $default = null, $scope = null)
    {
        if (!is_null($scope)) {
            return isset($this->registry[$scope][$name]) ? $this->registry[$scope][$name] : $default;
        }
        return isset($this->registry[$name]) ? $this->registry[$name] : $default;
    }

}

// Endfile
