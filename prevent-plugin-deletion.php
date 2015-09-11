<?php

/**
 * Prevent Plugin Deletion
 *
 * A plugin that prevents plugins from being accidentally deleted,
 * without using must-use plugins (allows deactivation and activation hooks).
 *
 * @wordpress-plugin
 * Plugin Name:			Prevent Plugin Deletion
 * Plugin URI:			http://expandedfronts.com
 * Description:			A plugin that prevents plugins from being accidentally deleted.
 * Version:				1.0
 * Author:				Expanded Fronts
 * Author URI:			http://expandedfronts.com
 * License:				GPL-3.0
 * License URI:			http://www.gnu.org/licenses/gpl-3.0.txt
 */

// Prevent direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Prevents plugins from being deleted.
 */
function ppd_unset_actions( $actions, $plugin_file, $plugin_data, $context ) {
	$actions_to_remove = apply_filters( 'ppd_actions_to_remove', array( 'delete' ) );

	foreach ( $actions_to_remove as $action ) {
		unset( $actions[$action] );
	}
	return $actions;
}
add_filter( 'plugin_action_links', 'ppd_unset_actions', 10, 4 );

