<?php get_header(); ?>

  <?php

    $args = array(
      post_type => 'albums',
      post_per_page => -1
    );

    $loop = New WP_Query($args);

    if($loop->have_posts()):
      $n = 0;
      while($loop->have_posts()): $loop->the_post();
        $n++;
      endwhile;

      $counter = 0; ?>
      <div class="image-canvas"></div>
      <?php
      while($loop->have_posts()):
        $loop->the_post();

        $counter++;

        //Vars
        $bg_texture = ' style="background-image: url(\' ' . get_template_directory_uri() . '/img/contemporary_china.png\')"';
        ?>
        <div class="jumbotron jumbotron-fluid galerija-jumbotron<?php if($counter == $n){ echo ' last-elem'; } ?>"<?php if($counter % 2 == 0){ echo $bg_texture; }?>>
          <div class="container">
            <article>
              <div class="row">
                <div class="col-md-12">
                  <h3><?php the_title(); ?></h3>
                </div>
              </div><!-- END row -->
              <?php
                if(have_rows('album_images')):
                  $col_counter = 0;
                  ?>
                  <div class="row row-images">
                    <?php
                      while(have_rows('album_images')):
                        $col_counter++;


                        the_row();

                        //Vars
                        $image = get_sub_field('image');


                        ?>

                          <div class="col-md-3 col-sm-12">
                            <img class="gallery-image" src="<?php echo $image; ?>">
                          </div>

                        <?php if($col_counter % 4 == 0): ?>
                          </div>
                          <div class="row row-images-extra">
                        <?php endif; ?>

                      <?php endwhile; ?><!-- Closed loop through album images -->


                        </div><!-- END row -->

                      <?php if($col_counter > 4): ?>
                        <div class="row">
                          <div class="col-md-2 offset-md-5">
                            <button class="expand-gallery">Pokaži več</button>
                          </div>
                        </div><!-- END row -->
                      <?php endif; ?>

                  <?php
                endif; //Ended condition for querying album images
              ?>
            </article><!-- END article -->
          </div><!-- END container -->
        </div><!-- END jumbotron -->
      <?php
      endwhile;
    endif; //Ended condition for querying albums
  wp_reset_query();
?>


<?php get_footer(); ?>
