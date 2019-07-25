<?php get_header(); ?>

<!--Container -->
<div class="container">
  <h2><?php wp_title(''); ?></h2>
    <?php
    if(have_posts()){

        while(have_posts()){
            the_post();

            // Get post information
            $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
            $imgText = get_post_meta(get_the_ID(), 'text')[0];
            $imgSize = get_post_meta(get_the_ID(), 'size')[0];

            ?>
            <br />

            <div class="row">
              <a href="<?php echo $imgSrc; ?>" target="_blank">
                <img class="ap-img-single" src="<?php echo $imgSrc; ?>" />
              </a>
            </div>

            <div class="ap-img-info-single">
              <i class="fas fa-palette"></i>
              <?php echo $imgText; ?> &nbsp; &nbsp;
              <br class="d-block d-sm-none" />
              <i class="fas fa-ruler"></i>
              <?php echo $imgSize; ?>
            </div>

            <?php
        }
      } ?>
    </div><!-- /container -->



<?php get_footer(); ?>
