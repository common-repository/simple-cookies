<?php

/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Base\BaseController;

class AddButtonController extends BaseController
{
    public function register()
    {
//        add_action('admin_head', [$this, 'addButton']);
    }

    public function addButton()
    {
        if (!current_user_can('edit_posts') && !current_user_can('edit_pages')) {
            return;
        }
        if ('false' == get_user_option('rich_editing')) {
            return;
        }

        add_filter('mce_external_plugins', [$this, 'addTinymceScript']);
        add_filter('mce_buttons', [$this, 'registerButton']);
    }

    public function addTinymceScript($plugin_array)
    {
        $plugin_array['simple_cookies_button'] = $this->plugin_url.'assets/js/shortcode-button.js'; // true_mce_button - идентификатор кнопки
        return $plugin_array;
    }

    public function registerButton($buttons)
    {
        array_push($buttons, 'simple_cookies_button'); // идентификатор кнопки
        return $buttons;
    }
}
