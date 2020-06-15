<?php
/*--------------------*\
        Setup
\*--------------------*/


/*--------------------*\
        Includes
\*--------------------*/
include(get_template_directory().'/inc/enqueue.php');
include(get_template_directory().'/inc/enqueue-admin.php');
include(get_template_directory().'/inc/setup.php');
require_once(get_template_directory().'/lib/bs4navwalker.php');

//theme customizer
include(get_template_directory().'/inc/theme-customizer.php');
include(get_template_directory().'/inc/customizer/social.php');
include(get_template_directory().'/inc/customizer/bio.php');
include(get_template_directory().'/inc/customizer/frontpage.php');
include(get_template_directory().'/inc/customizer/gallery.php');


include(get_template_directory().'/inc/ajax-pagination.php');



/*--------------------*\
        Hooks
\*--------------------*/
add_action('wp_enqueue_scripts','ap_enqueue');

add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//Register nav menu
add_action('after_setup_theme','ap_setup_theme');

add_action('customize_register','ap_customize_register');


//AJAX pagination
add_action( 'wp_ajax_nopriv_ajax_pagination', 'ap_ajax_pagination' );
add_action( 'wp_ajax_ajax_pagination', 'ap_ajax_pagination' );

/*--------------------*\
        Shortcode
\*--------------------*/

require('google-analytics-shortcode.php');


/**
 * Add custom media metadata fields
 *
 * Be sure to sanitize your data before saving it
 * http://codex.wordpress.org/Data_Validation
 *
 * @param $form_fields An array of fields included in the attachment form
 * @param $post The attachment record in the database
 * @return $form_fields The final array of form fields to use
 */
function add_image_attachment_fields_to_edit( $form_fields, $post ) {

	// Add a size
	$form_fields['size_width'] = array(
		"label" => __("Bredde (cm)"),
    "input" => "html",
		"html" => "<input type='number' name='attachments[{$post->ID}][size_width]' id='attachments[{$post->ID}][size_width]' min='0' value='".get_post_meta($post->ID, '_size_width', true)."'>", // this is default if "input" is omitted
	);

  // Add a size
  $form_fields['size_height'] = array(
    "label" => __("Højde (cm)"),
    "input" => "html",
    "html" => "<input type='number' name='attachments[{$post->ID}][size_height]' id='attachments[{$post->ID}][size_height]' min='0' value='".get_post_meta($post->ID, '_size_height', true)."'>",
  );

	return $form_fields;
}
add_filter("attachment_fields_to_edit", "add_image_attachment_fields_to_edit", null, 2);

/**
 * Save custom media metadata fields
 *
 * Be sure to validate your data before saving it
 * http://codex.wordpress.org/Data_Validation
 *
 * @param $post The $post data for the attachment
 * @param $attachment The $attachment part of the form $_POST ($_POST[attachments][postID])
 * @return $post
 */
function add_image_attachment_fields_to_save( $post, $attachment ) {
	if ( isset( $attachment['size_width'] ) )
		update_post_meta( $post['ID'], '_size_width', $attachment['size_width']);

	if ( isset( $attachment['size_height'] ) )
		update_post_meta( $post['ID'], '_size_height', $attachment['size_height']);

	return $post;
}
add_filter("attachment_fields_to_save", "add_image_attachment_fields_to_save", null , 2);


//file input sanitization function
function theme_slug_sanitize_file( $file, $setting ) {

    //allowed file types
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png'
    );

    //check file type from file name
    $file_ext = wp_check_filetype( $file, $mimes );

    //if file has a valid mime type return it, otherwise return default
    return ( $file_ext['ext'] ? $file : $setting->default );
}

?>
