<?php
namespace Inc\Base;
use \Inc\Base\ApiLinks;
use \Brain\Monkey\Functions;

class ApiLinkTest extends \PluginTestCase {
    public function test_register() {
        $this->extend();
        Functions\expect( 'get_option' )
        ->once();
        Functions\expect( 'register_activation_hook' )
        ->once();
    
        $ApiLinks=new ApiLinks();
        $ApiLinks->register();

        $this->assertSame(10, has_action('init', [ $ApiLinks, 'apiTableLink' ]) );
        $this->assertSame(10, has_filter('request', [ $ApiLinks, 'apiRequest' ] ) );
        $this->assertSame(10, has_action('template_redirect', [ $ApiLinks, 'apiRedirect' ]) );
    }
    public function test_apiTableLink() {
        $this->extend();
        Functions\expect( 'add_rewrite_endpoint' )
            ->once();
        Functions\expect( 'flush_rewrite_rules' )
            ->once();
        ( new ApiLinks() )->apiTableLink();
    }
    public function extend() {
        Functions\expect( 'plugin_dir_path' )
            ->once();
            Functions\expect( 'plugin_dir_url' )
            ->once();
            Functions\expect( 'plugin_basename' )
            ->once();
    }
    public function test_apiRedirect() {
        $this->extend();
        Functions\expect( 'get_query_var' )
            ->once();
        ( new ApiLinks() )->apiRedirect();
    }

}