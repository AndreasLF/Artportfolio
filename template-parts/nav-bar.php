

<?php if (has_nav_menu('primary')) {?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavbar" aria-controls="primaryNavbar" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>

      <?php wp_nav_menu([
         'menu'            => 'primary',
         'container'       => 'div',
         'container_id'    => 'primaryNavbar',
         'container_class' => 'collapse navbar-collapse',
         'menu_id'         => false,
         'menu_class'      => 'navbar-nav mr-auto',
         'depth'           => 2,
         'fallback_cb'     => 'bs4navwalker::fallback',
         'walker'          => new bs4navwalker()
      ]); ?>




  </nav>
  <br />

<?php } ?>
