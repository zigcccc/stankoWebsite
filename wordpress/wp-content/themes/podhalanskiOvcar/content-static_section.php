<?php while(have_rows('static_section')): the_row(); ?>
  <?php
    $bg_texture = bg_texture(get_sub_field('section_bg_texture'));
    $bg_color = get_sub_field('section_bg_color');
  ?>
  <div id="<?php echo section_id(get_sub_field('section_title')); ?>" class="jumbotron jumbotron-fluid static-section"<?php echo ' style="background-color:'. $bg_color .'; background-image: url('. get_template_directory_uri() . '/img/' .  $bg_texture .')"';?>>
    <div class="container">
      <?php //Use $static_row to assign odd or even number to section ?>
      <h2<?php if(even($static_row)){ echo ' class="float-md-right"'; } ?>><?php echo get_sub_field('section_title'); ?></h2>

      <div class="row">
        <div class="col-md-5 offset-md-1<?php if(even($static_row)){ echo ' float-md-right'; } ?>">

          <h3><?php echo get_sub_field('section_subtitle'); ?></h3>
          <p class="section-text"><?php echo get_sub_field('basic_info', false, false); ?></p>

        </div><!-- END col -->
      </div><!-- END row -->


      <?php if(have_rows('extra_info')): ?>
      <div class="row extra-content">
        <div class="col-md-5 offset-md-1<?php if(even($static_row)){ echo ' float-md-right'; } ?>">
          <?php

              while(have_rows('extra_info')): the_row(); ?>

                <h4><?php echo get_sub_field('extra_info_title'); ?></h4>
                <p class="section-text"><?php echo get_sub_field('extra_info_paragraph', false, false); ?></p>

              <?php endwhile; //Closed inner loop

          ?>
        </div><!-- END col -->
        <?php if(get_sub_field('extra_info_sliders')): ?>
          <div class="col-md-5 float-md-right">
            <div class="extra-info">
            <?php
              while (have_rows('extra_info_sliders_value')):
                the_row();
                $extra_value = get_sub_field('extra_info_slider_value');
                ?>
                <div class="extra-info-sliders">
                  <h4><?php echo get_sub_field('extra_info_slider_name'); ?></h4>
                  <div class="extra-info-slider-value" style="width: <?php echo $extra_value; ?>%"></div>
                  <div class="full-width"></div>
                </div><!-- END extra-info-sliders -->
                <?php
              endwhile;
             ?>
          </div><!-- END extra info -->
        </div><!-- END col sliders -->
      <?php endif; ?><!-- Closed condition for extra info sliders -->
      <?php
        if(get_sub_field('extra_contact_info')):
          $extra_info_count = 0;
          ?>
          <div class="col-md-5">
            <div class="extra-contact-info">
              <?php
                while(have_rows('extra_contact_info_values')):
                  the_row();
                  $extra_info_count++;
                  ?>
                  <div class="extra-contact-info-group<?php if($extra_info_count == 1){ echo ' first-info'; } ?>">
                    <h4><?php echo get_sub_field('extra_contact_info_label'); ?></h4>
                    <strong><?php echo get_sub_field('extra_contact_info_value'); ?></strong>
                  </div>
                  <?php
                endwhile;
              ?>
            </div>
          </div><!-- END col extra-contact -->
      <?php endif; ?><!-- Closed condition for extra contact info -->
      </div><!-- END row-extra -->

      <button class="section-cta"><?php echo get_sub_field('button_text'); ?></button>

      <?php endif; //Closed condition for inner loop ?>

    </div><!-- END container -->

    <?php if(get_sub_field('section_image')): ?>
      <img src="<?php echo get_sub_field('section_image'); ?>" alt="doggy">
    <?php endif; //Closed condition for section image ?>

  </div><!-- END jumbotron -->

<?php $static_row++; endwhile; //Closed outer loop ?>
