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