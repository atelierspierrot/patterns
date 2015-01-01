<?php
/**
 * PHP patterns
 * Copyleft (ↄ) 2013-2015 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
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
 */

namespace Patterns\Interfaces;

use \Patterns\Interfaces\ArrayInterface;
use \Patterns\Interfaces\IteratorInterface;

/**
 * Collection interface
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
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

// Endfile