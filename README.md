## ICE Table WP Plugin

### Simple endpoint table for your JSON

A simple WP Plugin to activate endpoint table for a JSON users file from https://jsonplaceholder.typicode.com/users

#### Features:

* Simple users table
* Custom api link
* User detail with location on map
* SessionStorage cache for offline access

#### How to install:
* Extract the .zip file to your wordpress plugin directory (root\wp-content\plugins)
* Run composer dump-autoload on the plugin directory
* Enjoy the plugin

#### How to install(Dev):
* Extract the .zip file to your wordpress plugin directory (root\wp-content\plugins)
* Run composer install on the plugin directory
* Run composer dump-autoload on the plugin directory
* Enjoy the plugin

#### FAQ
* My custom endpoint don't work on fresh wordpress installation, what should I do?
  Answer : It is probably you are using default/plain permalinks setting which may conflict with the custom endpoint. Change your permalink setting to other
  
#### How to use:
After activate the plugin, open your URL end with api link ( default = /api/icetable )
* eg. www.myweb.com/api/icetable
API link can be set in Setting menu on sub menu "IceTable setting".

To get the user detail click on the id ,name or username columns

#### Offline Capability:
Offline access is available by loading data from session storage. Data is stored after first external (online) JSON request.
If session is expired(1 hour) or external JSON request never occured, offline access is disable and notification appear.

##### Composer Packages
* dev :
    * "brain/monkey": "~2.0.0" (Unit test tool)
    * "inpsyde/php-coding-standards": "^1.0@dev" (Inpsyde code standards)
    * "phpunit/phpunit": "8.5.x-dev" (phpunit)

