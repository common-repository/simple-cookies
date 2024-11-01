<?php
/**
 * @package  SimpleCookies
 */
/*
Plugin Name: Simple Cookies
Plugin URI: https://karpov.expert/simple-cookies/
Description: Allows you to implement the functionality of dynamic content and progressive profiling on the site and work with cookies for those marketers who are not a web developer.
Version: 1.0.8
Author: Anton Zhary, Pavel Karpov
Author URI:
License: GPLv2 or later
Text Domain: simple-cookies
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2005-2015 Automattic, Inc.
*/

// If this file is called firectly, abort!!!
defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}


/**
 * The code that runs during plugin activation
 */
function activate_simple_cookies_plugin()
{
    Simple_Cookies\Base\Activate::activate();
}

register_activation_hook(__FILE__, 'activate_simple_cookies_plugin');

/**
 * The code that runs during plugin deactivation
 */
function deactivate_simple_cookies_plugin()
{
    Simple_Cookies\Base\Deactivate::deactivate();
}

register_deactivation_hook(__FILE__, 'deactivate_simple_cookies_plugin');

/**
 * Initialize all the core classes of the plugin
 */
if (class_exists('Simple_Cookies\\Init')) {
    Simple_Cookies\Init::register_services();
}
