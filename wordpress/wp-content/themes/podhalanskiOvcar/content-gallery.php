<?php

  $args = array(
    'post_type' => 'albums',
    'posts_per_page' => 2
  );

  $loop = new WP_Query($args);

if($loop->have_posts()): ?>

  <?php
        $previous = -1;
        $image_row_counter = 0;
        while($loop->have_posts()): $loop->the_post();
          $image_row_counter++;
        endwhile;
        ?>
        <?php $row = 0; while($loop->have_posts()): $loop->the_post(); $row++;?>
        <div class="row image-row<?php if($row == $image_row_counter){ echo ' last-image-row'; } ?>"> <!-- Start image row for every new album in Post Type = images -->

          <?php if(have_rows('album_images')): //Check to see if there are images in album

            $n = 0; //Initialize counter to limit number of images displayed
            while(have_rows('album_images')):
              the_row(); //Start the loop inside the album
              if($n >= 4){ //Check to see if counter has reached 5; if so end the album loop
                break;
              }
              $n++; //Increase the counter by 1;
            endwhile; //$n value is now equal to the number of images in album OR max 4

            $size = 12 / $n;

            $i = 0; //Initialize image counter
            while(have_rows('album_images')): //Start the loop inside the album
              the_row();

              if($i >= 4){ //Check to see if image counter has reached 4; if so end the image loop
                break;
              }

              //Image
              $image = get_sub_field('image');

              //Set col width
              if ($previous != -1 && $previous == $n) {
                if ($i == 0) {
                  $col_num = $size + 2;
                }
                else if ($i == 1) {
                  $col_num = $size - 1;
                }
                else if ($i == 2) {
                  $col_num = $size;
                }
                else {
                  $col_num = $size - 1;
                }
              }
              else {
                $col_num = $size;
              }

            ?>

            <!-- Display images -->
            <div class="col-md-<?php echo $col_num; ?> col-sm-6" style="background-image: url('<?php echo $image; ?>')"></div>

            <?php

            $i++;
          endwhile; //Close loop for image check
          $previous = $n;

        endif; ?>

      </div><!-- END image-row -->

  <?php
  //Close loop for custom post type
  endwhile; wp_reset_query();
  ?>

<?php endif; ?>

<div class="row">
  <div class="col-md-4 offset-md-4">
    <a href="<?php echo get_bloginfo('url') . '/galerija/'; ?>">
      <button class="section-cta">
        <?php echo get_sub_field('dynamic_section_button_text'); ?>
      </button>
    </a>
  </div>
</div><!-- END row -->
