<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <?php if ( 'post' == get_post_type() ) { ?>
    <div class="entry-meta">
      <div class="post-date">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute('echo=0'); ?> <?php the_title_attribute(); ?>">
          <?php the_time('Y-m-d'); ?>
        </a>
      </div>
    </div>
  <?php } ?>

    <?php edit_post_link( 'Edit', '<span class="edit-link">', '</span>' ); ?>

    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  </header>

<?php if ( is_search() ) { ?>
  <?php // Only display Excerpts for Search ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
<?php } else { ?>
  <div class="entry-content">
    <?php the_content('Read more'); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links"> Pages:', 'after' => '</div>' ) ); ?>
  </div>
<?php } ?>

  <footer class="entry-meta">
    <?php
    if ( 'post' == get_post_type() ) {
      // Hide category and tag text for pages on Search
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list(', ');
      if ( $categories_list ) {
    ?>
      <span class="cat-links">
        <?php printf('Posted in %1$s', $categories_list ); ?>
      </span>
    <?php } ?>
    <?php
      $tags_list = get_the_tag_list( '', ', ' );
      if ( $tags_list ) {
    ?>
      <span class="tag-links">
        <?php printf('Tagged %1$s', $tags_list ); ?>
      </span>
    <?php } ?>
  <?php } ?>

  <?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
    <span class="comments-link"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
  <?php } ?>
  </footer>
</article>
