<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark"><?php the_title(); ?></a><?php edit_post_link('[Edit]', '&nbsp;<span class="media-edit-link">', '</span>' ); ?></h1>
  </header>

  <div class="entry-content">
    <?php the_content('Read more'); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"> Pages:', 'after' => '</div>' ) ); ?>
  </div>
</article>
