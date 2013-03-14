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
interface ViewInterface
{

    /**
     * Building of a view content including a view file passing it parameters
     */
    public function render($view_file, array $params = array());

    /**
     * Get an array of the default parameters for all views
     */
    public function getDefaultViewParams();

    /**
     * Get a template file path (relative to `option['templates_dir']`)
     */
    public function getTemplate($name);

}

// Endfile