<!DOCTYPE html>
<html>
<head>
  <?php
    $keywords = implode(', ', explode(' ', get_bloginfo('description')));
  ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1">
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <meta name="author" content="<?php echo get_bloginfo('author'); ?>">
  <meta name="keywords" content="<?php echo $keywords; ?>">
  <title><?php echo get_bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="main-nav">
    <div class="container">
      <div class="logo">
        <a href="<?php echo get_bloginfo('url'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
        </a>
      </div>
      <?php wp_nav_menu(); ?>
      <div class="mobile-menu-toggle"><i class="material-icons">menu</i></div>
    </div><!-- END container -->
  </nav>

<?php ?>
