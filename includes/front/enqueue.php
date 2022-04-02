<?php

function realone_enqueue()
{
    $uri = get_theme_file_uri();
    $version = REAL_DEV_MODE ? time() : false;

    wp_register_style('realone_google_fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap', array(), $version);
    wp_register_style('realone_app', $uri . '/assets/css/main.css', array(), $version, 'all');
    wp_register_script('realone_app', $uri . '/assets/js/main.bundle.js', array('jquery'), $version, true);

    wp_enqueue_script('jquery');
    wp_enqueue_style('realone_google_fonts');
    wp_enqueue_style('realone_app');
    wp_enqueue_script('realone_app');
}
