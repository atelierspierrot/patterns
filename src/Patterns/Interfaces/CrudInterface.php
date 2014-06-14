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
 * @author 		Piero Wbmstr <me@e-piwi.fr>
 */
interface CrudInterface
{

    public function create($data);
    public function read($id);
    public function update($id, $data);
    public function delete($id);

}

// Endfile