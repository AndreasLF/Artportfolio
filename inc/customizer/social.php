<?php
function ap_social_customizer_section($wp_customize){

    /*--------------------*\
            Settings
    \*--------------------*/

    $wp_customize->add_setting('ap_facebook_handle',array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    $wp_customize->add_setting('ap_twitter_handle',array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    $wp_customize->add_setting('ap_email_handle',array(
        'default' => '',
        'sanitize_callback' => 'sanitize_email' //removes all invalid characters
    ));

    $wp_customize->add_setting('ap_instagram_handle',array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    $wp_customize->add_setting('ap_linkedin_handle',array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    $wp_customize->add_setting('ap_phone_handle',array(
        'default' => '',
        'sanitize_callback' => 'absint' //converts value to a non-negative integer
    ));

    /*--------------------*\
            Section
    \*--------------------*/
    $wp_customize->add_section('ap_social_section',array(
        'title' => 'Social',
        'priority' => 30,
        'panel' => 'artportfolio'
    ));


    /*--------------------*\
            Controls
    \*--------------------*/

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_facebook_input',
            array(
                'label'          => esc_html__( 'Facebook', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_facebook_handle',
            )
        )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_twitter_input',
            array(
                'label'          => esc_html__( 'Twitter', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_twitter_handle',
            )
        )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_email_input',
            array(
                'label'          => esc_html__( 'Email addresse', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_email_handle',
            )
        )
    );


    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_instagram_input',
            array(
                'label'          => esc_html__( 'Instagram', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_instagram_handle',
            )
        )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_linkedin_input',
            array(
                'label'          => esc_html__( 'LinkedIn', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_linkedin_handle',
            )
        )
    );

     $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_snapchat_input',
            array(
                'label'          => esc_html__( 'Snapchat', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_snapchat_handle',
            )
        )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_social_phone_input',
            array(
                'label'          => esc_html__( 'Telefon', 'artportfolio' ),
                'section'        => 'ap_social_section',
                'settings'       => 'ap_phone_handle',
            )
        )
    );

}

?>
