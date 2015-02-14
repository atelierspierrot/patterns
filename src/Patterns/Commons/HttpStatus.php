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

namespace Patterns\Commons;

/**
 * List of HTTP status codes
 * 
 * This class only defines constants of defined HTTP protocol's status codes as specified
 * in [RFC 2616](http://tools.ietf.org/html/rfc2616) and [RFC 3648](http://tools.ietf.org/html/rfc3648).
 * 
 * @author  Piero Wbmstr <me@e-piwi.fr>
 */
class HttpStatus
{

    const OK                     = '200 OK';
    const NO_CONTENT             = '204 No Content';
    const MOVED_PERMANENTLY      = '301 Moved Permanently';
    const MOVED_TEMPORARILY      = '302 Moved Temporarily';
    const NOT_MODIFIED           = '304 Not Modified';
    const BAD_REQUEST            = '400 Bad Request';
    const UNAUTHORIZED           = '401 Unauthorized';
    const FORBIDDEN              = '403 Forbidden';
    const NOT_FOUND              = '404 Not Found';
    const METHOD_NOT_ALLOWED     = '405 Method Not Allowed';
    const GONE                   = '410 Gone';
    const UNPROCESSABLE_ENTITY   = '422 Unprocessable Entity';
    const ERROR                  = '500 Internal Server Error';

}

// Endfile
