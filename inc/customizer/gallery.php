<?php
function ap_gallery_customizer_section($wp_customize){

    /*--------------------*\
            Settings
    \*--------------------*/
    $wp_customize->add_setting('ap_gallery_end_msg_handle',array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    /*--------------------*\
            Section
    \*--------------------*/
    $wp_customize->add_section('ap_gallery_section',array(
        'title' => esc_html__('Gallery','artportfolio'),
        'priority' => 40,
        'panel' => 'artportfolio'
    ));


    /*--------------------*\
            Controls
    \*--------------------*/


    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_gallery_end_msg_input',
            array(
                'label'          => esc_html__( 'Besked', 'artportfolio' ),
                'section'        => 'ap_gallery_section',
                'settings'       => 'ap_gallery_end_msg_handle',
            )
        )
    );

}

?>
