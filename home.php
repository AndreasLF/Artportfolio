


<?php get_header(); ?>

<!--Container -->
<div class="container">
  <h2><?php wp_title(''); ?></h2>
  <br />
    <?php
    $recent_posts = wp_get_recent_posts(array(
       'numberposts' => 4, // Number of recent posts thumbnails to display
       'post_status' => 'publish' // Show only the published posts
   ));
    if(have_posts()){
        $imgs = array();
        while(have_posts()){
            the_post();
            $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
            $imgText = get_post_meta(get_the_ID(), 'text')[0];
            $imgSize = get_post_meta(get_the_ID(), 'size')[0];

            array_push($imgs,array('src' => $imgSrc, 'text' => $imgText, 'size' => $imgSize));
        }
        ap_create_gallery($imgs);

      } ?>
    </div><!-- /container -->

<?php get_footer(); ?>







<?php /*
* This function creates a photo gallery from an array of photo sources
*
* @param array $images nested array of image information
* @return html photo gallery
*/
function ap_create_gallery($images = null){
  if($images){
    ?>
    <div class="ap-grid" data-ap-total-slides="<?php echo count($images); ?>">
    <?php
      foreach($images as $n=>$image){
        ?>
        <div class="ap-gallery-block" data-ap-slide-no="<?php echo $n; ?>" <?php if($image['text']){ echo 'data-ap-img-text="'. $image['text'].'"';}; ?> <?php if($image['size']){ echo 'data-ap-img-size="'. $image['size'].'"';}; ?>">
          <img src="<?php echo $image['src']; ?>">
        </div>
        <?php
      }
    ?>
    </div>
    <?php
  }
  else {
    return;
  }
}?>
