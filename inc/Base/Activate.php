<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
