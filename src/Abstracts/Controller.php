<?php
/**
 * Controller Class
 *
 * @package AwesomeMotive\Miusage;
 */

namespace AwesomeMotive\Miusage\Abstracts;

use AwesomeMotive\Miusage\Traits\Hooker;

defined( 'ABSPATH' ) || exit;

/**
 * Class Controller
 *
 * @package AwesomeMotive\Miusage\Abstracts
 */
abstract class Controller {
	use Hooker;
}
