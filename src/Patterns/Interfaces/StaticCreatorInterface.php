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
 * This interface allows to create objects that can be statically created "on-the-fly" to allow
 * method chaining constructing them like:
 *
 *     $obj = ObjectStaticCreator::create( arguments )
 *         ->method();
 *
 * @author   Piero Wbmstr <me@e-piwi.fr>
 */
interface StaticCreatorInterface
{

    /**
     * @return self Must return a new instance of the object created with function arguments
     */
    public static function create();
    
}

// Endfile
