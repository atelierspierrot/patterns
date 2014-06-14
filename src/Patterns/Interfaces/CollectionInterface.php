<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

use \Patterns\Interfaces\ArrayInterface;
use \Patterns\Interfaces\IteratorInterface;

/**
 * Collection interface
 *
 * @author 		Piero Wbmstr <me@e-piwi.fr>
 */
interface CollectionInterface
    extends IteratorInterface, ArrayInterface
{

	/**
	 * Set the collection content
	 *
	 * @param array $content The array of the collection content
	 */
    public function setCollection(array $collection);

	/**
	 * Get the collection content
	 */
    public function getCollection();

	/**
	 * Gets a collection entry value by its index
	 *
	 * @param int|string $index The index of the entry to get
	 * @param misc $default The default value returned if the original entry is not seted (default is NULL)
	 */
    public function getEntry($index, $default = null);

	/**
	 * Sets a collection entry value by its index
	 *
	 * If the index is null, the value will be pushed at the end of the collection.
	 *
	 * @param int|string|null $index The index of the entry to set
	 * @param misc $value The value to set
	 */
    public function setEntry($index = null, $value);

	/**
	 * Check if a collection entry exists by its index
	 *
	 * @param int|string $index The index of the entry to check
	 */
    public function issetEntry($index);

	/**
	 * Deletes a collection entry by its index
	 *
	 * @param int|string $index The index of the entry to delete
	 */
    public function unsetEntry($index);

}

// Endfile