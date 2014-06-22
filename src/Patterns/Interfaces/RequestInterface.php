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
