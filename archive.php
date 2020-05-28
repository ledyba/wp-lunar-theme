<?php get_header(); ?>
<section id="primary" class="site-content">
  <div id="content" role="main">

  <?php if ( have_posts() ) { ?>

    <header class="page-header">
      <h1 class="page-title">
        <?php
          if ( is_category() ) {
            printf('Category Archives: %s', '<span>' . single_cat_title( '', false ) . '</span>' );

          } elseif ( is_tag() ) {
            printf('Tag Archives: %s', '<span>' . single_tag_title( '', false ) . '</span>' );

          } elseif ( is_author() ) {
            /* Queue the first post, that way we know
             * what author we're dealing with (if that is the case).
            */
            the_post();
            printf('Author Archives: %s', '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
            /* Since we called the_post() above, we need to
             * rewind the loop back to the beginning that way
             * we can run the loop properly, in full.
             */
            rewind_posts();

          } elseif ( is_day() ) {
            printf('Daily Archives: %s', '<span>' . get_the_date() . '</span>' );

          } elseif ( is_month() ) {
            printf('Monthly Archives: %s', '<span>' . get_the_date( 'F Y' ) . '</span>' );

          } elseif ( is_year() ) {
            printf('Yearly Archives: %s', '<span>' . get_the_date( 'Y' ) . '</span>' );
          } else {
            echo ('Archives');
            echo ('<!-- '. get_post_type() .' -->');
          }
        ?>
      </h1>
      <?php
        if ( is_category() ) {
          // show an optional category description
          $category_description = category_description();
          if ( ! empty( $category_description ) )
            echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

        } elseif ( is_tag() ) {
          // show an optional tag description
          $tag_description = tag_description();
          if ( ! empty( $tag_description ) )
            echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
        }
      ?>
    </header>
    <hr />
    <?php
    rewind_posts();
    while ( have_posts() ) {
      the_post();
      get_template_part( 'article', get_post_format() );
    }
    ?>
  <?php } else { ?>

    <article id="post-0" class="post no-results not-found">
      <header class="entry-header">
        <h1 class="entry-title">Nothing Found</h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
        <p>'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.'</p>
        <?php get_search_form(); ?>
      </div><!-- .entry-content -->
    </article><!-- #post-0 -->

  <?php } ?>
  </div>
  <?php the_pagination(); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
