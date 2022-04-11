<?php

/**
 * your_tpl_admin_enqueue
 *
 * @return void
 */
function your_tpl_admin_enqueue()
{
    if (!isset($_GET['page']) || $_GET['page'] != 'your_tpl-settings') {
        return;
    }

    $uri = get_theme_file_uri();

    wp_register_style('your_tpl_bootstrap', $uri . '/includes/admin/assets/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('your_tpl_bootstrap');
}
