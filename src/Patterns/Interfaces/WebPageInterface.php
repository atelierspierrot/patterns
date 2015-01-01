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
 * This work is BETA (not fully tested)
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface WebPageInterface
{

    /**
     * Build the page menu
     */
    public function buildMenu();

    /**
     * Get the page menu
     */
    public function getMenu();

    /**
     * Build the page title
     */
    public function buildTitle();

    /**
     * Get the page title
     */
    public function getTitle();

    /**
     * Build the page metas
     */
    public function buildMetas();

    /**
     * Get the page metas
     */
    public function getMetas();

    /**
     * Get one page meta
     */
    public function getMeta($name);

}

// Endfile