<?php

/* Enqueues and registers all stylesheets and scripts */
function ap_enqueue(){


    /*--------------------*\
            Styles
    \*--------------------*/
    //Register styles
    wp_register_style('ap_style', get_stylesheet_uri(), array('ap_bootstrap_css'));
    // wp_register_style('ap_bootstrap_css', get_template_directory_uri()."/lib/bootstrap-4.3.1-dist/css/bootstrap.min.css");

    wp_register_style('ap_bootstrap_css', get_template_directory_uri()."/lib/bootstrap-4.1.3/custom-bootstrap.css");
    wp_register_style('ap_fontawesome', "https://use.fontawesome.com/releases/v5.1.0/css/all.css",array('ap_style'));

    // Enqueue styles
    wp_enqueue_style('ap_style');
    wp_enqueue_style('ap_bootstrap_css');
    wp_enqueue_style('ap_fontawesome');


    /*--------------------*\
            Scripts
    \*--------------------*/
    wp_enqueue_script('jquery');
    wp_register_script('ap_bootstrap_js', get_template_directory_uri()."/lib/bootstrap-4.3.1/dist/js/bootstrap.min.js",array('jquery'));
    wp_register_script('ap_script', get_template_directory_uri()."/js/script.js",array('jquery','ap_bootstrap_js'));

    wp_enqueue_script('ap_bootstrap_js');
    wp_enqueue_script('ap_script');


}


 ?>
