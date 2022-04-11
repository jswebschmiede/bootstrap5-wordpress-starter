<?php

function your_tpl_customizer_register($wp_customize)
{
    $wp_customize->add_setting('your_tpl_facebook_handle', [
        'default' => ''
    ]);

    $wp_customize->add_section('your_tpl_social_section', [
        'title' => __('Social Settings', 'your_tpl'),
        'priority' => 30
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'your_tpl_social_facebook_input',
        array(
            'label'          => __('Facebook Link', 'your_tpl'),
            'section'        => 'your_tpl_social_section',
            'settings'       => 'your_tpl_facebook_handle',
            'type'           => 'text',
        )
    ));
}
