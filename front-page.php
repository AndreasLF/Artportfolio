
<?php get_header(); ?>

   <!--Container -->
   <div class="container d-flex justify-content-center"> <!-- content centered ONLY ON FRONTPAGE-->

      <!-- Image on frontpage -->

      <?php if(get_theme_mod('ap_front_image_choice_handle') == 'custom'){?>
        <div class="ap-front-img-container">
          <img class="ap-front-img" src="<?php  echo esc_url(get_theme_mod('ap_front_image_handle')); ?>" />
        </div>
      <?php }
      else {
        // Get the latest published post
        $recent_posts = wp_get_recent_posts(array(
           'numberposts' => 1, // Number of recent posts thumbnails to display
           'post_status' => 'publish' // Show only the published posts
        ));

        // Get the image source from the post
         $imgSrc = get_post_meta( $recent_posts[0]['ID'], 'image' )[0];

        ?>
        <div class="ap-front-img-container">
          <img class="ap-front-img" src="<?php echo esc_url($imgSrc); ?>" />
        </div>
      <?php } ?>

  </div><!-- /container -->


<?php get_footer(); ?>
