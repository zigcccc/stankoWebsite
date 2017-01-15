<!DOCTYPE html>
<html>
<head>
  <meta name="width" content="width=device-width, initial-scale=1.0">
  <title><?php echo get_bloginfo('title'); ?></title>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <nav class="main-nav">
      <div class="logo">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
      </div>
      <?php if(have_rows('main_menu')): ?>
        <div class="menu">
          <ul>
            <?php while(have_rows('main_menu')): the_row();
              //Vars
              $item_id = implode('-', explode(' ', get_sub_field('link_label')));
            ?>
            <li class="nav-btn" id="<?php echo $item_id ?>">
              <a href="<?php echo get_sub_field('link_value'); ?>"><?php echo get_sub_field('link_label') ?></a>
            </li>
            <li> | </li>
            <?php endwhile; ?>
          </ul>
        </div>
      <?php endif; ?>
  </nav>

<?php ?>
