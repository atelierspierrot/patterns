<?php
/**
 * PHP patterns
 * Copyleft (ↄ) 2013-2015 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <http://github.com/atelierspierrot/patterns>
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
