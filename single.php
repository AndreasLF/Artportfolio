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
            $imgDate = get_post_meta(get_the_ID(),'date')[0];

            ?>
            <br />

            <div class="row">
              <a href="<?php echo $imgSrc; ?>" target="_blank">
                <img class="ap-img-single" src="<?php echo $imgSrc; ?>" />
              </a>
            </div>

            <div class="ap-img-info-single">
              <?php if($imgText){ ?>
                <i class="fas fa-palette"></i>
                <?php echo $imgText; ?> &nbsp; &nbsp;
              <?php }
              if($imgSize){
              ?>
                <br class="d-block d-sm-none" />
                <i class="fas fa-ruler"></i>
                <?php echo $imgSize; ?> &nbsp; &nbsp;
              <?php }
              if($imgDate){
              ?>
                <br class="d-block d-sm-none" />
                  <i class="far fa-calendar"></i>
                <?php echo date('Y',strtotime($imgDate)); ?>
              <?php } ?>
            </div>

            <?php
        }
      } ?>
    </div><!-- /container -->



<?php get_footer(); ?>
