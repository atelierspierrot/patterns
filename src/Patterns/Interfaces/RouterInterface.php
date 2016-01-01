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

use \Patterns\Commons\Collection;

/**
 * @author  piwi <me@e-piwi.fr>
 */
interface RouterInterface
{

    /**
     * Set the routes collection
     *
     * @param \Patterns\Commons\Collection  $collection     A collection object
     */
    public function setRoutes(Collection $collection);

    /**
     * Get the routes collection
     */
    public function getRoutes();

    /**
     * Check if a route exists
     *
     * @param string $route The route to test
     */
    public function routeExists($route);

    /**
     * Get the current route requested
     */
    public function getRoute();

    /**
     * Build a new route URL
     *
     * @param   mixed   $route_infos    The information about the route to analyze
     * @param   string  $base_uri       The URI to add the new route to
     * @param   string  $hash           A hash tag to add to the generated URL
     * @param   string  $separator      The argument/value separator (default is escaped ampersand : '&amp;')
     * @return  string  The application valid URL for the route
     */
    public function generateUrl($route_infos, $base_uri = null, $hash = null, $separator = '&amp;');

    /**
     * Distribute the current URL to the corresponding route
     *
     * @param mixed $pathinfo The path information to distribute
     */
    public function matchUrl($pathinfo);

    /**
     * Actually dispatch the current route
     */
    public function distribute();

    /**
     * Forward the application to a new route (no HTTP redirect)
     *
     * @param   mixed   $pathinfo   The path information to forward to
     * @param   string  $hash       A hash tag to add to the generated URL
     */
    public function forward($pathinfo, $hash = null);

    /**
     * Make a redirection to a new route (HTTP redirect)
     *
     * @param   mixed   $pathinfo   The path information to redirect to
     * @param   string  $hash       A hash tag to add to the generated URL
     */
    public function redirect($pathinfo, $hash = null);

}

// Endfile