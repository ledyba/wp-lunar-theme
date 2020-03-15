<?php

function lunar_enqueue_styles() {
  wp_enqueue_style('lunar_style', get_template_directory_uri() . '/style.css', false, filemtime(get_theme_file_path('style.css')), 'all');
}

add_action( 'wp_enqueue_scripts', 'lunar_enqueue_styles' );
