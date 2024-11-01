<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Shortcodes;

use Simple_Cookies\Shortcodes\ShortcodeController;

class AddCookieShortcode extends ShortcodeController
{
    public function register()
    {

        add_shortcode('addsimplecookie', [$this, 'addCookie']);

        add_action('wp_enqueue_scripts', [$this, 'localizeVars']);
    }

    public function addCookie($atts)
    {
        $this->params = shortcode_atts($this->params, $atts, 'addsimplecookie');
        $this->params['time'] = self::setExpireDate($atts['time']);
        add_action('wp_enqueue_scripts', function () {
            self::injectScript($this->params, $this->id++);
        });
    }

    public static function injectScript($atts, $id)
    {
        if ($atts['value'] != 'any'):

            wp_add_inline_script('shortcode_front_js',
                'document.addEventListener("DOMContentLoaded", () => {
            var addCookie'.$id.'  = {
                parameter: "'.$atts['parameter'].'",
                value: "'.$atts['value'].'",
                time: "'.$atts['time'].'",
            }
            shortCodeObj.id++;
            
            console.log("add cookie");
    
            function setAddCookie(queryString, addCookie){
                return document.cookie = \'simplecookie_\'+addCookie.parameter+\'=\'+addCookie.value+\'; path=/; expires=\'+addCookie.time;
            }
    
            for ( let i = 0; i<= shortCodeObj.id; i++ ){
                setAddCookie(shortCodeObj.queryString, addCookie'.$id.');
            }
        })');
        else:
            wp_add_inline_script('shortcode_front_js',
                'document.addEventListener("DOMContentLoaded", () => {
                var addCookie'.$id.'  = {
                    parameter: "'.$atts['parameter'].'",
                    time: "'.$atts['time'].'",
                }
                shortCodeObj.id++;
    
                function setAddCookie(queryString, addCookie){
                    for (let [key, value] of Object.entries(queryString)) {
                        console.log(value);
                        if( key == addCookie.parameter ){
    
                            return document.cookie = \'simplecookie_\'+addCookie.parameter+\'=\'+value+\'; path=/; expires=\'+addCookie.time;
                        }
                    }
                }
    
                for ( let i = 0; i<= shortCodeObj.id; i++ ){
                    setAddCookie(shortCodeObj.queryString, addCookie'.$id.');
                }
            })');
        endif;
    }

}
