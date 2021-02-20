<?php
/**
 * Hooker helper class.
 *
 * @package AwesomeMotive\Miusage
 */

namespace AwesomeMotive\Miusage\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Trait Hooker
 *
 * @since 1.0.0
 *
 * @package AwesomeMotive\Miusage\Traits
 */
trait Hooker {

	/**
	 * Do action
	 *
	 * @param string $tag action name.
	 * @param mixed  ...$args other parameters.
	 */
	protected function do_action( $tag, ...$args ) {
		do_action( $tag, ...$args );
	}

	/**
	 * Add action
	 *
	 * @since 1.0.0
	 *
	 * @param string   $tag action name.
	 * @param callable $function_to_add function to run.
	 * @param int      $priority calling priority.
	 * @param int      $accepted_args number of argument to supply.
	 */
	protected function action( $tag, callable $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_action( $tag, $function_to_add, $priority, $accepted_args );
	}

	/**
	 * Apply filters
	 *
	 * @since 1.0.0
	 *
	 * @param string $tag filter name.
	 * @param mixed  $value arguments.
	 *
	 * @return mixed
	 */
	protected function apply_filters( $tag, $value ) {
		return apply_filters( $tag, $value );
	}

	/**
	 * Add filter
	 *
	 * @since 1.0.0
	 *
	 * @param string   $tag action name.
	 * @param callable $function_to_add function to run.
	 * @param int      $priority calling priority.
	 * @param int      $accepted_args number of argument to supply.
	 *
	 * @return void
	 */
	protected function filter( $tag, callable $function_to_add, $priority = 10, $accepted_args = 1 ) {
		add_filter( $tag, $function_to_add, $priority, $accepted_args );
	}

	/**
	 * Check whether the action is registered or not
	 *
	 * @param string $tag name of the action.
	 * @param false  $function_to_check function to check.
	 *
	 * @return bool
	 */
	protected function has_action( $tag, $function_to_check = false ) {
		return has_action( $tag, $function_to_check );
	}

	/**
	 * Check whether the action is registered or not
	 *
	 * @param string $tag name of the action.
	 * @param false  $function_to_check funciton to check.
	 *
	 * @return bool
	 */
	protected function has_filter( $tag, $function_to_check = false ) {
		return has_filter( $tag, $function_to_check );
	}


	/**
	 * Calls the callback functions that have been added to an action hook, specifying arguments in an array.
	 *
	 * @since 1.0.0
	 *
	 * @param string $tag  The name of the action to be executed.
	 * @param array  $args The arguments supplied to the functions hooked to `$tag`.
	 */
	protected function do_action_ref_array( $tag, array $args ) {
		do_action_ref_array( $tag, $args );
	}

	/**
	 * Check whether the action was fired or not. If so, how many times.
	 *
	 * @since 1.0.0
	 *
	 * @param string $tag action name.
	 *
	 * @return int
	 */
	protected function did_action( $tag ) {
		return did_action( $tag );
	}

	/**
	 * Remove the action
	 *
	 * @since 1.0.0
	 *
	 * @param string   $tag                The action hook to which the function to be removed is hooked.
	 * @param callable $function_to_remove The name of the function which should be removed.
	 * @param int      $priority           Optional. The priority of the function. Default 10.
	 *
	 * @return bool
	 */
	protected function remove_action( $tag, callable $function_to_remove, $priority = 10 ) {
		return remove_action( $tag, $function_to_remove, $priority );
	}

	/**
	 * Remove all of the hooks from an action.
	 *
	 * @since 1.0.0
	 *
	 * @param string   $tag      The action to remove hooks from.
	 * @param int|bool $priority The priority number to remove them from. Default false.
	 * @return true True when finished.
	 */
	protected function remove_all_actions( $tag, $priority = false ) {
		return remove_all_actions( $tag, $priority );
	}

	/**
	 * Fires functions attached to a deprecated filter hook.
	 *
	 * @param string $tag         The name of the filter hook.
	 * @param array  $args        Array of additional function arguments to be passed to apply_filters().
	 * @param string $version     The version of WordPress that deprecated the hook.
	 * @param string $replacement Optional. The hook that should have been used. Default empty.
	 * @param string $message     Optional. A message regarding the change. Default empty.
	 *
	 * @return mixed
	 */
	protected function apply_filters_deprecated( $tag, array $args, $version, $replacement = '', $message = '' ) {
		return apply_filters_deprecated( $tag, $args, $version, $replacement, $message );
	}
}
