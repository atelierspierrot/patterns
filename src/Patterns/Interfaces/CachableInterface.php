<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyleft (ↄ) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/patterns>.
 */
namespace Patterns\Interfaces;

/**
 * Manage a cachable item object
 *
 * This interface is designed to handle a single item at once but it can be used with any
 * iterable object.
 *
 * Configuration like `cache_directory` or `max_cache_time` is not handled as it may depend
 * on your implementation.
 */
interface CachableInterface
{

    /**
     * Get the key of the current cached item
     *
     * This should transform an item identifier (such as a title) into a uniq key.
     *
     * @return string
     */
    function getCacheKey();

    /**
     * Test if an item is already cached and if its cache is still valid
     *
     * This may check if a cache exists for the item and if it seems always valid ; validity
     * may be tested for a static duration time (a `max_cache_time`) and could be checked
     * comparing the creation time of the cache entry and the last modification time of the
     * source if it is possible.
     *
     * @return bool
     */
    function isCached();

    /**
     * Get a cache content for an item
     *
     * This must return the exact same content passed at the `setCache()` method.
     *
     * @return mixed
     */
    function getCache();

    /**
     * Set a cache content for an item
     *
     * This must store the content in association with the item key ; the method could
     * return a boolean indicates if the caching process succeeded.
     *
     * @param mixed $content
     * @return bool
     */
    function setCache($content);

    /**
     * Clear a cache content for an item
     *
     * This must clear the cached content associated with the item key ; the method could
     * return a boolean indicates if the deletion process succeeded.
     *
     * @return bool
     */
    function invalidateCache();

}

// Endfile