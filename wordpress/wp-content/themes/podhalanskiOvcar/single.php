<?php get_header(); ?>

  <?php
    if(have_posts()):
      while(have_posts()):
        the_post();
        //Vars
        $author_id = get_the_author_meta('ID');
        $avatar = get_avatar_url($author_id, array(128, 'gravatar_default'));
        $post_thumbnail_size = 'full';  ?>

          <div class="jumbotron jumbotron-fluid" style="background-image: url('<?php the_post_thumbnail_url($large); ?>')"></div>
          <div class="container">
            <div class="avatar" style="background-image: url('<?php echo $avatar; ?>')"></div>
            <h1><?php the_title(); ?></h1>
            <small class="author-meta"><?php the_author(); ?></small>
            <small class="author-meta"><?php the_time('F j, Y'); ?></small>
            <?php the_content(); ?>
            <div class="row">
              <div class="col-sm-4 offset-sm-4">
                <a href="<?php echo get_template_directory_uri() . '/blog/';?>">
                  <button class="blog-cta">Nazaj na vse članke</button>
                </a>
              </div>
            </div>
          </div>

        <?php
      endwhile;
    endif;
  wp_reset_query(); ?>

<?php get_footer(); ?>
