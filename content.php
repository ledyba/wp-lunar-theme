<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <h1 class="entry-title"><?php the_title(); ?></h1>
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
  </header><!-- .entry-header -->

  <div class="entry-content">
    <?php the_content(); ?>
    <?php wp_link_pages( array( 'before' => '<div class="page-links">' .'Pages:', 'after' => '</div>' ) ); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php
      /* translators: used between list items, there is a space after the comma */
      $category_list = get_the_category_list(', ');

      /* translators: used between list items, there is a space after the comma */
      $tag_list = get_the_tag_list( '', ', ' );

      // But this blog has loads of categories so we should probably display them here
      if ( '' != $tag_list ) {
        $meta_text = '<span class="cat-links">Categories: %1$s</span>';
        $meta_text .= '<span class="tag-links">Tags: %2$s</span>';
      } else {
        $meta_text = '<span class="cat-links">Categories: %1$s</span>';
      }

      printf(
        $meta_text,
        $category_list,
        $tag_list
      );
    ?>
  </footer>
</article>
