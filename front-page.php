
<?php get_header(); ?>

<!--Container -->
<div class="container d-flex justify-content-center">
    <?php


    $recent_posts = wp_get_recent_posts(array(
       'numberposts' => 1, // Number of recent posts thumbnails to display
       'post_status' => 'publish' // Show only the published posts
    ));

     $imgSrc = get_post_meta( $recent_posts[0]['ID'], 'image' )[0];
?>
    <img class="ap-frontpage-img" src="<?php echo $imgSrc; ?>" />

    </div><!-- /container -->



<?php get_footer(); ?>
