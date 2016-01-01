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

namespace Patterns\Interfaces;

use \Patterns\Interfaces\ArrayInterface;
use \Patterns\Interfaces\IteratorInterface;

/**
 * Collection interface
 *
 * @author  piwi <me@e-piwi.fr>
 */
interface CollectionInterface
    extends IteratorInterface, ArrayInterface
{

    /**
     * Set the collection content
     *
     * @param   array   $collection     The array of the collection content
     */
    public function setCollection(array $collection);

    /**
     * Get the collection content
     */
    public function getCollection();

    /**
     * Gets a collection entry value by its index
     *
     * @param   int|string  $index      The index of the entry to get
     * @param   mixed       $default    The default value returned if the original entry is not set (default is NULL)
     */
    public function getEntry($index, $default = null);

    /**
     * Sets a collection entry value by its index
     *
     * If the index is null, the value will be pushed at the end of the collection.
     *
     * @param   int|string|null $index  The index of the entry to set
     * @param   mixed           $value  The value to set
     */
    public function setEntry($index = null, $value);

    /**
     * Check if a collection entry exists by its index
     *
     * @param   int|string  $index  The index of the entry to check
     */
    public function issetEntry($index);

    /**
     * Deletes a collection entry by its index
     *
     * @param   int|string  $index  The index of the entry to delete
     */
    public function unsetEntry($index);
}
