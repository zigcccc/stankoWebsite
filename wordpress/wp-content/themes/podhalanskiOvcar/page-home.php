<?php get_header(); ?>

<div class="jumbotron jumbotron-fluid landing-section">
    <div class="container">
        <div class="section-heading">
            <h1><?php echo get_bloginfo('name'); ?></h1>
            <h2><?php echo get_field('site_subtitle'); ?></h2>
            <p class="lead"><?php echo get_bloginfo('description'); ?></p>
            <button class="main-cta" id="landing-cta-btn">več o meni in mojem lastniku</button>
        </div>
        <img src="<?php echo get_field('header_image'); ?>" alt="dog head">
    </div>
    <?php if(have_rows('social_links')):
      //Get number of social links
      $row = 1;
      $num_of_links = count(get_field('social_links'));

      //Calculate what number to assign to bootstrap col class
      $col_num = floor(12 / $num_of_links);
      $difference = 12 - $num_of_links;
      $offset = floor($difference / 2);
    ?>
      <div class="social-banner">
        <div class="container">
          <div class="row">
            <?php while(have_rows('social_links')): the_row();
              //Social link name
              $social_link_name = get_sub_field('social_link_name');

              //Social link href
              $social_link_href = get_sub_field('social_link_href');
            ?>
              <div class="col-md-<?php echo $col_num; if(12 % $num_of_links != 0 && $row == 1){ echo ' offset-md-' . $offset; }?>">
                  <a href="<?php echo $social_link_href ?>" target="_blank">
                    <i class="socicon socicon-<?php echo $social_link_name; ?>"></i>
                  </a>
              </div><!-- END col -->
            <?php $row++; endwhile; ?>
          </div><!-- END row -->
        </div><!-- END container -->
      </div><!-- END social-banner -->
    <?php endif; ?>
</div><!-- END landing section -->

<?php
  //Create functions for specific elements inside sections
  function bg_texture($texture){
    switch($texture):
      case 'circles':
        return 'contemporary_china.png';
        break;
      case 'squares':
        return 'square_bg.png';
        break;
      case 'bricks':
        return 'sayagata-400px.png';
        break;
      case 'cartograph':
        return 'cartographer.png';
        break;
      default:
        return '';
        break;
    endswitch;
  }

  function section_id($section){
    $section_id = str_replace(' ', '-', strtolower($section)); // Replaces all spaces with hyphens.
    $section_id = str_replace('č', 'c', $section_id);
    $section_id = str_replace('š', 's', $section_id);
    $section_id = str_replace('ž', 'z', $section_id);
    $section_id = str_replace('?', '', $section_id);

    return $section_id;
  }

  function even($row){
    if($row % 2 == 0):
      return true;
    endif;
  }

  //Check for static sections first
  if(have_rows('static_section')):

    $static_row = 1;

    include(locate_template('content-static_section.php'));

  endif;

  //Check for dynamic sections second
  if(have_rows('dynamic_section')):

    $dynamic_row = 1;

    include(locate_template('content-dynamic_section.php'));

  endif;

  //Check for contact section last
  if(have_rows('contact_section')):

    include(locate_template('content-contact.php'));

  endif;
?>



<?php get_footer(); ?>
