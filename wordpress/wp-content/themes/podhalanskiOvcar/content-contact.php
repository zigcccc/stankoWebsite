<?php
  while(have_rows('contact_section')):
    the_row();
    //Vars
    $email = get_sub_field('email');
    $maps = get_sub_field('map_location');
    $lng = $maps['lng'];
    $lat = $maps['lat'];
    $address = $maps['address'];
    ?>

      <div class="jumbotron jumbotron-fluid kontakt">
          <div class="container">
              <h2><?php echo get_sub_field('section_title'); ?></h2>
              <div class="row contact-row">
                  <form action="https://formspree.io/<?php echo $email; ?>" method="POST">
                      <div class="col-md-5 col-sm-12">
                          <div class="form-group">
                              <label for="name">Ime in priimek</label>
                              <input type="text" name="name" class="form-control" id="name">
                          </div>
                          <div class="form-group">
                              <label for="email">E-mail</label>
                              <input type="email" name="email" class="form-control" id="email">
                          </div>
                          <div class="form-group">
                              <label for="subject">Zadeva</label>
                              <input type="text" name="subject" class="form-control" id="subject">
                          </div>
                      </div>
                      <div class="col-md-5 col-sm-12">
                          <div class="form-group">
                              <label for="message">Sporočilo</label>
                              <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                          </div>
                      </div>
                      <div class="col-md-2 col-sm-6 offset-sm-3 offset-md-0">
                          <button type="submit">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/send-icon.svg">
                          </button>
                      </div>
                  </form>
              </div>
              <div class="row">
                  <div class="col-md-12 google-maps" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/world-map.svg');">
                    <iframe style="pointer-events:none;" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $address; ?>&amp;key=AIzaSyAqwrBCCmq9UtT-QpBwogGPu4ypEy8YSNY" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
              </div>
          </div>
      </div>

<?php endwhile; ?>
