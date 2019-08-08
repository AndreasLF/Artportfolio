<?php get_header(); ?>

<!--Container -->
<div class="container">
    <?php
    if(have_posts()){

        while(have_posts()){
            the_post();

            $imageId = attachment_url_to_postid( get_the_post_thumbnail_url(get_the_ID()) );

            // Get image src and information
            $imgSrc = get_the_post_thumbnail_url(get_the_ID(),'large');
            $imgSrcOriginal = get_the_post_thumbnail_url(get_the_ID());
            // $imgSrc = get_post_meta( get_the_ID(), 'image' )[0];
            $imgText = get_the_title($imageId);
            $imgWidth = get_post_meta($imageId,'_size_width',true);
            $imgHeight = get_post_meta($imageId,'_size_height',true);

            $imgSize = null;

            if($imgWidth && $imgHeight){
              $imgSize = $imgWidth .' x '. $imgHeight . ' cm';
            }

            $imgDate = get_the_date('Y');

            ?>
            <br />

            <div class="ap-img-info-single">
              <?php if($imgText){ ?>
                <i class="fas fa-palette"></i>
                <?php esc_html_e($imgText); ?> &nbsp; &nbsp;
              <?php }
              if($imgSize){
              ?>
                <br class="d-block d-sm-none" />
                <i class="fas fa-ruler"></i>
                <?php esc_html_e($imgSize); ?> &nbsp; &nbsp;
              <?php }
              if($imgDate){
              ?>
                <br class="d-block d-sm-none" />
                  <i class="far fa-calendar"></i>
                <?php esc_html_e($imgDate); ?>
              <?php } ?>
            </div>
            <hr />


            <div class="row d-flex justify-content-center">
              <a href="<?php echo esc_url($imgSrcOriginal); ?>" target="_blank">
                <img class="ap-img-single" src="<?php echo esc_url($imgSrc); ?>" />
              </a>
            </div>
            <hr />
            <br />
            <div class="row">

              <?php
                the_content()
              ?>

            </div>

            <?php
        }
      } ?>
    </div><!-- /container -->



<?php get_footer(); ?>
