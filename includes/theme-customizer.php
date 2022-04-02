<?php

function realone_customizer_register($wp_customize)
{
    $wp_customize->add_setting('realone_facebook_handle', [
        'default' => ''
    ]);

    $wp_customize->add_section('realone_social_section', [
        'title' => __('Social Settings', 'realone'),
        'priority' => 30
    ]);

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'realone_social_facebook_input',
        array(
            'label'          => __('Facebook Link', 'realone'),
            'section'        => 'realone_social_section',
            'settings'       => 'realone_facebook_handle',
            'type'           => 'text',
        )
    ));
}
