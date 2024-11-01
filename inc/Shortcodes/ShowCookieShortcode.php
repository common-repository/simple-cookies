<?php

/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Shortcodes\ShortcodeController;

class ShowCookieShortcode extends ShortcodeController
{

    public function register()
    {

        add_shortcode('showforsimplecookie', [$this, 'showforCookie']);

        add_action('wp_enqueue_scripts', [$this, 'localizeVars']);
    }

    public function showforCookie($atts, $content)
    {
        $this->params = shortcode_atts($this->params, $atts, 'showforsimplecookie');

        if (!$this->checkCookie($atts)) {
            return;
        }

        return do_shortcode($content);
    }

    public function checkCookie($atts)
    {
        $cookies = $_COOKIE;

        parse_str($_SERVER["QUERY_STRING"], $query_string);

        if (is_admin()) {
            return true;
        }

        if (!$atts['value']) {
            $needle = 'simplecookie_'.$atts['parameter'];
            // [showforsimplecookie parameter="gender"]КОНТЕНТ[/showforsimplecookie]
            // - отобразить КОНТЕНТ на странице, если у посетителя есть кука simplecookie_gender:”любое значение” ИЛИ в URL есть параметр "simplecookie_gender" с каким-то значением.
            if (array_key_exists($needle, $cookies) || array_key_exists($atts['parameter'], $query_string)) {
                return true;
            }
        }
        // [showforsimplecookie parameter="gender" value="male"]КОНТЕНТ[/showforsimplecookie]
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
