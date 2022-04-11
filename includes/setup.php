<?php

function your_tpl_setup_theme()
{
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('woocommerce');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    load_theme_textdomain('your_tpl', get_template_directory() . '/language');
}
