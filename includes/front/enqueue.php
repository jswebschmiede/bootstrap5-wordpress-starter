<?php

function your_tpl_enqueue()
{
    $uri = get_theme_file_uri();
    $version = REAL_DEV_MODE ? time() : false;

    wp_register_style('your_tpl_app', $uri . '/assets/css/main.css', array(), $version, 'all');
    wp_register_script('your_tpl_app', $uri . '/assets/js/main.bundle.js', array('jquery'), $version, true);

    wp_enqueue_style('your_tpl_google_fonts');
    wp_enqueue_style('your_tpl_app');
    wp_enqueue_script('your_tpl_app');
}
