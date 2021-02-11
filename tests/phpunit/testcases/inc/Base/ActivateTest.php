<?php
namespace Inc\Base;
use \Inc\Base\Activate;
use \Brain\Monkey\Functions;

class ActivateTest extends \PluginTestCase {
	public function test_activ() {
		// We expect wp_unslash to be called during bootstrap
		Functions\expect( 'flush_rewrite_rules' )
			->once();
			( new Activate() )->activ();
	}
}
