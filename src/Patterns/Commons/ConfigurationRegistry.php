<?php
/**
 * PHP/Apache/Markdown DocBook
 * @package 	DocBook
 * @license   	GPL-v3
 * @link      	https://github.com/atelierspierrot/docbook
 */

namespace Patterns\Commons;

/**
 */
class ConfigurationRegistry
{

    protected $registry = array();
    protected $default_scope;

    public function __construct($default_scope = null)
    {
        $this->default_scope = $default_scope;
    }

    /**
     * Set the value of a specific option with depth
     *
     * @param string $name The index of the configuration value to get, with a depth using notation `index:name`
     * @param misc $value The value to set for $name
     * @param string $scope The scope to use in the configuration registry, `default_scope` will be used by default
     * @return self Returns `$this` for method chaining
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
     * @param string $name The index of the configuration value to get, with a depth using notation `index:name`
     * @param misc $default The default value to return if so
     * @param string $scope The scope to use in the configuration registry, `default_scope` will be used by default
     * @return misc The value retrieved in the registry or the default value otherwise
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
     * @param array $options The array of values to set for the configuration
     * @param string $scope The scope to use in the configuration registry, `default_scope` will be used by default
     * @return self Returns `$this` for method chaining
     */
    public function setConfigs(array $options, $scope = null)
    {
        if (is_null($scope) && !is_null($this->default_scope)) {
            $scope = $this->default_scope;
        }

        if (!is_null($scope)) {
            $this->registry[$scope] = $options;
        } else {
            $this->registry = $options;
        }

        return $this;
    }

    /**
     * Set the value of a specific option
     *
     * @param string $name The index of the configuration value
     * @param misc $value The value to set for the configuration entry
     * @param string $scope The scope to use in the configuration registry, `default_scope` will be used by default
     * @return self Returns `$this` for method chaining
     */
    public function setConfig($name, $value, $scope = null)
    {
        if (is_null($scope) && !is_null($this->default_scope)) {
            $scope = $this->default_scope;
        }

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
     * Get the array of options
     */
    public function getConfigs($default = null, $scope = null)
    {
        if (is_null($scope) && !is_null($this->default_scope)) {
            $scope = $this->default_scope;
        }

        if (!is_null($scope)) {
            return isset($this->registry[$scope]) ? $this->registry[$scope] : $default;
        }
        return $this->registry;
    }

    /**
     * Get the value of a specific option
     */
    public function getConfig($name, $default = null, $scope = null)
    {
        if (is_null($scope) && !is_null($this->default_scope)) {
            $scope = $this->default_scope;
        }

        if (!is_null($scope)) {
            return isset($this->registry[$scope][$name]) ? $this->registry[$scope][$name] : $default;
        }

        return isset($this->registry[$name]) ? $this->registry[$name] : $default;
    }

}

// Endfile
