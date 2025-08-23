<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <?php wp_head(); ?>
</head>

<body>
  <header id="header" class="header d-flex align-items-center sticked stikcy-menu">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="<?php echo home_url(); ?>" class="logo d-flex align-items-center">
        <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" />
        <img class="logo-sticky" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-2.png"
          alt="logo" />
      </a>
      <nav id="navbar" class="navbar">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'header',
          'menu_class' => 'menu__list',
          'container' => false,
          'fallback_cb' => 'technoai_fallback_menu'
        ));
        ?>
      </nav>
      <!-- .navbar -->
      <a href="<?php echo home_url('/contact'); ?>" class="btn-get-started hide-on-mobile">Get Quotes</a>
      <button id="darkmode-button"><i class="bi bi-moon-fill"></i></button>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
  </header>
  <!-- End Header -->
