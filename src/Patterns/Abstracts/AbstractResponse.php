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
 */
abstract class AbstractResponse
{

// ------------------
// Content management
// ------------------

	/**
	 * The response content
	 */
	protected $body = '';

	/**
	 */
	public function setBody($body) 
	{
		$this->body = $body;
		return $this;
	}

	/**
	 */
	public function getBody() 
	{
		return $this->body;
	}

// ------------------
// Headers management
// ------------------

	/**
	 * The response headers registry
	 */
    protected $headers = array();

    public function setHeaders(array $params)
    {
        $this->headers = $params;
        return $this;
    }

    public function addHeader($name, $value = null)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getHeader($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : (
            isset($this->headers[strtolower($name)]) ? $this->headers[strtolower($name)] : null
        );
    }

    public function hasHeader($name)
    {
        return isset($this->headers[$name]) || isset($this->headers[strtolower($name)]);
    }

    public function renderHeaders()
    {
        if (headers_sent()) return;
        foreach($this->getHeaders() as $name=>$val) {
            header(ucfirst($name).': '.$val);
        }
    }
    
// ------------------
// Abstracts
// ------------------

    abstract public function redirect($url, $permanent = false);
    abstract public function send($content = null, $type = null);
	abstract public function download($file = null, $type = null, $file_name = null);
	abstract public function flush($file_content = null, $type = null);

}

// Endfile
