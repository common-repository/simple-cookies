<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Base;

use Simple_Cookies\Base\BaseController;

class SettingsLinks extends BaseController
{
    public function register()
    {
        add_filter("plugin_action_links_$this->plugin", [$this, 'settings_link']);
    }

    public function settings_link($links)
    {
        $settings_link = '<a href="admin.php?page=simple_cookies">Settings</a>';
        array_push($links, $settings_link);
        return $links;
    }
}
