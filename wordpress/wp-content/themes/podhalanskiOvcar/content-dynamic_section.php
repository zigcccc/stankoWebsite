<?php
while(have_rows('dynamic_section')): the_row();
$section_type = get_sub_field('external_content');
$section_bg = get_sub_field('section_bg_color');
$section_texture = bg_texture(get_sub_field('section_bg_texture'));
?>
<div id=<?php echo section_id(get_sub_field('dynamic_section_title')); ?> class="jumbotron jumbotron-fluid<?php echo ' ' . $section_type; ?>"<?php echo ' style="background-color:'. $section_bg .'; background-image: url('. get_template_directory_uri() . '/img/' .  $section_texture .')"';?>>
    <div class="container">
        <h2<?php if(even($dynamic_row)){ echo ' class="float-sm-right"'; } ?>><?php echo get_sub_field('dynamic_section_title'); ?></h2>
        <?php if(even($dynamic_row)): ?>
          <div class="clearfix"></div>
        <?php endif; ?>
        <?php

          switch($section_type):
            case 'gallery':
              include(locate_template('content-gallery.php'));
              break;
            case 'blog':
              include(locate_template('content-blog.php'));
              break;
            default:
              include(locate_template('content-blog.php'));
              break;
          endswitch;
        ?>

    </div><!-- END container -->
</div><!-- END section (jumbotron) -->
<?php $dynamic_row++; endwhile; ?>
