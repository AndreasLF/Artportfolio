<?php get_header(); ?>
<?php
// Get modal template
get_template_part('template-parts/img-modal');
?>


<?php

?>
<!--Container -->
<div class="container">
  <br />


  <?php

$args = array(
                          'post_type' => 'post',
                          'posts_per_page' => 10,
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

        $imageId = get_post_thumbnail_id(get_the_ID() );

        // Get image src and information
        $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');

        $imgSrcFull = get_the_post_thumbnail_url(get_the_ID());

        // $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
        // $imgText = strval(get_the_title($imageId));
        $imgWidth = get_post_meta($imageId,'_size_width',true);
        $imgHeight = get_post_meta($imageId,'_size_height',true);


        $imgExcerpt = get_the_excerpt();
        $postUrl = get_permalink();

        $imgSize = null;

        if($imgWidth && $imgHeight){
          $imgSize = strval($imgWidth .' x '. $imgHeight . ' cm');
        }

        $imgDate = get_the_date('Y');
        // $imgStory = get_post_meta(get_the_ID(), 'story')[0];
        // $imgStorySrc = get_post_meta(get_the_ID(), 'story-image')[0];




        // Push information to array (nested array)
        array_push($imgs,array('src' => $imgSrc, 'srcFull' => $imgSrcFull, 'text' => $imgText, 'size' => $imgSize, 'date' => $imgDate, 'post-id' => get_the_ID(), 'excerpt' => $imgExcerpt, 'postUrl' => $postUrl));

      }
      //Create gallery with the ap_create_gallery function
      ap_create_gallery($imgs);
  }
  else {
      // no posts found
  }
?>


<div id="ap-ajax-pagination-info" class="text-center">
  <div id="gallery-preloader" class="spinner-border d-none" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  <br />
  <button type="button" class="btn btn-secondary ajax-pagination-btn"><?php esc_html_e('Indlæs flere') ?></button>
</div>


    </div><!-- /container -->

<?php get_footer(); ?>


<?php
/*
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
    <div class="ap-grid" data-ap-total-slides="<?php echo absint(count($images)); ?>" data-ap-page-count="1">
            <?php
            // loop through images
            foreach($images as $n=>$image){
              ?>
              <!-- Gallery block -->
              <?php // Creates a div with the information needed provided in data- attributes - image number, text, size ?>
              <div class="ap-gallery-block"
              data-ap-slide-no="<?php echo $n; ?>"
              data-ap-post-id="<?php echo $image['post-id'] ?>"
              <?php if($image['size']){ ?> data-ap-img-size= "<?php esc_attr_e($image['size']);}; ?>"
              <?php if($image['date']){ ?> data-ap-img-date= "<?php esc_attr_e($image['date']);}; ?>"
              <?php if($image['srcFull']){ ?> data-ap-img-src= "<?php esc_attr_e($image['srcFull']);}; ?>"
              <?php if($image['excerpt']){ ?> data-ap-img-excerpt= "<?php esc_attr_e($image['excerpt']);}; ?>"
              <?php if($image['postUrl']){ ?> data-ap-img-posturl= "<?php esc_attr_e($image['postUrl']);}; ?>"
              >
                <img src="<?php echo esc_url($image['src']); ?>">
                <div class="ap-gallery-block-overlay unselectable">
                  <?php if($image['size']){ ?> <i class="fas fa-ruler"></i>&nbsp; <?php esc_html_e($image['size']); ?> <br /> <?php }; ?>
                  <?php if($image['date']){ ?> <i class="fas fa-calendar"></i>&nbsp; <?php esc_html_e($image['date']);}; ?>
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
