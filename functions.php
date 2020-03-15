<?php

function lunar_enqueue_styles() {
  wp_enqueue_style('lunar_style', get_template_directory_uri() . '/style.css', false, filemtime(get_theme_file_path('style.css')), 'all');
}
add_action( 'wp_enqueue_scripts', 'lunar_enqueue_styles' );

function scrappy_widgets_init() {
  register_sidebar( array(
    'id' => 'right-sidebar',
    'name' => 'Right Sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widget-title">',
    'after_title' => '</h2>'
    )
  );
}
add_action( 'widgets_init', 'scrappy_widgets_init' );
