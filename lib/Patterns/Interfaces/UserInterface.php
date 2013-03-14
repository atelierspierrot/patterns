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
 * A simple user interface
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface UserInterface
{
    public function authoring($autologin=false);
    public function signin(array $data, $autologin=false);
    public function login(array $data=array());
    public function logout(array $data=array());
    public function isLogged(array $data=array());
    public function setUserInfos(array $data);
    public function addUserInfo($var, $val);
}

// Endfile