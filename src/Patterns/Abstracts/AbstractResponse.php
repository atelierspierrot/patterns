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

namespace Patterns\Abstracts;

use \Patterns\Interfaces\ResponseInterface;

/**
 * Global HTML response class
 * 
 * This class defines a very simple HTML response pattern with a content
 * and a set of headers. Its abstract methods force the children classes
 * to define how to render the response, force the client device to download
 * or display a raw file content and make a redirection to a new URL. 
 *  
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
abstract class AbstractResponse
    implements ResponseInterface
{

// ------------------
// Content management
// ------------------

    /**
     * @var string The response content
     */
    protected $body = '';

    /**
     * @param   string  $body
     * @return  self
     */
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return  string
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
     * @param   array   $params
     * @return  self
     */
    public function setHeaders(array $params)
    {
        $this->headers = $params;
        return $this;
    }

    /**
     * @param   string  $name
     * @param   string  $value
     * @return  self
     */
    public function addHeader($name, $value = null)
    {
        $this->headers[$name] = $value;
        return $this;
    }

    /**
     * @return  array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param   string  $name
     * @return  string|null
     */
    public function getHeader($name)
    {
        return isset($this->headers[$name]) ? $this->headers[$name] : (
            isset($this->headers[strtolower($name)]) ? $this->headers[strtolower($name)] : null
        );
    }

    /**
     * @param   string  $name
     * @return  bool
     */
    public function hasHeader($name)
    {
        return (bool) (isset($this->headers[$name]) || isset($this->headers[strtolower($name)]));
    }

    /**
     * @return void
     */
    public function renderHeaders()
    {
        if (headers_sent()) {
            return;
        }
        foreach ($this->getHeaders() as $name=>$val) {
            header(ucfirst($name).': '.$val);
        }
    }

// ------------------
// Abstracts
// ------------------

    /**
     * This method must process a header redirection to the new URL
     *
     * @param   string  $url
     * @param   bool    $permanent
     * @return  void
     */
    abstract public function redirect($url, $permanent = false);

    /**
     * This method must render the response in `$type` content-type if defined
     *
     * @param   string  $content
     * @param   string  $type
     * @return  void
     */
    abstract public function send($content = null, $type = null);

    /**
     * This method must process a browser file download named `$file_name` if defined and in `$type` content-type if defined
     *
     * @param   string  $file
     * @param   string  $type
     * @param   string  $file_name
     * @return  void
     */
    abstract public function download($file = null, $type = null, $file_name = null);

    /**
     * This method must render a raw file content in `$type` content-type if defined
     *
     * @param   string  $file_content
     * @param   string  $type
     * @return  void
     */
    abstract public function flush($file_content = null, $type = null);

}

// Endfile
