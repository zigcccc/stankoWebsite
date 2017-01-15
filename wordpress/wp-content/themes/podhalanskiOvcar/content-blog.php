<?php
  $args = array(
    post_type => 'post',
    posts_per_page => 4
  );

  $loop = New WP_Query($args);

  if($loop->have_posts()):
    $row_count = 0;
    while($loop->have_posts()): $loop->the_post();
      $row_count++;
    ?>
      <?php if($row_count % 2 != 0): ?><!-- Display row on every 2 posts -->
        <div class="row blog-row">
      <?php endif; ?>
          <div class="col-md-6">
              <div class="card card-block">
                  <div class="card-img" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
                  <h3 class="card-title"><?php the_title(); ?></h3>
                  <span class="text-muted"><small><?php the_author(); ?>  •  <?php the_time('F j, Y'); ?></small></span>
                  <p class="card-text"><?php echo get_the_excerpt(); ?></p>
                  <a href="<?php the_permalink(); ?>" class="card-cta"><?php echo get_sub_field('dynamic_section_button_text'); ?></a>
              </div>
          </div>
      <?php if($row_count % 2 == 0): ?>
        </div><!-- END row -->
      <?php endif; ?>
    <?php
    endwhile;
    ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
          <a href="<?php echo get_bloginfo('url'); ?>/blog/">
            <button class="section-cta">
                Več pripetljajev
            </button>
          </a>
        </div>
    </div>
  <?php
  endif;
wp_reset_query(); ?>


<!--

 -->
