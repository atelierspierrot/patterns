<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

/**
 * A simple interface to manage a set of options statically
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface StaticOptionableInterface
{

    /**
     * Set an array of options
     */
    public static function setOptions(array $options);

    /**
     * Set the value of a specific option
     */
    public static function setOption($name, $value);

    /**
     * Get the array of options
     */
    public static function getOptions();

    /**
     * Get the value of a specific option
     */
    public static function getOption($name, $default = null);

}

// Endfile