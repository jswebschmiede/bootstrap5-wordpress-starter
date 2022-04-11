<?php

/**
 * your_tpl_save_options
 *
 * @return void
 */
function your_tpl_save_options()
{
    if (!current_user_can('manage_options')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    check_admin_referer('your_tpl_options_verify');

    $your_tpl_opts = get_option('your_tpl_opts');
    $your_tpl_opts['your_tpl_sticky_header'] = absint($_POST['your_tpl_sticky_header']);
    $your_tpl_opts['your_tpl_featured_properties'] = absint($_POST['your_tpl_featured_properties']);
    $your_tpl_opts['your_tpl_regions_properties'] = absint($_POST['your_tpl_regions_properties']);

    update_option('your_tpl_opts', $your_tpl_opts);
    wp_redirect(admin_url('admin.php?page=your_tpl-settings&status=1'));
}
