<?php

function theme_style(){
  wp_enqueue_style('bootstrap_css_map', get_template_directory_uri() . '/css/bootstrap.css.map');
  wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
  wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Noto+Sans:400,700|Noto+Serif:400,700|Material+Icons');
  wp_enqueue_style('social-icons', 'https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css');
  wp_enqueue_style('custom_css', get_template_directory_uri() . '/css/main.min.css', '', false);
}

add_action('wp_enqueue_scripts', 'theme_style');

function theme_scripts(){
  wp_enqueue_script('jquery_custom', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', '', false, false);
  wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', array('http://tether.io/'), false, true);
  wp_enqueue_script('main_script', get_template_directory_uri() . '/js/main.js', array(), false, true);
}

add_action('wp_enqueue_scripts', 'theme_scripts');

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


add_theme_support( 'post-thumbnails', array( 'post' ) );


//Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;

  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );
