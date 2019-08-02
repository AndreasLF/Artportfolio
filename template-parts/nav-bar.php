<?php if (has_nav_menu('primary')) {?>

  <nav class="navbar navbar-expand-lg border-bottom">

      <a class="navbar-brand ap-nav-link d-lg-none d-xl-none" href="<?php echo get_home_url();?>"><strong><?php echo get_bloginfo('name'); ?></strong></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse navbar-nav-scroll justify-content-between ml-3 mt-2 mb-2" id="primaryNavbar">
            <div class="row mr-5 d-none d-lg-block">
              <a class="navbar-brand ap-nav-link" href="<?php echo get_home_url();?>"><strong><?php echo get_bloginfo('name'); ?></strong></a>
            </div>

                  <?php wp_nav_menu([
                     'menu'            => 'primary',
                     'container'       => 'div',
                     'container_id'    => '',
                     'container_class' => '',
                     'menu_id'         => false,
                     'menu_class'      => 'nav navbar-nav mr-auto',
                     'depth'           => 2,
                     'fallback_cb'     => 'bs4navwalker::fallback',
                     'walker'          => new bs4navwalker()
                  ]); ?>

                  <hr />

            <div class="row justify-content-start mr-1">
              <?php if(get_theme_mod('ap_instagram_handle')){ ?>
                <div class="ml-3">
                  <a class="ap-nav-link" target="_blank" href='https://www.instagram.com/<?php echo get_theme_mod('ap_instagram_handle');?>'>
                    <i class="fab fa-instagram"></i>
                  </a>
                </div>
              <?php } ?>
              <?php if(get_theme_mod('ap_email_handle')){ ?>
                <div class="ml-4">
                  <a class="ap-nav-link" target="_blank" href="mailto:<?php echo get_theme_mod('ap_email_handle');?>">
                    <i class="far fa-envelope"></i>
                  </a>
                </div>
              <?php } ?>
              <?php if(get_theme_mod('ap_phone_handle')){ ?>
                <div class="ml-4">
                  <a class="ap-nav-link" target="_blank" href="tel:<?php echo get_theme_mod('ap_phone_handle');?>">
                    <i class="fas fa-phone"></i>
                  </a>
                </div>
              <?php } ?>
              <?php if(get_theme_mod('ap_facebook_handle')){ ?>
                <div class="ml-4">
                  <a class="ap-nav-link" target="_blank" href="facebook.com/<?php echo get_theme_mod('ap_facebook_handle');?>">
                    <i class="fab fa-facebook"></i>
                  </a>
                </div>
              <?php } ?>
              <?php if(get_theme_mod('ap_twitter_handle')){ ?>
                <div class="ml-4">
                  <a class="ap-nav-link" target="_blank" href="twitter.com/<?php echo get_theme_mod('ap_twitter_handle');?>">
                      <i class="fab fa-twitter"></i>
                  </a>
                </div>
              <?php } ?>
              <?php if(get_theme_mod('ap_linkedin_handle')){ ?>
                <div class="ml-4">
                  <a class="ap-nav-link" target="_blank" href="linkedin/in/<?php echo get_theme_mod('ap_linkedin_handle');?>">
                    <i class="fab fa-linkedin"></i>
                  </a>
                </div>
              <?php } ?>
            </div>
      </div>
  </nav>
<?php } ?>
