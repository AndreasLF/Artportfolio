

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title>
        <?php wp_title(''); ?>
        <?php bloginfo('name'); ?>
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head>




<body <?php body_class(); ?> >

  <!-- Large modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".ap-slideshow-modal">Large modal</button>

  <div class="modal fade ap-slideshow-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="ap-modal-full modal-dialog modal-lg">

      <div class="modal-content ap-slideshow-content justify-content-center">
        <div class="ap-slideshow-btn ap-slideshow-btn-close">
          <i class="fas fa-times"></i>
        </div>
        <div class="ap-slideshow-btn ap-slideshow-btn-next">
          <i class="fas fa-chevron-right"></i>
        </div>
        <div class="ap-slideshow-btn ap-slideshow-btn-prev">
          <i class="fas fa-chevron-left"></i>
        </div>
        <div class="ap-slideshow-caption">
          askdklfmaklmsfdklm
        </div>

        <img class="ap-slideshow-img" src="" />

      </div>
    </div>
  </div>

<?php  get_template_part('template-parts/nav-bar'); ?>
