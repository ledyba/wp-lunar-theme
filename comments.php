<hr />
<div id="comments" class="comments-area">
<?php if(post_password_required()) { ?>
  <p class="nopassword">This post is password protected. Enter the password to view any comments.</p>
</div>
<?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
  }
?>

<?php if (have_comments()) { ?>
  <h2 class="comments-title">
    <?php
      printf('%1$s comments', number_format_i18n(get_comments_number()));
    ?>
  </h2>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
  <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
    <h1 class="assistive-text">Comment navigation</h1>
    <div class="nav-previous"><?php previous_comments_link('Older Comments'); ?>/div>
    <div class="nav-next"><?php next_comments_link('Newer Comments &raquo;'); ?></div>
  </nav>
<?php } ?>

  <ol class="commentlist">
    <?php wp_list_comments(); ?>
  </ol>

  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { // are there comments to navigate through ?>
  <nav role="navigation" id="comment-nav-below" class="site-navigation comment-navigation">
    <h1 class="assistive-text"><?php _e( 'Comment navigation', 'scrappy' ); ?></h1>
    <div class="nav-previous"><?php previous_comments_link( __( '&laquo; Older Comments', 'scrappy' ) ); ?></div>
    <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &raquo;', 'scrappy' ) ); ?></div>
  </nav>
  <?php } ?>

<?php } ?>

<?php
  // If comments are closed and there are no comments, let's leave a little note, shall we?
  if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')){
?>
  <p class="nocomments">Comments are closed.</p>
<?php } ?>

<?php comment_form(); ?>
