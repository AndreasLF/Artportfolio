<?php
function ap_bio_customizer_section($wp_customize){

    /*--------------------*\
            Settings
    \*--------------------*/
    $wp_customize->add_setting('ap_bio_name_handle',array(
        'default' => ''
    ));

    $wp_customize->add_setting('ap_bio_social_handle',array(
        'default' => 'none'
    ));

    $wp_customize->add_setting('ap_bio_image_handle',array(
        'default' => ''
    ));


    /*--------------------*\
            Section
    \*--------------------*/
    $wp_customize->add_section('ap_bio_section',array(
        'title' => esc_html__('Bio','artportfolio'),
        'priority' => 40,
        'panel' => 'artportfolio'
    ));


    /*--------------------*\
            Controls
    \*--------------------*/


    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_bio_name_input',
            array(
                'label'          => esc_html__( 'Navn', 'artportfolio' ),
                'section'        => 'ap_bio_section',
                'settings'       => 'ap_bio_name_handle',
            )
        )
    );

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_bio_social_input',
            array(
                'label'          => esc_html__( 'Positionen af sociale links på siden', 'artportfolio' ),
                'section'        => 'ap_bio_section',
                'settings'       => 'ap_bio_social_handle',
                'type'           => 'radio',
		            'choices'        => array(
                    'none'  => esc_html__('Ingen links','artportfolio'),
              			'left'  => esc_html__('Under billedet','artportfolio'),
              			'right' => esc_html__('Under teksten','artportfolio'),
            		),
            )
        )
    );

    $wp_customize->add_control(
           new WP_Customize_Image_Control(
            $wp_customize,
            'ap_bio_image_input',
            array(
                'label'      => esc_html__( 'Upload et profilbillede', 'artportfolio' ),
                'section'    => 'ap_bio_section',
                'settings'   => 'ap_bio_image_handle',
            )
          )

    );

}

?>
