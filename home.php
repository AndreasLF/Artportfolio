<?php get_header(); ?>
<?php
// Get modal template
get_template_part('template-parts/img-modal');
?>

<!--Container -->

<?php

?>
<div class="container">

  <br />


  <?php

$args = array(
                          'post_type' => 'post',
                          'posts_per_page' => 20,
                          'orderby' => 'date', //Order by date
                          'order' => 'DESC', //Descending order
                          'meta_query' => array(
                              array(
                                  'key' => '_thumbnail_id'
                              )
                          )
            );;

  $the_query = new WP_Query( $args );

  if ( $the_query->have_posts() ) {
      $imgs = array();

      while ( $the_query->have_posts() ) {
        $the_query->the_post();


        $imageId = attachment_url_to_postid( get_the_post_thumbnail_url(get_the_ID()) );

        // Get image src and information
        $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');
        // $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
        $imgText = get_the_title($imageId);
        $imgWidth = get_post_meta($imageId,'_size_width',true);
        $imgHeight = get_post_meta($imageId,'_size_height',true);

        $imgSize = null;

        if($imgWidth && $imgHeight){
          $imgSize = $imgWidth .' x '. $imgHeight . ' cm';
        }

        $imgDate = get_the_date('Y');
        // $imgStory = get_post_meta(get_the_ID(), 'story')[0];
        // $imgStorySrc = get_post_meta(get_the_ID(), 'story-image')[0];




        // Push information to array (nested array)
        array_push($imgs,array('src' => $imgSrc, 'text' => $imgText, 'size' => $imgSize, 'date' => $imgDate, 'post-id' => get_the_ID()));

      }
      //Create gallery with the ap_create_gallery function
      ap_create_gallery($imgs);
  }
  else {
      // no posts found
  }
?>
    </div><!-- /container -->

<?php get_footer(); ?>


<?php /*
* This function creates a photo gallery from an array of photo sources
*
* @param array $images nested array of image information
* @return html photo gallery
*/
function ap_create_gallery($images = null){
  //Only run code if $images is defined
  if($images){
    ?>
    <!-- Grid -->
    <div class="ap-grid" data-ap-total-slides="<?php echo count($images); ?>">
            <?php
            // loop through images
            foreach($images as $n=>$image){
              ?>
              <!-- Gallery block -->
              <?php // Creates a div with the information needed provided in data- attributes - image number, text, size ?>
              <div class="ap-gallery-block"
              data-ap-slide-no="<?php echo $n; ?>"
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
            ?>
    </div>
    <!-- /Grid -->
    <?php
  }
  else {
    return;
  }
}?>
