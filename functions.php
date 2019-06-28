<?php


/*--------------------*\
        Setup
\*--------------------*/


/*--------------------*\
        Includes
\*--------------------*/

include(get_template_directory().'/inc/enqueue.php');
include(get_template_directory().'/inc/setup.php');
require_once(get_template_directory().'/lib/bs4navwalker.php');

/*--------------------*\
        Hooks
\*--------------------*/
add_action('wp_enqueue_scripts','ap_enqueue');

//Register nav menu
add_action('after_setup_theme','ap_setup_theme');

/*--------------------*\
        Shortcode
\*--------------------*/


?>
