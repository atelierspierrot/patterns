<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use \RuntimeException;

/**
 * Magic properties accessors
 * 
 * This abstract class defines commons magic methods to directly access (set, unset, check or get)
 * object properties. For more information about these PHP magic methods, please see in the PHP
 * manual :
 * <http://www.php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.members>.
 * 
 * The four magic methods are:
 * 
 * -   `__set`, called when you write `$obj->property = value`
 * -   `__get`, called when you write `$obj->property`
 * -   `__isset`, called when you write `isset($obj->property)` or `empty($obj->property)`
 * -   `__unset`, called when you write `unset($obj->property)`
 * 
 * For each of these methods, the property invoked MUST exist in the object, which means it must
 * be declared in its definition or already set before the magic method call. If the property can't
 * be found, a `RuntimeException` will be thrown.
 * 
 * The class will first try to execute a method called like the accessor for the property (i.e.
 * method `getProperty` for the `__get` call of the variable `property`). This way, you can define
 * a method for accessing one of an object properties with a specific work on it, or let the class
 * use the default accessor feature.
 * 
 * NOTE - This class is abstract but doesn't declare any abstract method which should be described
 * in the child class ; you can use it easily by extending it.
 *  
 * @author 		Piero Wbmstr <me@e-piwi.fr>
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
