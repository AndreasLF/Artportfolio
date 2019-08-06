<?php
function ap_front_customizer_section($wp_customize){

    /*--------------------*\
            Settings
    \*--------------------*/

    $wp_customize->add_setting('ap_front_image_choice_handle',array(
        'default' => 'latest'
    ));

    $wp_customize->add_setting('ap_front_image_handle',array(
        'default' => ''
    ));


    /*--------------------*\
            Section
    \*--------------------*/
    $wp_customize->add_section('ap_front_section',array(
        'title' => esc_html__('Forside','artportfolio'),
        'priority' => 10,
        'panel' => 'artportfolio'
    ));


    /*--------------------*\
            Controls
    \*--------------------*/

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_front_image_choice_input',
            array(
                'label'          => esc_html__( 'Forsidebillede', 'artportfolio' ),
                'section'        => 'ap_front_section',
                'settings'       => 'ap_front_image_choice_handle',
                'type'           => 'radio',
		            'choices'        => array(
                    'latest'  => esc_html__('Seneste billede fra galleriet','artportfolio'),
              			'custom'  => esc_html__('Tilpasset billede (Husk at vælge et billede)','artportfolio'),
            		),
            )
        )
    );

    $wp_customize->add_control(
           new WP_Customize_Image_Control(
            $wp_customize,
            'ap_front_image_input',
            array(
                'label'      => esc_html__( 'Upload tilpasset forsidebillede (Vælg "Tilpasset billede" ovenfor)', 'artportfolio' ),
                'section'    => 'ap_front_section',
                'settings'   => 'ap_front_image_handle',
            )
          )

    );


}

?>
