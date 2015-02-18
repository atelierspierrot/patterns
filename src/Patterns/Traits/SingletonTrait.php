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

namespace Patterns\Traits;

use \ReflectionClass;
use \Exception;

/**
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
trait SingletonTrait
{

    /**
     * @var null|self
     */
    private static $_instance = null;

    /**
     * Constructor : classic object constructor
     *
     * The best practice is to define a `private` constructor to avoid object direct
     * creation ; if the constructor is public, it will receive the arguments passed
     * to the `getInstance` method.
     */
    abstract function __construct();

    /**
     * @return self
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            $_class = get_called_class();
            $reflection = new ReflectionClass($_class);
            if ($reflection->isInstantiable()) {
                self::$_instance = $reflection->newInstanceArgs(func_get_args());
            } else {
                self::$_instance = new $_class();
                if (func_num_args()>0) {
                    trigger_error(
                        sprintf('Singleton of type "%s" has no public constructor, arguments will not be fetched to the instance!', $_class),
                        E_USER_NOTICE
                    );
                }
            }
        }
        return self::$_instance;
    }

    /**
     * This must throw an error as cloning a singleton is forbidden
     *
     * @return void
     * @throws \Exception
     */
    public function __clone()
    {
        throw new Exception(
            sprintf('Cloning a "%s" instance is not allowed!', get_called_class())
        );
    }

}

// Endfile
