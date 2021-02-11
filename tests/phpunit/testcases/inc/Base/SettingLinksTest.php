<?php
namespace Inc\Base;
use \Inc\Base\SettingLinks;
use \Brain\Monkey\Functions;

class SettingLinksTest extends \PluginTestCase {
    protected $plugin='hello';
	public function test_register() {
        $this->extend();
        Functions\expect( 'add_filter' )
            ->once();
        $SettingLinks=new SettingLinks();
        $SettingLinks->register();
		// We expect wp_unslash to be called during bootstrap
		// $this->assertSame(10, has_filter('plugin_action_links_$this->plugin', [ $SettingLinks, 'settingsLink' ] ) );
    }
    public function extend() {
        Functions\expect( 'plugin_dir_path' )
            ->once();
            Functions\expect( 'plugin_dir_url' )
            ->once();
            Functions\expect( 'plugin_basename' )
            ->once();
    }
    public function test_settingsLink() {
        $this->extend();
        $SettingLinks=new SettingLinks();
        $links=["1","2"];
        $this->assertSame($SettingLinks->settingsLink($links),[$links[0],$links[1],'<a href="options-general.php?' .
        'page=icetable_plugin">Settings</a>']);
    }
}
