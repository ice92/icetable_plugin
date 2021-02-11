<?php

/**
 * Plugin Name: IceTable Plugin
 * Description: A simple WP Plugin to activate endpoint table for a JSON users file call from https://jsonplaceholder.typicode.com/users Default api link : /api/icetable eg. www.myweb.com/api/icetable       
 * Author: Imam Arief Putrajaya
 * Version: 1.0.0
 * PHP Version: 7.2.6
 * 
 * @category WP_Plugin
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */

/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.

    Copyright 2020-2025 Inpside, Inc.
*/

// Abort direct file access
defined('ABSPATH') or die;
// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    include_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Activation plugin method
 *
 * @return null
 */
function activateIceTablePlugin()
{
    Inc\Base\Activate::activ();
}
register_activation_hook(__FILE__, 'activateIceTablePlugin');

/**
 * Deactivation plugin method
 *
 * @return null
 */
function deactivateIceTablePlugin()
{

    Inc\Base\Deactivate::deactiv();
}
register_deactivation_hook(__FILE__, 'deactivateIceTablePlugin');
// Initialize all the code classes of the plugin
if (class_exists('Inc\\Init')) {
    Inc\Init::registerServices();
}


