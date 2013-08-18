<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

use \Patterns\Commons\Collection;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface RouterInterface
{

    /**
     * Set the routes collection
     *
     * @param obj $collection A `Patterns\Commons\Collection` object
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
     * @param misc $route_infos The informations about the route to analyze
     * @param string $hash A hash tag to add to the generated URL
	 * @param string $separator The argument/value separator (default is escaped ampersand : '&amp;')
     * @return string The application valid URL for the route
     */
    public function generateUrl($route_infos, $hash = null, $separator = '&amp;');

    /**
     * Distribute the current URL to the corresponding route
     *
     * @param misc $pathinfo The path information to distribute
     */
    public function matchUrl($pathinfo);

    /**
     * Actually dispatch the current route
     */
    public function distribute();

    /**
     * Forward the application to a new route (no HTTP redirect)
     *
     * @param misc $pathinfo The path information to forward to
     * @param string $hash A hash tag to add to the generated URL
     */
    public function forward($pathinfo, $hash = null);

    /**
     * Make a redirection to a new route (HTTP redirect)
     *
     * @param misc $pathinfo The path information to redirect to
     * @param string $hash A hash tag to add to the generated URL
     */
    public function redirect($pathinfo, $hash = null);

}

// Endfile