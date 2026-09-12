<?php

use PHPUnit\Framework\TestCase;

final class HookRegistrationTest extends TestCase {
	public function test_registers_the_global_admin_enqueue_hook() {
		$this->assertContains(
			array( 'admin_enqueue_scripts', '_wp_reset_filters' ),
			$GLOBALS['wprf_initial_calls']['add_action']
		);
	}
}
