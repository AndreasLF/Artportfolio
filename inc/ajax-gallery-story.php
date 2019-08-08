<?php
function ap_ajax_gallery_story(){

  // get the post id

  if(isset($_POST['post_id'])){
    if(is_numeric($_POST['post_id'])){
      $postId = intval($_POST['post_id']);

      // Get the post thumbnail
      $imgUrl = esc_url(get_the_post_thumbnail_url($postId));

      // If the post has content
      if(get_post($postId)->post_content){
        // Json encoded array
        echo json_encode(array('has_content' => true, 'data' => get_post($postId)->post_content, 'img_src' => $imgUrl));
      }
      else{
        echo json_encode(array('has_content' => false, 'img_src' => $imgUrl));
      }
    }
  }
  exit();



}
?>
