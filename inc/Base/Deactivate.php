<?php

/**
 * Description: Class file for deactivate the plugin
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

/**
 * Description: Class for deactivate the plugin
 *
 * @category PHP_Class
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */

class Deactivate
{
    /**
     * Deactivation plugin method
     *
     * @return null
     */
    public static function deactiv()
    {
        delete_option('api_link');
        flush_rewrite_rules();
    }
}
