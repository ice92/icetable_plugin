<?php
namespace Inc\Base;
use \Inc\Base\Deactivate;
use \Brain\Monkey\Functions;

class DeactivateTest extends \PluginTestCase {
	public function test_activ() {
        // We expect wp_unslash to be called during bootstrap
        Functions\expect( 'delete_option' )
            ->once()
            ->with('api_link');
		Functions\expect( 'flush_rewrite_rules' )
			->once();
			( new Deactivate() )->deactiv();
	}
}
