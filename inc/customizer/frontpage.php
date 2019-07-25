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
        'title' => 'Frontpage',
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
                'label'          => __( 'Social links position on bio site', 'artportfolio' ),
                'section'        => 'ap_front_section',
                'settings'       => 'ap_front_image_choice_handle',
                'type'           => 'radio',
		            'choices'        => array(
                    'latest'  => 'Latest image in gallery',
              			'custom'  => 'Custom image (remember to pick an image)',
            		),
            )
        )
    );

    $wp_customize->add_control(
           new WP_Customize_Image_Control(
            $wp_customize,
            'ap_front_image_input',
            array(
                'label'      => __( 'Upload a custom front page picture (Choose "Custom image" above)', 'artportfolio' ),
                'section'    => 'ap_front_section',
                'settings'   => 'ap_front_image_handle',
            )
          )

    );

}

?>
