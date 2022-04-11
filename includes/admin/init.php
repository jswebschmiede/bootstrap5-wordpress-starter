<?php
include(get_theme_file_path('/includes/admin/option-page.php'));
include(get_theme_file_path('/includes/admin/admin-menu.php'));
include(get_theme_file_path('/includes/admin/enqueue.php'));
include(get_theme_file_path('/includes/admin/process/save-options.php'));

add_action("admin_menu", "register_your_tpl_settings_menu");
add_action('admin_enqueue_scripts', 'your_tpl_admin_enqueue');
add_action('admin_post_your_tpl_save_options', 'your_tpl_save_options');
