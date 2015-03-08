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
 * An interface for a basic CRUD model
 *
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
interface CrudInterface
{

    /**
     * @param   array $data
     * @return  bool
     */
    public function create($data);

    /**
     * @param   int $id
     * @return  mixed
     */
    public function read($id);

    /**
     * @param   int     $id
     * @param   array   $data
     * @return  bool
     */
    public function update($id, $data);

    /**
     * @param   int $id
     * @return  bool
     */
    public function delete($id);

}

// Endfile