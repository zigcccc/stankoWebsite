<?php get_header(); ?>
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <h2>Oprostite, stran ki ste jo iskali žal ne obstaja ali pa trenutno ni dostopna.</h2>
      <hr>
      <h3>Bi morda raje obiskali:</h3>
    </div>
  </div>
</div>

<?php
  $args = array(
    post_type => 'page',
    post_per_page => 3,
    order => 'ASC'
  );

  $loop = New WP_Query($args); ?>

  <div class="container">
    <div class="row page-icons">

  <?php
    $n = 0;
    while($loop->have_posts()):
      $loop->the_post();
      $n++;

      if($n == 1){
        $icon = 'home';
      }
      else if($n == 2){
        $icon = 'collections';
      }
      else{
        $icon = 'speaker_notes';
      }
      ?>

      <div class="col-sm-4">
        <a href="<?php the_permalink(); ?>">
          <div class="page-icon"><i class="material-icons"><?php echo $icon; ?></i></div>
          <h5><?php the_title(); ?></h5>
        </a>
      </div>

      <?php
  endwhile;
  wp_reset_query();
?>
</div><!-- END row -->
</div><!-- END container -->
<?php get_footer(); ?>
