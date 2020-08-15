<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <?php
  if (is_search() || is_archive() || is_paged()) {
    echo '<meta name="robots" content="noindex,follow" />'."\n";
  }?>
  <title><?php
    global $page, $paged;
    wp_title( '|', true, 'right' );
    // Add the blog name.
    bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
      echo " $site_description";
    }
    if ( $paged >= 2 || $page >= 2 ) {
      echo ' | ';
      echo sprintf("%s", max($paged, $page));
    }
  ?></title>
  <?php
    wp_head();
  ?>
</head>
<body <?php body_class(); ?>>
<div id="lunar-icon"></div>
<div id="page">
  <?php do_action( 'before' ); ?>
  <header id="masthead" class="site-header" role="banner">
    <h1 class="site-title"><a href="<?php echo home_url('/'); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <blockquote style="font-style: normal;"><?php
      include(dirname(__FILE__).'/kotoba.php/kotoba.php');
    ?></blockquote>
  </header>

  <div id="main">
