<?php

/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Shortcodes\ShortcodeController;

class HideCookieShortcode extends ShortcodeController
{

    public function register()
    {

        add_shortcode('hideforsimplecookie', [$this, 'hideforCookie']);

        add_action('wp_enqueue_scripts', [$this, 'localizeVars']);
    }

    public function hideforCookie($atts, $content)
    {
        $this->params = shortcode_atts($this->params, $atts, 'hideforsimplecookie');

        if ($this->checkCookie($atts)) {
            return;
        }

        return do_shortcode($content);
    }

    public function checkCookie($atts)
    {
        $cookies = $_COOKIE;
        parse_str($_SERVER["QUERY_STRING"], $query_string);

        if (!$atts['value']) {
            $needle = 'simplecookie_'.$atts['parameter'];
            // [hideforsimplecookie parameter="gender"]КОНТЕНТ[/hideforsimplecookie]
            // - отобразить КОНТЕНТ на странице, если у посетителя есть кука simplecookie_gender:”любое значение” ИЛИ в URL есть параметр "simplecookie_gender" с каким-то значением.
            if (array_key_exists($needle, $cookies) || array_key_exists($atts['parameter'], $query_string)) {
                return true;
            }
        }
        // [hideforsimplecookie parameter="gender" value="male"]КОНТЕНТ[/hideforsimplecookie]
        // - отобразить КОНТЕНТ на странице, если у посетителя есть кука simplecookie_gender:male ИЛИ в URL есть параметр gender=male.
        if ($atts['value']) {
            $needle = [$atts['parameter'] => $atts['value']];
            if (isset($_COOKIE['simplecookie_'.$atts['parameter']]) == $atts['value'] || count(array_intersect($needle,
                    $query_string)) != 0) {
                return true;
            }
        }
    }
}
