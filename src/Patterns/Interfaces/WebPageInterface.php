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
 * @author 		Piero Wbmstr <me@e-piwi.fr>
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