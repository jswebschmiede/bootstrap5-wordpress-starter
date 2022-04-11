<?php

function your_tpl_widgets()
{
    register_sidebar([
        'name' => __('Sidebar', 'realone'),
        'id' => 'your_tpl_sidebar',
        'description' => esc_html__('Default sidebar to add all your widgets.', 'realone'),
        'before_widget' => '<section id="%1$s" class="widget %2$s p-2">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
