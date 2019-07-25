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
                <?php  if(get_theme_mod('ap_bio_image_handle')){?>
                    <img class="ap-bio-img" src="<?php  echo get_theme_mod('ap_bio_image_handle'); ?>" />
                <?php }
                else{?>
                  <img class="ap-bio-img" src="<?php echo bloginfo('stylesheet_directory');?>/lib/alt-images/profilepic.png" />
                <?php }?>

                <br /><br />

                <?php if(get_theme_mod('ap_bio_social_handle') == 'left'){ ?>
                      <?php if(get_theme_mod('ap_instagram_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href='https://www.instagram.com/<?php echo get_theme_mod('ap_instagram_handle');?>'>
                        <i class="fab fa-instagram"></i>
                        <?php echo get_theme_mod('ap_instagram_handle');?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_email_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank"  href="mailto:<?php echo get_theme_mod('ap_email_handle');?>">
                        <i class="far fa-envelope"></i>
                        <?php echo get_theme_mod('ap_email_handle');?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_phone_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href="tel:<?php echo get_theme_mod('ap_phone_handle');?>">
                        <i class="fas fa-phone"></i>
                        <?php echo get_theme_mod('ap_phone_handle');?>
                      </a>
                      <?php } ?>
                <?php } ?>

              </div>
              <div class="col-xs-12 col-sm-8">
                <br />
                <?php
                // post content
                the_content();
                ?>
                <br/>

                <?php if(get_theme_mod('ap_bio_social_handle') == 'right'){ ?>
                      <?php if(get_theme_mod('ap_instagram_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href='https://www.instagram.com/<?php echo get_theme_mod('ap_instagram_handle');?>'>
                        <i class="fab fa-instagram"></i>
                        <?php echo get_theme_mod('ap_instagram_handle');?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_email_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank"  href="mailto:<?php echo get_theme_mod('ap_email_handle');?>">
                        <i class="far fa-envelope"></i>
                        <?php echo get_theme_mod('ap_email_handle');?>
                      </a>
                      <br />
                      <?php } ?>
                      <?php if(get_theme_mod('ap_phone_handle')){ ?>
                      <a class="ap-bio-social-link" target="_blank" href="tel:<?php echo get_theme_mod('ap_phone_handle');?>">
                        <i class="fas fa-phone"></i>
                        <?php echo get_theme_mod('ap_phone_handle');?>
                      </a>
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
