<?php

function your_tpl_add_link_atts($atts)
{
    if ($atts['aria-current'] == 'page') {
        $atts['class'] = "nav-link active";
    } else {
        $atts['class'] = "nav-link";
    }
    return $atts;
}

/**
 * your_tpl_check_filetype_and_ext
 *
 * @param  mixed $data
 * @param  mixed $file
 * @param  mixed $filename
 * @param  mixed $mimes
 * @return void
 */
function your_tpl_check_filetype_and_ext($data, $file, $filename, $mimes)
{

    global $wp_version;
    if ($wp_version !== '4.7.1') {
        return $data;
    }

    $filetype = wp_check_filetype($filename, $mimes);

    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
}

/**
 * your_tpl_mime_types
 *
 * @param  mixed $mimes
 * @return void
 */
function your_tpl_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
