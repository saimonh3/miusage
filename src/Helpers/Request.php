<?php
/**
 * HTTP Request Trait
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Helpers;

defined( 'ABSPATH' ) || exit;

/**
 * Class Request
 *
 * @package AwesomeMotive\Miusage\Helpers
 */
class Request {
	/**
	 * Global get variable
	 *
	 * @var array
	 */
	private $get;

	/**
	 * Global post variable
	 *
	 * @var array
	 */
	private $post;

	/**
	 * Current request method
	 *
	 * @var mixed|null
	 */
	private $method;

	/**
	 * Request constructor.
	 */
	public function __construct() {
		$this->get    = $_GET; // phpcs:ignore
		$this->post   = $_POST; // phpcs:ignore
		$this->method = isset( $_SERVER['REQUEST_METHOD'] ) ? wp_unslash( $_SERVER['REQUEST_METHOD'] ) : null; // phpcs:ignore
	}

	/**
	 * Get args
	 *
	 * @param string $what what to get from the global get variable.
	 * @param null   $default default value to get.
	 *
	 * @return array|mixed|string|null
	 */
	public function get( $what, $default = null ) {
		$value = isset( $this->get[ $what ] ) ? $this->get[ $what ] : $default;

		if ( ! is_array( $value ) ) {
			$value = sanitize_textarea_field( $value );
		} elseif ( is_array( $value ) ) {
			$value = $this->sanitize_data( $value );
		}

		return $value;
	}

	/**
	 * Get post args
	 *
	 * @param string $what what to get from the POST variable.
	 * @param null   $default default value.
	 *
	 * @return array|mixed|string|string[]|null
	 */
	public function post( $what, $default = null ) {
		$value = isset( $this->post[ $what ] ) ? wp_unslash( $this->post[ $what ] ) : $default;

		if ( ! is_array( $value ) ) {
			$value = sanitize_text_field( $value );
		} elseif ( is_array( $value ) ) {
			$value = $this->sanitize_data( $value );
		}

		return $value;
	}

	/**
	 * Sanitize submitted data
	 *
	 * @param array $data data to sanitize.
	 *
	 * @return mixed
	 */
	public function sanitize_data( $data ) {
		foreach ( $data as $key => &$value ) {
			if ( is_array( $value ) ) {
				$value = $this->sanitize_data( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
		}

		return $data;
	}

	/**
	 * Get request method
	 *
	 * @return string
	 */
	public function method() {
		return strtolower( $this->sanitize_data( $this->method ) );
	}

	/**
	 * Send JSON response
	 *
	 * @param mixed $response what to return.
	 * @param null  $status_code status code.
	 * @param int   $option Options to be passed to json_encode(). Default 0.
	 */
	public function json( $response, $status_code = null, $option = 0 ) {
		wp_send_json( $response, $status_code, $option );
	}
}

