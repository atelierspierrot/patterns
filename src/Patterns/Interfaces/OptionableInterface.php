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
 * A simple interface to manage a set of options
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface OptionableInterface
{

    /**
     * Set an array of options
     * @param   array   $options
     */
    public function setOptions(array $options);

    /**
     * Set the value of a specific option
     * @param   string  $name
     * @param   mixed   $value
     */
    public function setOption($name, $value);

    /**
     * Get the array of options
     * @return  array
     */
    public function getOptions();

    /**
     * Get the value of a specific option
     * @param   string  $name
     * @param   mixed   $default
     * @return  mixed
     */
    public function getOption($name, $default = null);

}

// Endfile