<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractView
{

// ------------------
// View file management
// ------------------

    /**
     * The name of the view file to parse
     */
    protected $view=null;

    /**
     * Set the view name to parse
     *
     * @param str $path The name of the view to load
     * @return self Returns `$this` for method chaining
     */
    public function setView($path)
    {
        $this->view = $path;
        return $this;
    }

    /**
     * Get the view name
     *
     * @return str The name of the view file to load
     */
    public function getView()
    {
        return $this->view;
    }

// ------------------------------
// Output management
// ------------------------------

    /**
	 * The final rendering of the view
     */
    protected $output='';

    /**
     * Set the output content
     *
     * @param str $str The output of a view parsing
     * @return self Returns `$this` for method chaining
     */
    public function setOutput($str)
    {
        $this->output = $str;
        return $this;
    }

    /**
     * Append the output content to the existing content
     *
     * @param str $str The output of a view parsing
     * @return self Returns `$this` for method chaining
     */
    public function appendOutput($content)
    {
        $this->output .= $content;
        return $this;
    }

    /**
     * Prepend the output content to the existing content
     *
     * @param str $str The output of a view parsing
     * @return self Returns `$this` for method chaining
     */
    public function prependOutput($content)
    {
        $this->output = $content.$this->getOutput();
        return $this;
    }

    /**
     * Get the current view rendering output
     *
     * @return str The rendering of the view
     */
    public function getOutput()
    {
        return $this->output;
    }

// ------------------------------
// User per view parameters management
// ------------------------------

    /**
     * The table of the parameters loaded in current view
     */
    protected $params = array();

    /**
     * Reset the parameters for the current view on an empty array
     *
     * @return self Returns `$this` for method chaining
     */
    public function resetParams()
    {
        $this->params = array();
        return $this;
    }

    /**
     * Set an array of the parameters for the current view
     *
     * @param array $params The array of parameters
     * @return self Returns `$this` for method chaining
     */
    public function setParams(array $params)
    {
        $this->params = array_merge($this->params, $params);
        return $this;
    }

    /**
     * Add an entry of parameters for the current view
     *
     * @param str $name The name of the parameter
     * @param misc $val The value to set for the parameter
     * @return self Returns `$this` for method chaining
     */
    public function addParam($name, $val)
    {
        $this->params[$name] = $val;
        return $this;
    }

    /**
     * Get the parameters for the current view
     *
     * @param bool $alone Get the stack of parameters without the default params (default is `false`)
     * @return array The array of parameters
     */
    public function getParams($alone = false)
    {
        if ($alone) {
            return $this->params;
        } else {
            return array_merge($this->getDefaultViewParams(), $this->params);
        }
    }

    /**
     * Get a value of the parameters for the current view
     *
     * @parameter string $name The name of the parameter to get
     * @parameter misc $default The default value returns if no parameter is defined for `$name`
     * @return misc The parameter value if found, `$default` otherwise
     */
    public function getParam($name, $default = null)
    {
        return isset($this->params[$name]) ? $this->params[$name] : $default;
    }

// ------------------
// Abstracts
// ------------------

    /**
     * Building of a view content including a view file passing it parameters
     *
     * @param string $view The view filename (which must exist)
     * @param array $params An array of the parameters passed for the view parsing
     * @return string Returns the view file content rendering
     */
    abstract public function render($view_file, array $params = array());

    /**
     * Get the default parameters for all views
     *
     * @return array The array of default parameters
     */
    abstract public function getDefaultViewParams();

    /**
     * Search a view file in the current file system
     *
     * @parameter string $name The file path to search
     * @return string The path of the file found
     */
    abstract public function getTemplate($name);

}

// Endfile