<?php

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
});
