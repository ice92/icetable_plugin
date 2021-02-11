<?php
namespace Inc\Pages;
use \Inc\Pages\Admin;
use \Brain\Monkey\Functions;

class AdminTest extends \PluginTestCase {
	public function test_register() {
        $this->extend();

        Functions\expect( 'register_setting' )
        ->once()
        ->with('icetable_fields', 'api_link');
    
        $Admin=new Admin();
        $Admin->register();

        $this->assertSame(10, has_action('admin_menu', [ $Admin, 'addAdminPages' ]) );
        $this->assertSame(10, has_action('admin_init', [ $Admin, 'setupSections' ] ) );
        $this->assertSame(10, has_action('admin_init', [ $Admin, 'setupFields' ]) );
    }
    public function extend() {
        Functions\expect( 'plugin_dir_path' )
            ->once();
            Functions\expect( 'plugin_dir_url' )
            ->once();
            Functions\expect( 'plugin_basename' )
            ->once();
    }
    public function test_addAdminPages() {
        $this->extend();
        $Admin=new Admin();
        Functions\expect( 'add_submenu_page' )
        ->once()
        ->with('options-general.php',
        'IceTable Setting',
        'IceTable Setting',
        'manage_options',
        'icetable_plugin',
        [ $Admin, 'adminIndex' ]);
        
        $Admin->addAdminPages();
    }
    public function test_setupFields() {
        $this->extend();
        $Admin=new Admin();
        Functions\expect( 'add_settings_field' )
        ->once()
        ->with('api_link',
        'Your Domain/',
        [ $Admin, 'fieldCallback' ],
        'icetable_fields',
        'our_first_section');
        
        $Admin->setupFields();
    }
    public function test_fieldCallback() {
        $this->extend();
        Functions\expect( 'esc_attr' )
            ->once();
            Functions\expect( 'get_option' )
            ->once()
            ->with('api_link');
        $Admin=new Admin();
        $Admin->fieldCallback();
    }
}
