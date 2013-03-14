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
 * A simple interface for translation objects
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface TranslatableInterface
{
    public function setLanguage($lang, $throw_errors=true, $force_rebuild=false);
    public function getLanguage();
    public static function translate($index, array $args=array(), $lang=null);
    public static function pluralize(array $indexes=array(), $number=0, array $args=array(), $lang=null);
}

// Endfile