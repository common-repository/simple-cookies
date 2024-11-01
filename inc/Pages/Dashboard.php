<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Pages;

use Simple_Cookies\Api\SettingsApi;
use Simple_Cookies\Base\BaseController;
use Simple_Cookies\Api\Callbacks\AdminCallbacks;

class Dashboard extends BaseController
{
    public $settings;

    public $callbacks;

    public $pages = [];

    public function register()
    {
        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSettings();

        $this->settings->addPages($this->pages)->register();

        add_action("load-post-new.php", [$this, 'addHelpTab']);
        add_action("load-post.php", [$this, 'addHelpTab']);
        do_action("load-widgets.php", [$this, 'addHelpTab']);
    }

    public function setPages()
    {
        $this->pages = [
            [
                'page_title' => 'Simple Cookies',
                'menu_title' => 'Simple Cookies',
                'capability' => 'manage_options',
                'menu_slug'  => 'simple_cookies',
                'callback'   => [$this->callbacks, 'adminDashboard'],
                'icon_url'   => $this->plugin_url.'assets/images/simple-cookies-logo.svg',
                'position'   => 110
            ]
        ];
    }

    public function setSettings()
    {
        $args = [
            [
                'option_group' => 'simple_cookies_plugin_settings',
                'option_name'  => 'simple_cookies',
            ]
        ];

        $this->settings->setSettings($args);
    }

    public function addHelpTab()
    {
        get_current_screen()->add_help_tab(
            [
                'id'       => 'simple_cookies_help',
                'title'    => 'Simple Cookies',
                'callback' => [$this->callbacks, 'helpTab'],
            ]
        );
    }
}
