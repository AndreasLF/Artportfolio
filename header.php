<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<!-- head -->
<head>

    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- title -->
    <title>
      <?php bloginfo('name'); ?>
      -
      <?php wp_title(' '); ?>
    </title>
    <!-- /title -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <?php wp_head(); ?>
</head><!-- /head -->

<body <?php body_class(); ?>>
<?php  get_template_part('template-parts/nav-bar'); ?>
