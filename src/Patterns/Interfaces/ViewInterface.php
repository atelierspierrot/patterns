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
 * @author  piwi <me@e-piwi.fr>
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