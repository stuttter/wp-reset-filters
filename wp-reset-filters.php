<?php

/*
 * Plugin Name: WP Reset Filters
 * Plugin URI:  http://wordpress.org/plugins/wp-reset-filters/
 * Author:      John James Jacoby
 * Author URI:  http://jjj.me
 * Version:     0.1.0
 * Description: Adds a "Reset" button to filters
 * License:     GPLv2 or later
 */

/**
 * Enqueue reset_filters
 *
 * @since 0.1.0
 */
function _wp_reset_filters() {

	// Vars
	$url = wp_reset_filters_get_plugin_url();
	$ver = wp_reset_filters_get_asset_version();

	// Styles
	wp_enqueue_style( 'wp-reset-filters',  $url . 'assets/css/wp-reset-filters.css',  array(), $ver );

	// Scripts
	wp_enqueue_script( 'wp-reset-filters', $url . 'assets/js/wp-reset-filters.js',    array( 'jquery' ), $ver, true );

	// Localize
	wp_localize_script( 'wp-reset-filters', 'WP_Reset_Filters', array(
		'button_text'     => esc_html__( 'Reset', 'wp-reset-filters' ),
		'button_disabled' => isset( $_GET['filter_action'] ) ? '' : 'disabled'
	) );
}
add_action( 'admin_enqueue_scripts', '_wp_reset_filters' );

/**
 * Return the plugin's URL
 *
 * @since 0.1.0
 *
 * @return string
 */
function wp_reset_filters_get_plugin_url() {
	return plugin_dir_url( __FILE__ );
}

/**
 * Return the asset version
 *
 * @since 0.1.0
 *
 * @return int
 */
function wp_reset_filters_get_asset_version() {
	return 201511170001;
}
