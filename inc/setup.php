
<?php
function ap_setup_theme() {
  //Add suppport for thumbnails
  add_theme_support( 'post-thumbnails' );

  //register nav menu
  register_nav_menu('primary',__( 'Nav menu' ));
}

?>
