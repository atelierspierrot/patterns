<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/patterns>.
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
