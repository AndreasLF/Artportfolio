<?php
function ap_ajax_pagination() {

    //Gets the query vars
    // $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );
    global $wp_query;
    $query_vars = $wp_query->query;
    //Updates page number
    // $numberOfImgs = null;

    // Check if the post values are set and are numeric
    if(isset($_POST['last_img_number'], $_POST['page'])){
      // Number of images based on the last image in the gallery. 1 is added cause the first image has the number 0
      if(is_numeric($_POST['last_img_number'])){
        $numberOfImgs = absint($_POST['last_img_number'] + 1);
      }

      if(is_numeric($_POST['page'])){
        $query_vars['paged'] = absint($_POST['page'] + 1);
      }
    }

    // Creates new query with the updated query vars
    $the_query = new WP_Query( $query_vars );

      if ( $the_query->have_posts() ) {
          $imgs = array();

           while ( $the_query->have_posts() ) {
            $the_query->the_post();
            //
            //
            if(has_post_thumbnail(get_the_ID())){
              $imageId = get_post_thumbnail_id(get_the_ID() );

              //
              // // Get image src and information
               $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');

               $imgSrcFull = get_the_post_thumbnail_url(get_the_ID());


               $imgText = get_the_title($imageId);
               $imgWidth = get_post_meta($imageId,'_size_width',true);
               $imgHeight = get_post_meta($imageId,'_size_height',true);
              //
               $imgSize = null;
              //
              if($imgWidth && $imgHeight){
                $imgSize = strval($imgWidth .' x '. $imgHeight . ' cm');
              }

              //
               $imgDate = get_the_date('Y');
              // // $imgStory = get_post_meta(get_the_ID(), 'story')[0];
              // // $imgStorySrc = get_post_meta(get_the_ID(), 'story-image')[0];
              //
              //
              //
              //
              // // Push information to array (nested array)
              array_push($imgs,array('src' => $imgSrc, 'src-full' => $imgSrcFull, 'text' => $imgText, 'size' => $imgSize, 'date' => $imgDate, 'post-id' => get_the_ID()));

            }

           }
          //Create gallery with the ap_create_gallery function
          exit(json_encode(array('has_posts' => true, 'posts' => $imgs)));
          // ap_create_gallery_blocks($imgs, $numberOfImgs);
      }
      else {
          exit(json_encode(array('has_posts' => false, 'msg' => esc_html__('Det var alt'))));
    }
  exit(json_encode(array('has_posts' => false)));
}

?>
