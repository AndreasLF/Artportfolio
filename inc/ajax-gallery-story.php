<?php
function ap_ajax_gallery_story(){

  // get the post id
  $postId = $_POST['post_id'];

  // Get the post thumbnail
  $imgUrl = get_the_post_thumbnail_url($_POST['post_id']);

  // If the post has content
  if(get_post($postId)->post_content){
    // Json encoded array
    echo json_encode(array('has_content' => true, 'data' => get_post($postId)->post_content, 'img_src' => $imgUrl));
  }
  else{
    echo json_encode(array('has_content' => false, 'img_src' => $imgUrl));
  }

  exit();
}
?>
