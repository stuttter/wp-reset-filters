<?php

use PHPUnit\Framework\TestCase;

final class EnqueueTest extends TestCase {
	private $original_get;

	protected function setUp(): void {
		$this->original_get = $_GET;
		$GLOBALS['wprf_test'] = array();
		$_GET = array();
	}

	protected function tearDown(): void {
		$_GET = $this->original_get;
	}

	public function test_enqueues_the_current_assets_for_an_invocation() {
		_wp_reset_filters();

		$this->assertSame(
			array(
				'wp-reset-filters',
				'https://example.test/wp-content/plugins/wp-reset-filters/assets/css/wp-reset-filters.css',
				array(),
				201511170001,
			),
			$GLOBALS['wprf_test']['calls']['wp_enqueue_style'][0]
		);
		$this->assertSame(
			array(
				'wp-reset-filters',
				'https://example.test/wp-content/plugins/wp-reset-filters/assets/js/wp-reset-filters.js',
				array( 'jquery' ),
				201511170001,
				true,
			),
			$GLOBALS['wprf_test']['calls']['wp_enqueue_script'][0]
		);
	}

	public function test_disables_reset_when_filter_action_is_absent() {
		_wp_reset_filters();

		$this->assertSame(
			array(
				'wp-reset-filters',
				'WP_Reset_Filters',
				array(
					'button_text'     => 'Reset',
					'button_disabled' => 'disabled',
				),
			),
			$GLOBALS['wprf_test']['calls']['wp_localize_script'][0]
		);
	}

	public function test_enables_reset_when_filter_action_is_present() {
		$_GET['filter_action'] = '';

		_wp_reset_filters();

		$this->assertSame( '', $GLOBALS['wprf_test']['calls']['wp_localize_script'][0][2]['button_disabled'] );
	}
}
