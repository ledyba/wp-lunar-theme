<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute('echo=0'); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
    <div class="media-posted-on">
    <?php
      if ( is_sticky() && ! is_single() ) {
        printf('<a href="%1$s" title="%2$s" rel="bookmark">Featured</a>',
          esc_url( get_permalink() ),
          esc_attr( get_the_title() )
        );
      } else {
        printf('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="byline"> by <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>',
          esc_url( get_permalink() ),
          esc_attr( get_the_time() ),
          esc_attr( get_the_date( 'c' ) ),
          esc_html( get_the_date() ),
          esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
          esc_attr( sprintf( __( 'View all posts by %s', 'scrappy' ), get_the_author() ) ),
          esc_html( get_the_author() )
        );
      }
      edit_post_link('Edit', '<span class="sep"> | </span><span class="media-edit-link">', '</span>' );
    ?>
    </div>
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
    <br>
    <span class="comments-link"><?php comments_popup_link('Leave a comment', '1 Comment', '% Comments'); ?></span>
  <?php } ?>
  </footer>
</article>
