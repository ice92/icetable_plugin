<?php

/**
 * Description: Class file for initialization of plugin
 * PHP Version: 7.2.6
 *
 * @category PHP_File
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */

declare(strict_types=1);

namespace Inc;

/**
 * Description: Class for initialization of plugin
 *
 * @category PHP_Class
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */
final class Init
{

    /**
     * Store all the classes inside an array
     *
     * @return array<class> Full list of classes
     *
     * phpcs:disable Inpsyde.CodeQuality.ReturnTypeDeclaration
     * phpcs:disable Inpsyde.CodeQuality.ArgumentTypeDeclaration
     */
    public static function services()
    {
        return [
            Base\ApiLinks::class, Pages\Admin::class, Base\SettingLinks::class,
        ];
    }

    /**
     * Loop through the classes, initialize them,
     * and call the register() method if it exists
     *
     * @return null
     */
    public static function registerServices()
    {
        foreach (self::services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    /**
     * Initialize the class
     *
     * @param object $class
     * class from the services array
     *
     * @return object instance  new instance of class
     */
    private static function instantiate($class)
    {
        return new $class();
    }
}
