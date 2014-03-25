<?php
/**
 * PHP patterns
 * Copyleft (c) 2013 Pierre Cassat and contributors
 * <www.ateliers-pierrot.fr> - <contact@ateliers-pierrot.fr>
 * License GPL-3.0 <http://www.opensource.org/licenses/gpl-3.0.html>
 * Sources <https://github.com/atelierspierrot/patterns>
 */

namespace Patterns\Interfaces;

use \SeekableIterator;

/**
 * Iterator interface
 *
 * This interface is just set for homogeneity in iterations and array walking.
 *
 * @author 		Piero Wbmstr <piero.wbmstr@gmail.com>
 */
interface IteratorInterface
    extends SeekableIterator
{

	/**
	 * Put the index value at 0
	 * This must be an alias of \Iterator::rewind()
	 */
    public function reset();

	/**
	 * Put the index value at the last index
	 */
    public function end();

	/**
	 * Get the current index
	 * This must be an alias of \Iterator::current()
	 */
    public function pos();

	/**
	 * Decrease the current index
	 */
    public function prev();

}

// Endfile