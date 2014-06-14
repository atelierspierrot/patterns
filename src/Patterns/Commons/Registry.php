<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Commons;

/**
 * A classic registry manager
 * 
 * This class handles a set of registries (array of `key=>value` pairs) distinguishing
 * current working registry from old ones or others. Old ones or others are stored in 
 * a stack of registries and can be loaded as the current one (replacing it).
 * 
 * @author 		Piero Wbmstr <me@e-piwi.fr>
 */
class Registry 
{

	/**
	 * @var array The registry itself : a complex array
	 */
	private $registry = array();

	/**
	 * @var array The registry stacks : a complex array
	 */
	protected $registry_stacks = array();

// ----------------------------
// Registry management
// ----------------------------

	/**
	 * Get current registry
	 * 
	 * @return array
	 */
	public function dump()
	{
		return $this->registry;
	}

	/**
	 * Set an entry in the instance registry (magic setter)
	 * 
	 * This method is "magic" and will be called by PHP when an object's property
	 * is defined like `$obj->prop = value` ; concerned property will be automatically
	 * added to the registry.
	 *
	 * @param string $var The variable name to set
	 * @param misc $val The variable value to set
	 * @return void
	 * @see self::setEntry()
	 */
	public function __set($var = null, $val = null)
	{
		self::setEntry($var,$val);
	}

	/**
	 * Get an entry from the instance registry (magic getter)
	 *
	 * This method is "magic" and will be called by PHP when an object's property
	 * is accessed like `$obj->prop` ; concerned property will be returned if it
	 * exists in the registry.
	 *
	 * @param string $var The variable name to get
	 * @return misc
	 * @see self::getEntry()
	 */
	public function __get($var = null)
	{
		return self::getEntry($var);
	}

	/**
	 * Set an entry in the instance registry
	 *
	 * @param string $var The variable name to set
	 * @param misc $val The variable value to set
	 * @param string $section A section name in the registry (default is FALSE)
	 * @return self Returns `$this` for method chaining
	 */
	public function setEntry($var = null, $val = null, $section = false)
	{
		if (empty($var)) return;
		if ($section)  {
			if (!isset($this->registry[$section])) {
				$this->registry[$section] = array();
			}
			$this->registry[$section][$var] = $val;
		} else {
		    $this->registry[$var] = $val;
		}
		return $this;
	}

	/**
	 * Add an entry in a section of the instance registry
	 *
	 * @param misc $val The variable value to set
	 * @param string $section A section name in the registry
	 * @return self Returns `$this` for method chaining
	 */
	public function addEntry($val = null, $section = false)
	{
		if (empty($section)) return;
		if (!isset($this->registry[$section])) {
			$this->registry[$section] = array();
		}
		$this->registry[$section][] = $val;
		return $this;
	}

	/**
	 * Get an entry from the instance registry
	 *
	 * @param string $var The variable name to get
	 * @param string $section A section name in the registry (default is FALSE)
	 * @param misc $default The default value to return if it is not in registry (default is NULL)
	 * @return misc The value found or $default
	 */
	public function getEntry($var = null, $section = false, $default = null)
	{
		if (empty($var)) return;
		if (!empty($section) && isset($this->registry[$section]) && isset($this->registry[$section][$var])) {
			return $this->registry[$section][$var];
		} elseif (isset($this->registry[$var])) {
			return $this->registry[$var];
		}
		return !is_null($default) ? $default : false;
	}

	/**
	 * Check if an entry exists in registry
	 *
	 * @param string $var The variable name to check
	 * @param string $section A section name in the registry (default is FALSE)
	 * @return bool
	 */
	public function isEntry($var = null, $section = false)
	{
		if (empty($var)) return;
		return (
			(!empty($section) && isset($this->registry[$section]) && isset($this->registry[$section][$var])) OR
			isset($this->registry[$var])
		);
	}

	/**
	 * Search a key in registry
	 *
	 * @param misc $val The variable value to find
	 * @param string $var The variable name to search in (in case of array)
	 * @param string $section A section name in the registry (default is FALSE)
	 * @return string|null The key found in the registry
	 */
	public function getKey($val = null, $var = null, $section = false)
	{
		if (empty($val)) return;
		if (!empty($var)) {
            foreach($this->registry as $_sct=>$_data) {
                if ($ok=array_search($val, $_data) && $ok==$var)
                    return $_sct;
            }
        } elseif (!empty($section) && isset($this->registry[$section])) {
			return array_search($val, $this->registry[$section]);
		} else {
			return array_search($val, $this->registry);
		}
	}

// ----------------------------
// Stacks management
// ----------------------------

	/**
	 * Get a full stack from registry stacks
	 *
	 * @param string $index The stack index
	 * @param misc $default The default value to return if it is not in registry (default is NULL)
	 * @return misc The requested stack entry if so
	 */
	public function dumpStack($index = null, $default = null)
	{
		if (array_key_exists($index, $this->registry_stacks)) {
			return $this->registry_stacks[$index];
		}
		return $default;
	}

	/**
	 * Save a stack of entries in registry
	 *
	 * @param string $index The stack index
	 * @param bool $and_clean Clean the actual registry after recorded the stack (default is FALSE)
	 * @return self Returns `$this` for method chaining
	 */
	public function saveStack($index = null, $and_clean = false)
	{
		$this->registry_stacks[$index] = $this->registry;
		if ($and_clean===true) $this->registry=array();
		return $this;
	}

	/**
	 * Check if a stack exists in registry
	 *
	 * @param string $index The stack index
	 * @return bool
	 */
	public function isStack($index = null)
	{
		return (array_key_exists($index, $this->registry_stacks));
	}

	/**
	 * Load a stack in registry (actual registry is overwrites)
	 *
	 * @param string $index The stack index
	 * @return self Returns `$this` for method chaining
	 */
	public function loadStack($index = null)
	{
		$this->registry = $this->dumpStack($index);
		return $this;
	}

	/**
	 * Get a stack entry of the registry stacks
	 *
	 * @param string $var The variable name to search
	 * @param string $section A section name in the registry (default is FALSE)
	 * @param string $stack The stack name to search in
	 * @param misc $default The default value to return if it is not in registry (default is NULL)
	 * @return misc The value found or $default
	 */
	public function getStackEntry($var = null, $section = false, $stack = null, $default = null)
	{
		if (empty($var)) return;
		if (!empty($stack) && $this->isStack($stack)) {
			$tmp_stack = $this->registry;
			$this->loadStack($stack);
			$val = $this->getEntry($var, $section, $default);
			$this->registry = $tmp_stack;
			return $val;
		}
		return $this->getEntry($var, $section, $default);
	}

	/**
	 * Get the key of a stack entry of the registry stacks
	 *
	 * @param string $val The variable value to search
	 * @param string $section A section name in the registry (default is FALSE)
	 * @param string $stack The stack name to search in
	 * @param misc $default The default value to return if it is not in registry (default is NULL)
	 * @return misc The key found or $default
	 */
	public function getStackKey($val = null, $section = false, $stack = null, $default = null)
	{
		if (empty($val)) return;
		if (!empty($stack) && $this->isStack($stack)) {
			$tmp_stack = $this->registry;
			$this->loadStack($stack);
			$var = $this->getKey($val, $section, $default);
			$this->registry = $tmp_stack;
			return $var;
		}
		return $this->getKey($val, $section, $default);
	}

}

// Endfile
