<?php
function better_comments($comment, $args, $depth) {
 $GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div class="padding-10">
  <div id="comment-<?php comment_ID(); ?>" class="comment-body">
     <div class="comment-body-inner">

      <div class="comment-avatar">
        <?php echo get_avatar($comment, $size = '45', $default = get_bloginfo('stylesheet_directory').'/images/noimg.jpg' ); ?>
      </div>

      <div class="comment-author vcard">
        <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
      </div>

      <div class="comment-meta commentmetadata">
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a>
        <?php edit_comment_link(__('(Edit)'),'  ','') ?>
      </div>

      <div class="spacer"></div>

      <?php if ($comment->comment_approved == '0') : ?>
        <em><?php _e('Your comment is awaiting moderation.') ?></em>
        <br />
      <?php endif; ?>

      <?php comment_text() ?>

    </div>
  </div>
  </div>

<?php } ?>

<?php wp_list_comments( array( 'callback' => 'better_comments' )); ?>

<?php if(comments_open()) : ?>
	<?php if(get_option('comment_registration') && !$user_ID) : ?>
		<p><?php _e("You have to stay", "kizitheme"); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e("logged in", "kizitheme"); ?></a> <?php _e("for send comments", "kizitheme"); ?></p><?php else : ?>
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
			<?php if($user_ID) : ?>
				<br /><br /><p><?php _e("Welcome", "kizitheme"); ?>, <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account"><?php _e("Logout", "kizitheme"); ?> &raquo;</a></p>
			  <br />
			<?php else : ?>
				<div style="float:left;"><p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" placeholder="Name" /></div>
				<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" placeholder="Email" />
			<?php endif; ?>
			<p><textarea name="comment" id="comment" cols="70%" rows="5" tabindex="4" placeholder="Message"></textarea></p>
			<p><input name="submit" class="submit" type="submit" id="submit" tabindex="5" value="Comment" />
			<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	<?php endif; ?>
<?php else : ?>
	<p><?php _e("The comments are closed", "kizitheme"); ?></p>
<?php endif; ?>