<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

use \ArrayAccess;

/**
 * Array interface
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface ArrayInterface
    extends ArrayAccess
{

    /**
     * Deletes a value at the beginning of the collection
     */
    public function shift();

    /**
     * Deletes a value at the end of the collection
     */
    public function pop();

    /**
     * Pushes a new value at the beginning of the collection, with no specific index
     * @param mixed $value The new value to add in the collection
     */
    public function unshift( $value );

    /**
     * Pushes a new value at the end of the collection, with no specific index
     * @param mixed $value The new value to add in the collection
     */
    public function push( $value );

    /**
     * Counts the number of entries in the collection
     * @return  int
     */
    public function count();

    /**
     * Returns the current key=>value pair and put increase the index
     */
    public function each();

    /**
     * Search a value in the current array and returns true if so
     * @param   mixed $value The value to test
     * @return  bool
     */
    public function in_array( $value );

    /**
     * Search if an entry exists with this key
     * @param   mixed $index The index to test
     * @return  bool
     */
    public function key_exists( $index );

    /**
     * Returns an array with all values of the original array
     * @return  array
     */
    public function values();

    /**
     * Returns an array with all keys of the original array
     * @return  array
     */
    public function keys();

}

// Endfile