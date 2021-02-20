<?php
/**
 * Data Loader Interface
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Interfaces;

defined( 'ABSPATH' ) || exit;

/**
 * Interface DataLoader
 *
 * @package AwesomeMotive\Miusage\Interfaces
 */
interface DataLoader {

	/**
	 * Load data from any interface.
	 *
	 * @return mixed
	 */
	public function load();
}
