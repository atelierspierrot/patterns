<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2015 Pierre Cassat <me@e-piwi.fr> and contributors
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *      http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
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