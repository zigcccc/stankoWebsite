<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo get_bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="main-nav">
      <div class="logo">
        <a href="<?php echo get_bloginfo('url'); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
        </a>
      </div>
      <?php wp_nav_menu(); ?>
  </nav>

<?php ?>
