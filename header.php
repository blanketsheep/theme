<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!--meta name="viewport" content="width=device-width, initial-scale=1"-->
  <meta name="viewport" content="width=1920, initial-scale=1">
  <title><?php wp_title( '|', true, 'right' ); ?><?php bloginfo('name'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--<wp_head>--><?php wp_head(); ?><!--</wp_head>-->
</head>
<body <?php body_class(); ?>><div id="wrapper"><header id="header">
  <nav class="container">
    <?php
      wp_nav_menu( array(
        'theme_location'  => 'primary',
        'container'       => false
      ) );
    ?>
  </nav>
</header><div id="main">