<?php get_header(); ?>

<!--Container -->
<div class="container">
    <?php

    if(have_posts()){
        while(have_posts()){
            the_post();
            ?>

            <h2>
                <?php
                // post title
                the_title();
                ?>
            </h2>


            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <br />
                <img class="ap-bio-img" src="<?php echo get_the_post_thumbnail_url(); ?>" />
                <br /><br />

                <a class="ap-bio-social-link" target="_blank" href="https://www.instagram.com/thomasravnt/">
                  <i class="fab fa-instagram"></i>
                  @thomasravnt
                </a>
                <br />
                <a class="ap-bio-social-link" target="_blank" href="https://www.instagram.com/thomasravnt/">
                  <i class="far fa-envelope"></i>
                  thomas@hvidstoej.dk
                </a>
                <br />
                <a class="ap-bio-social-link" target="_blank" href="https://www.instagram.com/thomasravnt/">
                  <i class="fas fa-phone"></i>
                  60925108
                </a>
              </div>
              <div class="col-xs-12 col-sm-8">
                <br />
                <?php
                // post content
                the_content();
                ?>
                <br/>



              </div>

            </div>
        <?php
        }
      } ?>
    </div>
    <!-- /Container -->



<?php get_footer(); ?>
