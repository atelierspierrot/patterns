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

namespace Patterns\Commons;

use \Patterns\Interfaces\CollectionInterface;

/**
 * Collection manager : allows to set, get, loop and seek in an array collection
 *
 * @author  piwi <me@e-piwi.fr>
 */
class Collection
    implements CollectionInterface
{

    /**
     * The array of the collection content as user defines it
     */
    private $_collection;

    /**
     * The current index in the collection walking
     */
    private $_index = 0;

    /**
     * Construction of a collection
     *
     * @param   array   $content    The array of the collection content (optional)
     */
    public function __construct(array $content = array())
    {
        $this->setCollection( $content );
    }

    /**
     * Set the collection content
     *
     * @param   array   $content    The array of the collection content
     * @return  self
     */
    public function setCollection(array $content)
    {
        $this->_collection = $content;
        return $this;
    }

    /**
     * Get the collection content
     *
     * @return  array   The whole collection content at this moment
     */
    public function getCollection()
    {
        return $this->_collection;
    }

// ------------------------
// \Patterns\Interfaces\Iterator interface : used in "foreach" loops over collection entries
// ------------------------

    /**
     * Put the index value at the beginning of the collection array
     *
     * @return void
     */
    final public function rewind()
    {
        reset($this->_collection);
        $this->_index = key($this->_collection);
    }

    /**
     * Alias of self::rewind()
     *
     * @return void
     */
    final public function reset()
    {
        $this->rewind();
    }

    /**
     * Put the index value at the last index
     *
     * @return void
     */
    final public function end()
    {
        end($this->_collection);
        $this->_index = key($this->_collection);
    }

    /**
     * Increase the current index
     *
     * @return void
     */
    final public function next()
    {
        next($this->_collection);
        $this->_index = key($this->_collection);
    }

    /**
     * Decrease the current index
     *
     * @return void
     */
    final public function prev()
    {
        prev($this->_collection);
        $this->_index = key($this->_collection);
    }

    /**
     * Check if current value is set
     *
     * @return bool True if a collection value is set for the current index
     */
    final public function valid()
    {
        return $this->issetEntry($this->_index);
    }

    /**
     * Gets the value of the collection at current index
     *
     * @return mixed Current value in the collection
     */
    final public function current()
    {
        return $this->getEntry($this->_index);
    }

    /**
     * Alias of self::current()
     *
     * @return mixed The current value
     */
    final public function pos()
    {
        return $this->current();
    }

    /**
     * Gets the current index
     *
     * @return int The current index
     */
    final public function key()
    {
        return $this->_index;
    }

    /**
     * Define the current index
     *
     * @param   int|string  $index
     * @return  self
     */
    final public function seek($index)
    {
        if ($this->offsetExists($index)) {
            $this->_index = $index;
        }
        return $this;
    }

// ------------------------
// ArrayAccess interface : to use the collection object as an array
// ------------------------

    /**
     * Set a collection entry
     *
     * @see self::setEntry()
     */
    final public function offsetSet($offset, $value)
    {
        return $this->setEntry($offset, $value);
    }

    /**
     * Check if a collection entry exists
     *
     * @see self::issetEntry()
     */
    final public function offsetExists($offset)
    {
        return $this->issetEntry($offset);
    }

    /**
     * Unset a collection entry
     *
     * @see self::unsetEntry()
     */
    final public function offsetUnset($offset)
    {
        return $this->unsetEntry($offset);
    }

    /**
     * Get a collection entry
     *
     * @see self::getEntry()
     */
    final public function offsetGet($offset)
    {
        return $this->getEntry($offset);
    }

// ------------------------
// \Patterns\Interfaces\Array interface : actions on the collection as an array
// ------------------------

    /**
     * Pushes a new value at the end of the collection, with no specific index
     *
     * @param   mixed   $value  The new value to add in the collection
     * @return  self
     */
    public function push($value)
    {
        $this->_collection[] = $value;
        return $this;
    }

    /**
     * Counts the number of entries in the collection
     *
     * @return int The number of collection entries
     */
    public function count()
    {
        return count($this->_collection);
    }

    /**
     * Deletes a value at the beginning of the collection
     *
     * @return self
     */
    public function shift()
    {
        array_shift($this->_collection);
        return $this;
    }

    /**
     * Deletes a value at the end of the collection
     *
     * @return self
     */
    public function pop()
    {
        array_pop($this->_collection);
        return $this;
    }

    /**
     * Pushes a new value at the beginning of the collection, with no specific index
     *
     * @param   mixed   $value  The new value to add in the collection
     * @return  self
     */
    public function unshift($value)
    {
        array_unshift($this->_collection, $value);
        return $this;
    }

    /**
     * Returns the current key=>value pair and put increase the index
     *
     * @return array The result of the "each()" PHP standard method on collection
     */
    public function each()
    {
        $each = each($this->_collection);
        $this->next();
        return $each;
    }

    /**
     * Search a value in the current array and returns true if so
     *
     * @param   mixed   $value  The value to test
     * @return  bool    The result of the test
     */
    public function in_array($value)
    {
        return in_array($value, $this->_collection);
    }

    /**
     * Search if an entry exists with this key
     *
     * @param   mixed   $index  The index to test
     * @return  bool    The result of the test
     */
    public function key_exists($index)
    {
        return array_key_exists($index, $this->_collection);
    }

    /**
     * Returns an array with all values of the original array
     *
     * @return array An array of the collection values
     */
    public function values()
    {
        return array_values($this->_collection);
    }

    /**
     * Returns an array with all keys of the original array
     *
     * @return array An array of the collection keys
     */
    public function keys()
    {
        return array_keys($this->_collection);
    }

// ------------------------
// \Patterns\Interfaces\Collection interface
// ------------------------

    /**
     * Gets a collection entry value by its index
     *
     * @param   int|string  $index      The index of the entry to get
     * @param   mixed       $default    The default value returned if the original entry is not set (default is NULL)
     * @return  mixed       The found value for the searched index, $default if nothing has been found
     */
    public function getEntry($index, $default = null)
    {
        return isset($this->_collection[$index]) ? $this->_collection[$index] : $default;
    }

    /**
     * Sets a collection entry value by its index
     *
     * If the index is null, the value will be pushed at the end of the collection.
     *
     * @param   int|string|null $index  The index of the entry to set
     * @param   mixed           $value  The value to set
     * @return  self
     * @see     self::push()
     */
    public function setEntry($index = null, $value)
    {
        if (is_null($index)) {
            return $this->push( $value );
        }
        $this->_collection[$index] = $value;
        return $this;
    }

    /**
     * Add a collection entry value (alias of "setEntry()")
     *
     * @see self::setEntry()
     */
    public function addEntry($index = null, $value)
    {
        return $this->setEntry($index, $value);
    }

    /**
     * Check if a collection entry exists by its index
     *
     * @param   int|string  $index  The index of the entry to check
     * @return  bool
     */
    public function issetEntry($index)
    {
        return isset( $this->_collection[$index] );
    }

    /**
     * Deletes a collection entry by its index
     *
     * @param   int|string  $index  The index of the entry to delete
     * @return  self
     */
    public function unsetEntry($index)
    {
        unset( $this->_collection[$index] );
        return $this;
    }

}

// Endfile