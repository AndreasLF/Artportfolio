<?php
/*
* Enqueues and registers all stylesheets and scripts
*/
function ap_enqueue(){


    /*--------------------*\
            Styles
    \*--------------------*/
    //Register styles
    wp_register_style('ap_style', get_stylesheet_uri(), array('ap_bootstrap_css'));

    // wp_register_style('ap_bootstrap_css', get_template_directory_uri()."/lib/bootstrap-4.3.1-dist/css/bootstrap.min.css");
    wp_register_style('ap_bootstrap_css',     "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");

    // wp_register_style('ap_bootstrap_css', get_template_directory_uri()."/lib/bootstrap-4.1.3/custom-bootstrap.css");
    wp_register_style('ap_fontawesome', "https://use.fontawesome.com/releases/v5.1.0/css/all.css",array('ap_style'));
    wp_register_style('ap_gfonts', "https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap");

    // Enqueue styles
    wp_enqueue_style('ap_style');
    wp_enqueue_style('ap_bootstrap_css');
    wp_enqueue_style('ap_fontawesome');
    wp_enqueue_style('ap_gfonts');




    /*--------------------*\
            Scripts
    \*--------------------*/
    // Enqueue jquery
    wp_enqueue_script('jquery');

    //Hammer js
     wp_register_script('hammer_js','https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js',array('jquery'));
     wp_enqueue_script('hammer_js');
     wp_register_script('jquery_hammer_js',get_template_directory_uri().'/lib/jquery-hammer-js/jquery.hammer.js',array('jquery','hammer_js'));
     wp_enqueue_script('jquery_hammer_js');


     wp_register_script('masonry',get_template_directory_uri().'/lib/masonry/dist/masonry.pkgd.js',array('jquery','hammer_js'));


    //Register and enqueue bootstrap
    wp_register_script('ap_bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js',array('jquery'));
    wp_enqueue_script('ap_bootstrap_js');


    // Load gallery script if on the blog/gallery page
    if(is_home()){
      wp_register_script('masonry',get_template_directory_uri().'/lib/masonry/dist/masonry.pkgd.js',array('jquery','hammer_js'));
      wp_enqueue_script('masonry');

      // Gallery script
      wp_register_script('ap_gallery_script', get_template_directory_uri()."/js/gallery-script.js",array('jquery','ap_bootstrap_js', 'hammer_js', 'jquery_hammer_js', 'masonry','ap_ajax_pagination'));
      wp_enqueue_script('ap_gallery_script');

      // AJAX pagination
      global $wp_query;

      wp_register_script('ap_ajax_pagination', get_template_directory_uri()."/js/ajax-pagination-button.js",array('jquery','ap_bootstrap_js', 'hammer_js', 'jquery_hammer_js', 'masonry'));

      wp_enqueue_script('ap_ajax_pagination');

      wp_localize_script( 'ap_ajax_pagination', 'ajaxpagination', array(
           'ajaxurl' => admin_url( 'admin-ajax.php' ),
         ));
       // wp_localize_script( 'ap_gallery_script', 'ajaxpagination', array(
       //      'ajaxurl' => admin_url( 'admin-ajax.php' ),
       //    ));

    }


}
 ?>
