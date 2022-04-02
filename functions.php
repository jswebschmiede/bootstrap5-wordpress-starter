<?php

// Setup
define('REAL_DEV_MODE', true);

// Includes
include(get_theme_file_path('/includes/helpers.php'));
include(get_theme_file_path('/includes/front/enqueue.php'));
// include(get_theme_file_path('/includes/front/filter.php'));
include(get_theme_file_path('/includes/setup.php'));
include(get_theme_file_path('/includes/widgets.php'));
include(get_theme_file_path('/includes/theme-customizer.php'));
include(get_theme_file_path('/includes/bootstrap-5-wordpress-navbar-walker.php'));

// Hooks
add_action('wp_enqueue_scripts', 'realone_enqueue');
add_action('after_setup_theme', 'realone_setup_theme');
add_action('widgets_init', 'realone_widgets');
add_action('customize_register', 'realone_customizer_register');

// Filter
// add_filter('nav_menu_link_attributes', 'realone_add_link_atts');

// Shortcodes