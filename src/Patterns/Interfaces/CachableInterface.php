<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
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