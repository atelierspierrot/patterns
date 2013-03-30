<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use Patterns\Interfaces\OptionableInterface;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractOptionable implements OptionableInterface
{

    protected $options = array();

    /**
     * Set an array of options
     *
     * @param array $options A table of options to define, key=>value pairs
     * @return self Returns `$this` for method chaining
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Set the value of a specific option
     *
     * @param string $name The index of the option to define
     * @param misc $value The option value to define
     * @return self Returns `$this` for method chaining
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;
        return $this;
    }

    /**
     * Get the array of options
     *
     * @return array The current options array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get the value of a specific option
     *
     * @param string $name The index of the option to get
     * @param misc $default The default value to return if the option is not defined
     * @return array The current option's value if defined, `$default` otherwise
     */
    public function getOption($name, $default = null)
    {
        return isset($this->options[$name]) ? $this->options[$name] : $default;
    }

}

// Endfile