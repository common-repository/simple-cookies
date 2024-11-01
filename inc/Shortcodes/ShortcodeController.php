<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Base\BaseController;

class ShortcodeController extends BaseController
{
    public $params = ['parameter' => '', 'value' => '', 'time' => ''];

    public $id = 1;

    public function localizeVars()
    {
        parse_str($_SERVER["QUERY_STRING"], $query_string);
        wp_localize_script('shortcode_front_js', 'shortCodeObj', [
            'id'          => 0,
            'queryString' => $query_string
        ]);
    }

    public static function setExpireDate($date)
    {
        $date = explode(' ', $date);
        $time = $date[1];
        $time_count = $date[0];
        $expire = '';

        switch ($time) {
            case 'min':
                $expire = strtotime($time_count.' min');
                break;
            case 'h':
                $expire = strtotime($time_count.' hours');
                break;
            case 'd':
                $expire = strtotime($time_count.' days');
                break;
            case 'w':
                $expire = strtotime($time_count.' week');
                break;
            case 'm':
                $expire = strtotime($time_count.' month');
                break;
            case 'y':
                $expire = strtotime($time_count.' year');
                break;
        }

        return gmdate('D, j M Y H:i:s', $expire);
    }

}
