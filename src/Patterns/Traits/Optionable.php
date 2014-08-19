<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Traits;

/**
 * This trait is the exact copy of the `\Patterns\Abstracts\AbstractOptionable` class.
 * It MUST be updated with it each time.
 *
 * @see     \Patterns\Abstracts\AbstractOptionable
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
trait Optionable
{

    /**
     * @var array
     */
    protected $options = array();

    /**
     * Set an array of options
     *
     * @param   array   $options    A table of options to define, key=>value pairs
     * @return  self
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Set the value of a specific option
     *
     * @param   string  $name   The index of the option to define
     * @param   mixed   $value  The option value to define
     * @return  self
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Get the array of options
     *
     * @return  array   The current options array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the value of a specific option
     *
     * @param   string  $name       The index of the option to get
     * @param   mixed   $default    The default value to return if the option is not defined
     * @return  array   The current option's value if defined, `$default` otherwise
     */
    public function getOption($name, $default = null)
    {
        return isset($this->options[$name]) ? $this->options[$name] : $default;
    }

}

// Endfile