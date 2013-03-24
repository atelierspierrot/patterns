<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

use Patterns\Interfaces\ViewInterface;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
abstract class AbstractView implements ViewInterface
{

// ------------------
// View file management
// ------------------

	/**
	 * The view filename
	 */
	var $view=null;

    public function setView($name)
    {
        $this->view = $name;
        return $this;
    }

    public function getView()
    {
        return $this->view;
    }

// ------------------
// Output management
// ------------------

	/**
	 * The final rendering of the view
	 */
	var $output='';

    public function setOutput($content)
    {
        $this->output = $content;
        return $this;
    }

    public function appendOutput($content)
    {
        $this->output .= $content;
        return $this;
    }

    public function prependOutput($content)
    {
        $this->output = $content.$this->getOutput();
        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }

// ------------------
// Parameters management
// ------------------

	/**
	 * The parameters passed to the view (for parsing)
	 */
	var $params=array();

    public function setParams(array $params)
    {
        $this->params = $params;
        return $this;
    }

    public function addParam($name, $value = null)
    {
        $this->params[$name] = $value;
        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getParam($name)
    {
        return isset($this->params[$name]) ? $this->params[$name] : null;
    }

// ------------------
// Abstracts
// ------------------

    abstract public function render($view_file, array $params = array());
    abstract public function getDefaultViewParams();
    abstract public function getTemplate($name);

}

// Endfile