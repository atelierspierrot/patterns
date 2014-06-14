<?php
/**
 * PHP patterns
 * Copyleft (c) 2013-2014 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Abstracts;

/**
 * Global HTML response class
 * 
 * This class defines a very simple HTML response pattern with a content
 * and a set of headers. Its abstract methods force the children classes
 * to define how to render the response, force the client device to download
 * or display a raw file content and make a redirection to a new URL. 
 *  
 * @author 		Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractResponse
{

// ------------------
// Content management
// ------------------

	/**
	 * @var string The response content
	 */
	protected $body = '';

	/**
	 * @param string $body
	 * @return self
	 */
	public function setBody($body) 
	{
		$this->body = $body;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getBody() 
	{
		return $this->body;
	}

// ------------------
// Headers management
// ------------------

	/**
	 * @var array The response headers registry
	 */
    protected $headers = array();

	/**
	 * @param array $params
	 * @return self
	 */
    public function setHeaders(array $params)
    {
        $this->headers = $params;
        return $this;
    }

	/**
	 * @param string $name
	 * @param string $value
	 * @return self
	 */
    public function addHeader($name, $value = null)
    {
        $this->headers[$name] = $value;
        return $this;
    }

	/**
	 * @return array
	 */
    public function getHeaders()
    {
        return $this->headers;
    }

	/**
	 * @param string $name
	 * @return string|null
	 */
    public function getHeader($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : (
            isset($this->headers[strtolower($name)]) ? $this->headers[strtolower($name)] : null
        );
    }

	/**
	 * @param string $name
	 * @return bool
	 */
    public function hasHeader($name)
    {
        return isset($this->headers[$name]) || isset($this->headers[strtolower($name)]);
    }

	/**
	 * @return void
	 */
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

	/**
	 * This method must process a header redirection to the new URL
	 * 
	 * @param string $url
	 * @param bool $permanent
	 * @return void
	 */
	abstract public function redirect($url, $permanent = false);

	/**
	 * This method must render the response in `$type` content-type if defined
	 * 
	 * @param string $content
	 * @param string $type
	 * @return void
	 */
	abstract public function send($content = null, $type = null);

	/**
	 * This method must process a browser file download in `$type` content-type if defined
	 * 
	 * @param string $file
	 * @param string $type
	 * @param string $file_name
	 * @return void
	 */
	abstract public function download($file = null, $type = null, $file_name = null);

	/**
	 * This method must render a raw file content in `$type` content-type if defined
	 * 
	 * @param string $file_content
	 * @param string $type
	 * @return void
	 */
	abstract public function flush($file_content = null, $type = null);

}

// Endfile
