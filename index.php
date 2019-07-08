


<?php get_header(); ?>



<?php
/*
* This function creates a photo gallery from an array of photo sources
*
* @param array $imageSources array of image source links
* @return html photo gallery
*/
function ap_create_gallery($imageSources = null){
  if($imageSources){
    ?>
    <div class="ap-grid">
    <?php
      foreach($imageSources as $image){
        ?>
        <div class="ap-gallery-block">
          <img src="<?php echo $image; ?>">
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


<!--Container -->
<div class="container">
  <h2><?php wp_title(''); ?></h2>
  <br />
    <?php
    if(have_posts()){
        $imgSrcs = array();

        while(have_posts()){
            the_post();
            $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
            array_push($imgSrcs,$imgSrc);
        }

        ap_create_gallery($imgSrcs);

      } ?>
    </div><!-- /container -->

<?php get_footer(); ?>
