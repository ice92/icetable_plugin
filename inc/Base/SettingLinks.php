<?php

/**
 * Description: Class file for plugin setting link
 * PHP Version: 7.2.6
 *
 * @category PHP_File
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */

declare(strict_types=1);

namespace Inc\Base;

use Inc\Base\BaseController;

/**
 * Description: Class for plugin setting link
 *
 * @category PHP_Class
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */
class SettingLinks extends BaseController
{
    /**
     * Register class as a service
     *
     * @return null
     */
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [ $this, 'settingsLink' ]);
    }
    /**
     * Filter url request method
     *
     * @param array<string> $links an empty array
     *
     * @return array<string> $links an array for settings link
     *
     * phpcs:disable Inpsyde.CodeQuality.ReturnTypeDeclaration
     * phpcs:disable Inpsyde.CodeQuality.ArgumentTypeDeclaration
     */
    public function settingsLink($links)
    {
        $settingsLink = '<a href="options-general.php?' .
                        'page=icetable_plugin">Settings</a>';
        array_push($links, $settingsLink);
        return $links;
    }
}
