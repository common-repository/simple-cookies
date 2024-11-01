<?php

/**
 * @package  SimpleCookies
 */

namespace Simple_Cookies\Base;

use Simple_Cookies\Base\BaseController;

class Enqueue extends BaseController
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdmin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueueFront']);
    }

    public function enqueueAdmin()
    {
        // enqueue all our scripts
        wp_enqueue_style('simplecookie_css', $this->plugin_url.'assets/css/simple-cookie.admin.css');
        wp_enqueue_script('simplecookie_js', $this->plugin_url.'assets/js/simple-cookie.admin.js');
        wp_localize_script('simplecookie_js', 'sc_tinyMCEtranslate', [
            'hoverTitle'  => __('Вставить шорткод Simple Cookies', 'simple-cookies'),
            'boxTitle'    => __('Задайте параметры Cookie', 'simple-cookies'),
            'name'        => __('Имя', 'simple-cookies'),
            'value'       => __('Значение', 'simple-cookies'),
            'lifeTime'    => __('Время жизни в', 'simple-cookies'),
            'minutes'     => __('минутах', 'simple-cookies'),
            'hours'       => __('часах', 'simple-cookies'),
            'days'        => __('днях', 'simple-cookies'),
            'weeks'       => __('неделях', 'simple-cookies'),
            'months'      => __('месяцах', 'simple-cookies'),
            'years'       => __('годах', 'simple-cookies'),
            'showContent' => __('Отобразить контент', 'simple-cookies'),
            'hideContent' => __('Скрыть контент', 'simple-cookies'),
        ]);
    }

    public function enqueueFront()
    {
        global $post;
        if (has_shortcode($post->post_content, 'addsimplecookie') || has_shortcode($post->post_content,
                'removesimplecookie')) {
            wp_register_script('shortcode_front_js', $this->plugin_url.'/assets/js/simple-cookie.js');
            wp_enqueue_script('shortcode_front_js');
        }
    }
}
