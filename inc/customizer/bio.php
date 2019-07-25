<?php
function ap_bio_customizer_section($wp_customize){

    /*--------------------*\
            Settings
    \*--------------------*/

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
        'title' => 'Bio',
        'priority' => 40,
        'panel' => 'artportfolio'
    ));


    /*--------------------*\
            Controls
    \*--------------------*/

    $wp_customize->add_control(
         new WP_Customize_Control(
            $wp_customize,
            'ap_bio_social_input',
            array(
                'label'          => __( 'Social links position on bio site', 'artportfolio' ),
                'section'        => 'ap_bio_section',
                'settings'       => 'ap_bio_social_handle',
                'type'           => 'radio',
		            'choices'        => array(
                    'none'  => 'No social links',
              			'left'  => 'Below picture',
              			'right' => 'Below text',
            		),
            )
        )
    );

    $wp_customize->add_control(
           new WP_Customize_Image_Control(
            $wp_customize,
            'ap_bio_image_input',
            array(
                'label'      => __( 'Upload a profile picture', 'artportfolio' ),
                'section'    => 'ap_bio_section',
                'settings'   => 'ap_bio_image_handle',
            )
          )

    );

}

?>
