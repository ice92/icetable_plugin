<?php

/**
 * Description: Class file for api link service
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
 * Description: Class for api link service
 *
 * @category PHP_Class
 * @package  IceTablePlugin
 * @author   Imam Arief Putrajaya <ice.codename@gmail.com>
 * @license  GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link     https://ice92@bitbucket.org/ice92/icetable_plugin.git
 */
class ApiLinks extends BaseController
{
    private $apiLink;
    /**
     * Register class as a service
     *
     * @return null
     */
    public function register()
    {
        $this->apiLink = get_option('api_link', 'api/icetable');
        register_activation_hook(__FILE__, 'apiTableLink');
        add_action('init', [ $this, 'apiTableLink' ]);
        add_filter('request', [ $this, 'apiRequest' ]);
        add_action('template_redirect', [ $this, 'apiRedirect' ]);
    }
    /**
     * Add new root endpoint
     *
     * @return null
     */
    public function apiTableLink()
    {
        add_rewrite_endpoint($this->apiLink, 64);
        flush_rewrite_rules();
    }
    /**
     * Setter method for apilink variable
     *
     * @param string $apiLink string for a custom apilink
     * @return null
     */
    public function setApiLink(string $apiLink)
    {
        $this->apiLink = $apiLink;
    }
    /**
     * Call the endpoint API pages with its custom css and js
     *
     * @return null
     */
    public function apiRedirect()
    {
        if (get_query_var($this->apiLink)) {
            include_once $this->pluginPath . 'templates/api.php';
            exit();
        }
    }
    
    /**
     * Filter url request method
     *
     * @param array $vars an empty array
     *
     * @return array|null
     */
    public function apiRequest(array $vars)
    {
        if (isset($vars[$this->apiLink])) {
            $vars[$this->apiLink] = true;
        }
        return $vars;
    }
}
