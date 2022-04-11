<?php

/**
 * register_your_tpl_settings_menu
 *
 * @return void
 */
function register_your_tpl_settings_menu()
{
    add_menu_page(
        __("your_tpl Settings", "your_tpl"),
        __("your_tpl", "your_tpl"),
        "manage_options",
        "your_tpl-settings",
        "your_tpl_settings_page",
        "dashicons-admin-home"
    );
}
