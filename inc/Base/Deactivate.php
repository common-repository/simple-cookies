<?php
/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Base;

class Deactivate
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
