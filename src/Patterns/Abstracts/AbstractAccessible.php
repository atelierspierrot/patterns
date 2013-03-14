<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use \RuntimeException;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractAccessible
{
	
	/**
	 * Set an object property, accessing it by "setVariable" if the method exists
	 *
	 * @param string $var The property object to set
	 * @param string $val The property value to set
	 * @return self Return the object for method chaining
	 */
	public function __set($var, $val)
	{
		if (!property_exists($this, $var)) {
			throw new RuntimeException(
				sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
			);
		}
		$accessor = 'set'.ucfirst($var);
		if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
			$this->$accessor($val);
		} else {
			$this->$var = $val;
		}
		return $this;
	}

	/**
	 * Get an object property, accessing it by "getVariable" if the method exists
	 *
	 * @param string $var The property object to get
	 * @return misc Returns the result of the "getVariable" method, of the property otherwise
	 */
	public function __get($var)
	{
		if (!property_exists($this, $var)) {
			throw new RuntimeException(
				sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
			);
		}
		$accessor = 'get'.ucfirst($var);
		if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
			return $this->$accessor();
		} else {
			return $this->$var;
		}
	}

	/**
	 * Test if an object property has been set, using the "issetVariable" method if defined
	 *
	 * @param string $var The property object to test
	 * @return bool True if the property is already setted
	 */
	public function __isset($var)
	{
		if (!property_exists($this, $var)) {
			throw new RuntimeException(
				sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
			);
		}
		$accessor = 'isset'.ucfirst($var);
		if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
			return $this->$accessor();
		} else {
			return isset($this->$var);
		}
	}

	/**
	 * Test if an object property has been set, using the "unsetVariable" method if defined
	 *
	 * @param string $var The property object to unset
	 * @return self Return the object for method chaining
	 */
	public function __unset($var)
	{
		if (!property_exists($this, $var)) {
			throw new RuntimeException(
				sprintf('Property "%s" doesn\'t exist in object "%s"!', $var, get_class($this))
			);
		}
		$accessor = 'unset'.ucfirst($var);
		if (method_exists($this, $accessor) && is_callable(array($this, $accessor))) {
			$this->$accessor();
		} else {
			unset($this->$var);
		}
		return $this;
	}

}

// Endfile