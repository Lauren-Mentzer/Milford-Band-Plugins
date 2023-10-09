<?php
/**
 * Plugin Name: Plugin for Milford Band
 * Description: Custom Elementor Widgets for Milford Band.
 * Version:     1.0.0
 * Author:      L Mentzer
 * Text Domain: plugin-milfordband
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function plugin_milfordband() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Plugin_Milfordband\MilfordBand_Elementor_Extension::instance();

}
add_action( 'plugins_loaded', 'plugin_milfordband' );
