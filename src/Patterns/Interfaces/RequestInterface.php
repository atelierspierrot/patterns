<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2016 Pierre Cassat <me@e-piwi.fr> and contributors
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
 * Interface for classic request handling
 *
 * @author  piwi <me@e-piwi.fr>
 */
interface RequestInterface
{

    /**
     * @return string|null
     */
    public function getUrl();

    /**
     * @return string|null
     */
    public function getProtocol();

    /**
     * @return string|null
     */
    public function getMethod();

    /**
     * @return array|null
     */
    public function getHeaders();

    /**
     * @return array|null
     */
    public function getArguments();

    /**
     * @return string|array|null
     */
    public function getData();

    /**
     * @return array|null
     */
    public function getFiles();

    /**
     * @return array|null
     */
    public function getSession();

    /**
     * @return array|null
     */
    public function getCookies();

    /**
     * @return array|string|null
     */
    public function getAuthentication();
}
