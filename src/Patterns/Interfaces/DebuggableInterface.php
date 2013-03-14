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
 * A simple interface to manage a debuggable object
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface DebuggableInterface
{
    public static function setDebug($debug);
    public static function getDebug();
    public static function isDebug();
}

// Endfile