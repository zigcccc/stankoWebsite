<?php get_header(); ?>

  <?php
    function excerpt($limit) {
      $excerpt = explode(' ', get_the_content(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      $excerpt = strip_tags($excerpt);
      return $excerpt;
    }


    $args = array(
      post_type => 'post',
      post_per_page => -1
    );

    $loop = New WP_Query($args);

    if($loop->have_posts()):
      $counter = 0;

      $section_counter = 0;
      while($loop->have_posts()): $loop->the_post();
        $section_counter++;
      endwhile;

      while($loop->have_posts()):
        $loop->the_post();

        $counter++;

        //Vars
        if($counter % 2 == 0) {
          $bg_texture = ' style="background-image: url(\' ' . get_template_directory_uri() . '/img/contemporary_china.png\')"';
        }
        else {
          $bg_texture = ' style="background-image: url(\' ' . get_template_directory_uri() . '/img/sayagata-400px.png\')"';
        }

        ?>
        <div class="jumbotron jumbotron-fluid blog-jumbotron<?php if($counter == $section_counter){ echo ' last-elem'; } ?>"<?php echo $bg_texture; ?>>
          <div class="container">
            <div class="post-thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
              <article>
              <div class="row">
                <div class="col-md-6">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="col-md-6">
                  <small><?php the_author(); ?> • <?php the_time('F j, Y'); ?></small>
                </div>
              </div><!-- END row -->
              <div class="row">
                <div class="col-md-12">
                  <p><?php echo excerpt(140); ?></p>
                </div>
              </div><!-- END row -->
              <div class="row">
                <?php if($counter != 4): ?>
                  <div class="col-md-4 offset-md-4">
                    <a href="<?php the_permalink(); ?>">
                      <button class="blog-cta">Preberi celo zgodbo</button>
                    </a>
                  </div>
                <?php else: ?>
                  <div class="col-md-3 offset-md-2">
                    <a href="<?php the_permalink(); ?>">
                      <button class="blog-cta">Preberi celo zgodbo</button>
                    </a>
                  </div>
                  <div class="col-md-3 offset-md-2">
                    <a href="<?php echo get_bloginfo('url'); ?>">
                      <button class="blog-cta">Nazaj domov</button>
                    </a>
                  </div>
                <?php endif; ?>
              </div><!-- END row -->
            </article><!-- END article -->
          </div><!-- END container -->
        </div><!-- END jumbotron -->
      <?php
      endwhile;
    endif;
  wp_reset_query();
?>


<?php get_footer(); ?>
