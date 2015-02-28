<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyleft (ↄ) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
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
 *
 * The source code of this package is available online at 
 * <http://github.com/atelierspierrot/patterns>.
 */

namespace Patterns\Interfaces;

/**
 * A simple interface for translation objects
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface TranslatableInterface
{

    /**
     * @param   string  $lang
     * @param   bool    $throw_errors
     * @param   bool    $force_rebuild
     * @return  mixed
     */
    public function setLanguage($lang, $throw_errors = true, $force_rebuild = false);

    /**
     * @return mixed
     */
    public function getLanguage();

    /**
     * @param   string  $index
     * @param   array   $args
     * @param   null    $lang
     * @return  mixed
     */
    public static function translate($index, array $args=array(), $lang=null);

    /**
     * @param   array   $indexes
     * @param   int     $number
     * @param   array   $args
     * @param   null    $lang
     * @return  mixed
     */
    public static function pluralize(array $indexes=array(), $number=0, array $args=array(), $lang=null);

}

// Endfile