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