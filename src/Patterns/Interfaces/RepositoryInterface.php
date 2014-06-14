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
 * @author 		Piero Wbmstr <me@e-piwi.fr>
 */
interface RepositoryInterface
{

    public function getAll();
    public function getOneBy($prop_name, $value);
    public function exists($prop_name, $value);

}

// Endfile