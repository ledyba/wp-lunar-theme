<?php get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">
<?php
while ( have_posts() ) {
   the_post();
   get_template_part( 'article', 'page' );
 }
?>
  </div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
