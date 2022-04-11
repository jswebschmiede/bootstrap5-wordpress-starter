<?php

// Setup
define('REAL_DEV_MODE', true);

// Includes
// include(get_theme_file_path('/includes/admin/init.php'));

include(get_theme_file_path('/includes/helpers.php'));
include(get_theme_file_path('/includes/front/enqueue.php'));
include(get_theme_file_path('/includes/front/filter.php'));
include(get_theme_file_path('/includes/front/actions.php'));
include(get_theme_file_path('/includes/setup.php'));
include(get_theme_file_path('/includes/widgets.php'));
include(get_theme_file_path('/includes/theme-customizer.php'));
include(get_theme_file_path('/includes/libs/class-wp-bootstrap-navwalker'));

// Hooks
add_action('wp_enqueue_scripts', 'your_tpl_enqueue');
add_action('after_setup_theme', 'your_tpl_setup_theme');
add_action('widgets_init', 'your_tpl_widgets');
add_action('customize_register', 'your_tpl_customizer_register');
add_action('admin_head', 'your_tpl_fix_svg');

// Filter
add_filter('nav_menu_link_attributes', 'your_tpl_add_link_atts');

// Allow SVG
add_filter('wp_check_filetype_and_ext', 'your_tpl_check_filetype_and_ext', 10, 4);
add_filter('upload_mimes', 'your_tpl_mime_types');

// Shortcodes