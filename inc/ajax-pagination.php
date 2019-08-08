<?php
function ap_ajax_pagination() {

    //Gets the query vars
    $query_vars = json_decode( stripslashes( $_POST['query_vars'] ), true );

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
              $imageId = attachment_url_to_postid( get_the_post_thumbnail_url(get_the_ID()) );

              //
              // // Get image src and information
               $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');

               $imgText = get_the_title($imageId);
               $imgWidth = get_post_meta($imageId,'_size_width',true);
               $imgHeight = get_post_meta($imageId,'_size_height',true);
              //
               $imgSize = null;
              //
              if($imgWidth && $imgHeight){
                $imgSize = $imgWidth .' x '. $imgHeight . ' cm';
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
              array_push($imgs,array('src' => $imgSrc, 'text' => $imgText, 'size' => $imgSize, 'date' => $imgDate, 'post-id' => get_the_ID()));

            }

           }
          //Create gallery with the ap_create_gallery function
          ap_create_gallery_blocks($imgs, $numberOfImgs);
      }
      else {
        ?>
            <div class="section"></div>
            <div class="divider"></div>
            <p id='pagination-end' hidden><?php _e('That\'s it', 'artportfolio'); ?></i></p>
        <?php

    }


    die();
}

/*
* This function creates a photo gallery from an array of photo sources
*
* @param array $images nested array of image information
* @return html photo gallery
*/
function ap_create_gallery_blocks($images = null, $numberOfImgs = 0){
  //Only run code if $images is defined
  if($images){
    ?>
            <?php
            // loop through images
            foreach($images as $n=>$image){
              ?>
              <!-- Gallery block -->
              <?php // Creates a div with the information needed provided in data- attributes - image number, text, size ?>
              <div class="ap-gallery-block"
              data-ap-slide-no="<?php echo $numberOfImgs + $n; ?>"
              data-ap-post-id="<?php echo $image['post-id'] ?>"
              <?php if($image['text']){ echo 'data-ap-img-text="'. $image['text'].'"';}; ?>
              <?php if($image['size']){ echo 'data-ap-img-size="'. $image['size'].'"';}; ?>
              <?php if($image['date']){ echo 'data-ap-img-date="'. $image['date'].'"';}; ?>
              >
                <img src="<?php echo $image['src']; ?>">
                <div class="ap-gallery-block-overlay unselectable">
                  <?php if($image['text']){ echo '<i class="fas fa-palette"></i> '. $image['text'];}; ?>
                  <br />
                  <?php if($image['size']){ echo '<i class="fas fa-ruler"></i> '. $image['size'];}; ?>
                  <br />
                  <?php if($image['date']){ echo '<i class="far fa-calendar"></i> '. $image['date'];}; ?>
                </div>
              </div> <!-- /Gallery block -->
              <?php
            }
  }
  else {
    return;
  }
}

?>
