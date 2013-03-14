<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

/**
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface RouterInterface
{

    /**
     * Build the possible routes
     */
    public function buildRoutes();

    /**
     * Check if a route exists
     */
    public function routeExists($route);

    /**
     * Get the current route requested
     */
    public function getRoute();

    /**
     * Build a new route URL
     */
    public function getRouteUrl($page, $hash=null);

}

// Endfile