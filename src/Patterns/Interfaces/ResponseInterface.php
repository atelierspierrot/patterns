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
 * Interface for classic response handling
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface ResponseInterface
{

    /**
     * Make a redirection by headers
     *
     * @param   string  $url        The URL to redirect to
     * @param   bool    $permanent  Is it a permanent redirection ? (default is false)
     */
    public function redirect($url, $permanent = false);

    /**
     * Send the response to the device
     *
     * @param   string  $content    The body of the response to send
     * @param   string  $type       A content type to handle
     */
    public function send($content = null, $type = null);

    /**
     * Force device to download a file
     *
     * @param   string  $file       The path to the file to download
     * @param   string  $type       The file type to build headers
     * @param   string  $file_name  A specific filename to define for download
     */
    public function download($file = null, $type = null, $file_name = null);

    /**
     * Flush (display) a file content
     *
     * @param   string  $file_content   The plain text content to display
     * @param   string  $type           The content type to build headers
     */
    public function flush($file_content = null, $type = null);

}

// Endfile
