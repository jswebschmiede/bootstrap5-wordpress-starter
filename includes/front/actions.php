<?php

function your_tpl_load_theme_textdomain()
{
    load_theme_textdomain('your_tpl', get_template_directory() . '/languages');
}

/**
 * your_tpl_fix_svg
 *
 * @return void
 */
function your_tpl_fix_svg()
{
    echo '<style type="text/css">
          .attachment-266x266, .thumbnail img {
               width: 100% !important;
               height: auto !important;
          }
          </style>';
}
