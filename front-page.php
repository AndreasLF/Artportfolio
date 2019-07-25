
<?php get_header(); ?>


  <?php
  // Get the latest published post
  $recent_posts = wp_get_recent_posts(array(
     'numberposts' => 1, // Number of recent posts thumbnails to display
     'post_status' => 'publish' // Show only the published posts
  ));

  // Get the image source from the post
   $imgSrc = get_post_meta( $recent_posts[0]['ID'], 'image' )[0];
   ?>

   <!--Container -->
   <div class="container d-flex justify-content-center"> <!-- content centered ONLY ON FRONTPAGE-->

      <!-- Image on frontpage -->
      <img class="ap-frontpage-img" src="<?php echo $imgSrc; ?>" />

  </div><!-- /container -->


<?php get_footer(); ?>
