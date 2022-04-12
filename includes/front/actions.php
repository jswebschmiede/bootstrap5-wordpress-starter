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

/**
 * your_tpl_add_custom_body_open_code
 *
 * @return void
 */
function your_tpl_add_custom_body_open_code()
{
    echo '
     <div class="spinner-wrapper justify-content-center align-items-center">
          <div class="spinner-border text-primary" role="status">
          <span class="visually-hidden">Loading...</span>
          </div>
     </div>
     ';
}
