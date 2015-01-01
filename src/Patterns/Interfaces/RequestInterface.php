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
 * Interface for classic request handling
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
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

// Endfile
