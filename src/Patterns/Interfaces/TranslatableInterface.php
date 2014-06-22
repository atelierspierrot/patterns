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
 * This work is BETA (not fully tested)
 *
 * A simple interface for translation objects
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface TranslatableInterface
{
    public function setLanguage($lang, $throw_errors=true, $force_rebuild=false);
    public function getLanguage();
    public static function translate($index, array $args=array(), $lang=null);
    public static function pluralize(array $indexes=array(), $number=0, array $args=array(), $lang=null);
}

// Endfile