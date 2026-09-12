<?php

use PHPUnit\Framework\TestCase;

final class HelpersTest extends TestCase {
	protected function setUp(): void {
		$GLOBALS['wprf_test'] = array();
	}

	public function test_returns_the_plugin_directory_url() {
		$this->assertSame(
			'https://example.test/wp-content/plugins/wp-reset-filters/',
			wp_reset_filters_get_plugin_url()
		);
		$this->assertSame(
			array( dirname( __DIR__ ) . '/wp-reset-filters.php' ),
			$GLOBALS['wprf_test']['calls']['plugin_dir_url'][0]
		);
	}

	public function test_returns_the_current_asset_version() {
		$this->assertSame( 201511170001, wp_reset_filters_get_asset_version() );
	}
}
