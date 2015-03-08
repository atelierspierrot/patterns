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