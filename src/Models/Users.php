<?php
/**
 * Users Model
 *
 * @package AwesomeMotive\Miusage;
 */

namespace AwesomeMotive\Miusage\Models;

use AwesomeMotive\Miusage\Interfaces\DataLoader;

defined( 'ABSPATH' ) || exit;

/**
 * Class Users
 *
 * @package AwesomeMotive\Miusage\Models
 */
class Users {
	/**
	 * Dataloader instance.
	 *
	 * @var DataLoader
	 */
	private $data_loader;

	/**
	 * Users constructor.
	 *
	 * @param DataLoader $data_loader Dataloader instance.
	 */
	public function __construct( DataLoader $data_loader ) {
		$this->data_loader = $data_loader;
	}

	/**
	 * Get all the users
	 *
	 * @return array
	 */
	public function all() {
		$users = $this->data_loader->load();

		return ! empty( $users ) ? $users : [];
	}
}
