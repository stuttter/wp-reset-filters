<?php

define( 'ABSPATH', dirname( __DIR__ ) . '/' );

$GLOBALS['wprf_test'] = array();

function wprf_test_call( $name, $arguments = array() ) {
	$GLOBALS['wprf_test']['calls'][ $name ][] = $arguments;

	if ( isset( $GLOBALS['wprf_test']['returns'][ $name ] ) ) {
		return $GLOBALS['wprf_test']['returns'][ $name ];
	}

	return null;
}

function add_action() {
	return wprf_test_call( __FUNCTION__, func_get_args() );
}

function esc_html__( $text ) {
	return $text;
}

function plugin_dir_url() {
	wprf_test_call( __FUNCTION__, func_get_args() );
	return 'https://example.test/wp-content/plugins/wp-reset-filters/';
}

function wp_enqueue_script() {
	return wprf_test_call( __FUNCTION__, func_get_args() );
}

function wp_enqueue_style() {
	return wprf_test_call( __FUNCTION__, func_get_args() );
}

function wp_localize_script() {
	return wprf_test_call( __FUNCTION__, func_get_args() );
}

require_once dirname( __DIR__ ) . '/wp-reset-filters.php';

$GLOBALS['wprf_initial_calls'] = $GLOBALS['wprf_test']['calls'];
