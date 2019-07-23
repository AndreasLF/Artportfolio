

<?php if (has_nav_menu('primary')) {?>

<nav class="navbar navbar-expand-lg border-bottom">

  <a class="navbar-brand ap-nav-link d-lg-none d-xl-none" href="<?php echo get_home_url();?>"><strong>Hvid Støj</strong></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
     <i class="fas fa-bars"></i>
   </button>


<div class="collapse navbar-collapse navbar-nav-scroll justify-content-between ml-3 mt-2 mb-2" id="primaryNavbar">
<div class="row mr-5 d-none d-lg-block">
  <a class="navbar-brand ap-nav-link" href="<?php echo get_home_url();?>"><strong>Hvid Støj</strong></a>
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
  <div class="ml-3">
    <a class="ap-nav-link" target="_blank" href="https://www.instagram.com/thomasravnt/">
      <i class="fab fa-instagram"></i>
    </a>
  </div>
  <div class="ml-4">
    <a class="ap-nav-link" target="_blank" href="">
      <i class="fas fa-envelope"></i>
    </a>  </div>
</div>
<!--
<ul class="navbar-nav right">
  <li class="nav-item">
    <a class="nav-link" target="_blank" href="https://www.instagram.com/thomasravnt/">
      <i class="fab fa-instagram"></i>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" target="_blank" href="">
      <i class="fas fa-envelope"></i>
    </a>
  </li>
</ul> -->


</div>


  </nav>
  <br />



<?php } ?>
