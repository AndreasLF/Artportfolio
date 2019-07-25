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

//theme customizer
include(get_template_directory().'/inc/theme-customizer.php');
include(get_template_directory().'/inc/customizer/social.php');
include(get_template_directory().'/inc/customizer/bio.php');
include(get_template_directory().'/inc/customizer/frontpage.php');




/*--------------------*\
        Hooks
\*--------------------*/
add_action('wp_enqueue_scripts','ap_enqueue');

//Register nav menu
add_action('after_setup_theme','ap_setup_theme');

add_action('customize_register','ap_customize_register');


/*--------------------*\
        Shortcode
\*--------------------*/

function autoset_featured() {
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
        if (!$already_has_thumb)  {
        $attached_image = attachment_url_to_postid(get_post_meta( get_the_ID(), 'image' )[0]);
            if ($attached_image) {
                    set_post_thumbnail($post->ID, $attached_image);
            }
        }
}
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');

?>
