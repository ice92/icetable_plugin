<?php

/**
 * Description: Class file for wp admin setting menu for plugin setting
 * PHP Version: 7.2.6
 *
 * @category PHP_File
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */

declare(strict_types=1);

namespace Inc\Pages;

use Inc\Base\BaseController;

/**
 * Description: Class for wp admin setting menu for plugin setting
 *
 * @category PHP_Class
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */
class Admin extends BaseController
{
    /**
     * Register class as a service
     *
     * @return null
     */
    public function register()
    {
        add_action('admin_menu', [ $this, 'addAdminPages' ]);
        add_action('admin_init', [ $this, 'setupSections' ]);
        add_action('admin_init', [ $this, 'setupFields' ]);
        register_setting('icetable_fields', 'api_link');
    }
    /**
     * Add submenu in wp admin general setting
     *
     * @return null
     */
    public function addAdminPages()
    {
        add_submenu_page(
            'options-general.php',
            'IceTable Setting',
            'IceTable Setting',
            'manage_options',
            'icetable_plugin',
            [ $this, 'adminIndex' ]
        );
    }
    /**
     * Generate setting and option page
     *
     * @return null
     */
    public function adminIndex()
    {
        ?>
    <div class="wrap">
        <h2>IceTable Settings</h2>
        <form method="post" action="options.php">
            <?php
                settings_fields('icetable_fields');
            do_settings_sections('icetable_fields');
            submit_button();
            ?>
        </form>
    </div> 
        <?php
    }
    /**
     * Add a setting section
     *
     * @return null
     */
    public function setupSections()
    {
        add_settings_section(
            'our_first_section',
            'Custom API Link',
            [ $this, 'sectionCallback' ],
            'icetable_fields'
        );
    }
    /**
     * Setting section callback
     *
     * @return null
     */
    public function sectionCallback()
    {
        echo 'Change your API Link address';
    }
    /**
     * Add setting custom field
     *
     * @return null
     */
    public function setupFields()
    {
        add_settings_field(
            'api_link',
            'Your Domain/',
            [ $this, 'fieldCallback' ],
            'icetable_fields',
            'our_first_section'
        );
    }
    /**
     * Setting custom field callback
     *
     * @return null
     */
    public function fieldCallback()
    {
        echo '<input name="api_link" id="api_link" type="text" value="' .
                esc_attr(get_option('api_link')) . '" />';
    }
}
