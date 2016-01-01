<?php
/**
 * This file is part of the Patterns package.
 *
 * Copyright (c) 2013-2016 Pierre Cassat <me@e-piwi.fr> and contributors
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

use \SeekableIterator;

/**
 * Iterator interface
 *
 * This interface is just set for homogeneity in iterations and array walking.
 *
 * @author  piwi <me@e-piwi.fr>
 */
interface IteratorInterface
    extends SeekableIterator
{

    /**
     * Put the index value at 0
     * This must be an alias of \Iterator::rewind()
     */
    public function reset();

    /**
     * Put the index value at the last index
     */
    public function end();

    /**
     * Get the current index
     * This must be an alias of \Iterator::current()
     */
    public function pos();

    /**
     * Decrease the current index
     */
    public function prev();

}

// Endfile