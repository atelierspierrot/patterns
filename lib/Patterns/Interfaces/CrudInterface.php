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
 * An interface for a basic CRUD model
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface CrudInterface
{

    public function create($data);
    public function read($id);
    public function update($id, $data);
    public function delete($id);

}

// Endfile