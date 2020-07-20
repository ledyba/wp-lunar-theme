<?php

add_action('pre_get_posts', function($query) {
  if($query->is_day || $query->is_time) {
    $query->is_date = false;
    $query->is_day = false;
    $query->is_time = false;
    $query->is_archive = false;
    $query->is_post_type_archive = false;
    $query->is_posts_page = false;
    $query->is_singular = true;
    $query->is_single = true;
  }
});

add_action('after_setup_theme', function(){
  register_nav_menu('menu', 'Header Navigation Menu');
});

add_action('wp_enqueue_scripts', function(){
  wp_enqueue_style('lunar_style', get_template_directory_uri() . '/style.css', false, filemtime(get_theme_file_path('style.css')), 'all');
});

add_action('widgets_init', function(){
  register_sidebar( array(
    'id' => 'right-sidebar',
    'name' => 'Right Sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
    )
  );
});

// disable embedded jquery
add_filter('init',function(){
  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_deregister_script('wp-embed');
  }
  add_theme_support( 'automatic-feed-links' );
});

function the_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '&larr;',
    'next_text'    => '&rarr;',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
}
