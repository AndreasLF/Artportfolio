<?php get_header(); ?>

<!--Container -->
<div class="container">
    <?php

    if(have_posts()){
        while(have_posts()){
            the_post();
            ?>



            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <br />
                <?php  if(get_theme_mod('ap_bio_image_handle')){?>
                    <img class="ap-bio-img" src="<?php echo esc_url(get_theme_mod('ap_bio_image_handle')); ?>" />
                <?php }
                else{?>
                  <img class="ap-bio-img" src="<?php echo esc_url(bloginfo('stylesheet_directory') . "/lib/alt-images/profilepic.png");?> />
                <?php }?>

                <br /><br />

                <?php if(get_theme_mod('ap_bio_social_handle') == 'left'){ ?>
                      <?php if(get_theme_mod('ap_instagram_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href='<?php echo esc_url('https://www.instagram.com/' . get_theme_mod('ap_instagram_handle'));?>'>
                        <i class="fab fa-instagram"></i>
                        <?php esc_html_e('@' . get_theme_mod('ap_instagram_handle'));?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_email_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank"  href="<?php echo esc_url('mailto:' . get_theme_mod('ap_email_handle'));?>">
                        <i class="far fa-envelope"></i>
                        <?php esc_html_e(get_theme_mod('ap_email_handle'));?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_phone_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('tel:' . get_theme_mod('ap_phone_handle'));?>">
                        <i class="fas fa-phone"></i>
                        <?php esc_html_e(get_theme_mod('ap_phone_handle'));?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_facebook_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('facebook.com/' . get_theme_mod('ap_facebook_handle'));?>">
                          <i class="fab fa-facebook"></i>
                          <?php esc_html_e(get_theme_mod('ap_facebook_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_twitter_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('twitter.com/' . get_theme_mod('ap_twitter_handle'));?>">
                          <i class="fab fa-twitter"></i>
                          <?php esc_html_e(get_theme_mod('ap_twitter_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_linkedin_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('linkedin.com/in/' . get_theme_mod('ap_linkedin_handle'));?>">
                          <i class="fab fa-linkedin"></i>
                          <?php esc_html_e(get_theme_mod('ap_linkedin_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                <?php } ?>

              </div>
              <div class="col-xs-12 col-sm-8">
                <br />
                <?php if(get_theme_mod('ap_bio_name_handle')){ ?>
                  <h2 class="ap-bio-header">
                      <?php
                      // post title
                        esc_html_e(get_theme_mod('ap_bio_name_handle'));
                      ?>
                  </h2>
                <?php } ?>
                <br />
                <?php
                // post content
                the_content();
                ?>
                <br/>

                <?php if(get_theme_mod('ap_bio_social_handle') == 'right'){ ?>
                      <?php if(get_theme_mod('ap_instagram_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href='<?php echo esc_url('https://www.instagram.com/'.get_theme_mod('ap_instagram_handle'));?>'>
                        <i class="fab fa-instagram"></i>
                        <?php esc_html_e(get_theme_mod('ap_instagram_handle'));?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_email_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank"  href="<?php echo esc_url('mailto:' . get_theme_mod('ap_email_handle'));?>">
                          <i class="far fa-envelope"></i>
                          <?php esc_html_e(get_theme_mod('ap_email_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_phone_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('tel:' . get_theme_mod('ap_phone_handle'));?>">
                          <i class="fas fa-phone"></i>
                          <?php esc_html_e(get_theme_mod('ap_phone_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_facebook_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('facebook.com/' . get_theme_mod('ap_facebook_handle'));?>">
                          <i class="fab fa-facebook"></i>
                          <?php esc_html_e(get_theme_mod('ap_facebook_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_twitter_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('twitter.com/' . get_theme_mod('ap_twitter_handle'));?>">
                          <i class="fab fa-twitter"></i>
                          <?php esc_html_e(get_theme_mod('ap_twitter_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_linkedin_handle')){ ?>
                        <a class="ap-bio-social-link" target="_blank" href="<?php echo esc_url('linkedin.com/in/' . get_theme_mod('ap_linkedin_handle'));?>">
                          <i class="fab fa-linkedin"></i>
                          <?php esc_html_e(get_theme_mod('ap_linkedin_handle'));?>
                        </a>
                        <br />
                      <?php } ?>
                <?php } ?>



              </div>

            </div>
        <?php
        }
      } ?>
    </div>
    <!-- /Container -->
<?php get_footer(); ?>
