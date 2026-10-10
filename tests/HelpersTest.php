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
		$this->assertSame( 202610100001, wp_reset_filters_get_asset_version() );
	}

	/**
	 * Tests that the reset button matches compact WordPress admin buttons.
	 */
	public function test_reset_button_uses_compact_admin_button_styling() {
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Reading a local test fixture.
		$script = file_get_contents( dirname( __DIR__ ) . '/assets/js/wp-reset-filters.js' );

		$this->assertStringContainsString( 'class="button button-compact"', $script );
	}

	/**
	 * Tests that the reset button aligns with the adjacent filter button.
	 */
	public function test_reset_button_uses_the_filter_button_margin() {
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- Reading a local test fixture.
		$stylesheet = file_get_contents( dirname( __DIR__ ) . '/assets/css/wp-reset-filters.css' );

		$this->assertStringContainsString( 'margin: 0 8px 0 0;', $stylesheet );
	}
}
