<?php get_header(); ?>
<?php
// Get modal template
get_template_part('template-parts/img-modal');
?>

<!--Container -->
<div class="container">

  <br />


  <?php
    if(have_posts()){

        $imgs = array();
        while(have_posts()){
            the_post();

            // Get image src and information
            $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');
            // $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
            $imgText = get_post_meta(get_the_ID(), 'text')[0];
            $imgSize = get_post_meta(get_the_ID(), 'size')[0];
            $imgDate = get_post_meta(get_the_ID(), 'date')[0];
            $imgStory = get_post_meta(get_the_ID(), 'story')[0];
            $imgStorySrc = get_post_meta(get_the_ID(), 'story-image')[0];



            // Push information to array (nested array)
            array_push($imgs,array('src' => $imgSrc, 'text' => $imgText, 'size' => $imgSize, 'date' => $imgDate, 'story' => $imgStory, 'story-img' => $imgStorySrc));
        }

        //Create gallery with the ap_create_gallery function
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
              <?php if($image['text']){ echo 'data-ap-img-text="'. $image['text'].'"';}; ?>
              <?php if($image['size']){ echo 'data-ap-img-size="'. $image['size'].'"';}; ?>
              <?php if($image['date']){ echo 'data-ap-img-date="'. date('Y',strtotime($image['date'])).'"';}; ?>
              <?php if($image['story']){ echo 'data-ap-img-story="'. $image['story'].'"';}; ?>
              <?php if($image['story-img']){ echo 'data-ap-img-story-src="'. $image['story-img'].'"';}; ?>
              >
                <img src="<?php echo $image['src']; ?>">
                <div class="ap-gallery-block-overlay unselectable">
                  <?php if($image['text']){ echo '<i class="fas fa-palette"></i> '. $image['text'];}; ?>
                  <br />
                  <?php if($image['size']){ echo '<i class="fas fa-ruler"></i> '. $image['size'];}; ?>
                  <br />
                  <?php if($image['date']){ echo '<i class="far fa-calendar"></i> '. date('Y',strtotime($image['date']));}; ?>
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
