<?php

function ap_customize_register($wp_customize){
    //Creates a new panel
    $wp_customize->add_panel('artportfolio',array(
      'title' => __('Artportfolio','artportfolio'),
      'description' => '<p>'.__('This panel is used for customizing the theme','artportfolio').'</p>',
      'priority' => 160
    ));

    ap_social_customizer_section($wp_customize);
    ap_bio_customizer_section($wp_customize);

    // ap_color_customizer_section($wp_customize);
    // ap_misc_customizer_section($wp_customize);
    // ap_footer_customizer_section($wp_customize);

    //Change name of the tag_line section (Site Identiy)
    $wp_customize->get_section('title_tagline')->title = 'General';

    //Removes tagline support
    $wp_customize->remove_control('blogdescription');

    // echo '<pre>';
    // var_dump($wp_customize);
    // echo '</pre>';
}


?>
