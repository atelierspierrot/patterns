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

namespace Patterns\Interfaces;

use \Patterns\Commons\Collection;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
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