<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Shortcodes\ShortcodeController;

class RemoveCookieShortcode extends ShortcodeController
{

    public function register()
    {
        add_shortcode('removesimplecookie', [$this, 'rmCookie']);

        add_action('wp_enqueue_scripts', [$this, 'localizeVars']);

    }

    public function rmCookie($atts)
    {
        $this->params = shortcode_atts($this->params, $atts, 'removesimplecookie');

        add_action('wp_enqueue_scripts', function () use ($atts) {
            if ($_COOKIE['simplecookie_'.$atts['parameter']] === $atts['value']) {
                self::injectScript($this->params, $this->id++);
            }
            if (!$atts['value']) {
                self::injectScript($this->params, $this->id++);
            }
        });

    }

    public static function injectScript($atts, $id)
    {

        wp_add_inline_script('shortcode_front_js',
            'document.addEventListener("DOMContentLoaded", () => {
            var rmCookie'.$id.'  = {
                parameter: "'.$atts['parameter'].'",
                value: "remove",
            }
            shortCodeObj.id++;
    
            function removeCookie(rmCookie){
                return document.cookie = \'simplecookie_\'+rmCookie.parameter+\'=\'+rmCookie.value+\'; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT\';
            }
    
            for ( let i = 0; i<= shortCodeObj.id; i++ ){
                removeCookie(rmCookie'.$id.');
            }
        })');
    }

}
