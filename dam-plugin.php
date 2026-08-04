<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Dam_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Dam Plugin
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       A custom Digital Asset Management plugin for WordPress.
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dam-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DAM_PLUGIN_VERSION', '1.0.0' );

function activate_dam_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dam-plugin-activator.php';
	Dam_Plugin_Activator::activate();
}

function deactivate_dam_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dam-plugin-deactivator.php';
	Dam_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dam_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_dam_plugin' );

require_once plugin_dir_path( __FILE__ ) . 'includes/class-dam-plugin.php';

function run_dam_plugin() {
	$plugin = new Dam_Plugin();
	$plugin->run();
}
run_dam_plugin();