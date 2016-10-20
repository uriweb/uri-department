<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<div id="comments">

<?php if ($comments) : ?>

<div class="cheader"><?php comments_number('Nothing yet', 'One response left', '% responses left' );?></div>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">

<div class="chold">
			<div class="grav"><?php echo get_avatar( $comment, 40 ); ?></div>

<div class="ctext">

<p class="cauthor"><?php comment_author_link() ?></p>

<?php comment_text() ?>

<p class="cmeta"><?php if ($comment->comment_approved == '0') : ?><span style="color:#ca1717;">Your comment is awaiting moderation. There is no need to repost. &mdash;</span><?php else: ?> <?php comment_date('F jS, Y') ?> at <?php comment_time() ?></p><?php endif; ?></p>

</div>

<div style="clear: both"></div>

</div>

		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div class="cheader">Leave a response:</div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<?php else : ?>

<fieldset>
<label for="author"><strong>Name</strong> <?php if ($req) echo "(required)"; ?></label><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" />
</fieldset>

<fieldset>
<label for="email"><strong>Email</strong> (always hidden) <?php if ($req) echo "(required)"; ?></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" />
</fieldset>

<fieldset>
<label for="url">Website</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" />
</fieldset>

<?php endif; ?>

<fieldset>
<label for="comment">Your Comments:</label>
<br />
<textarea name="comment" id="comment" tabindex="4"></textarea>
</fieldset>

<input type="submit" tabindex="5" value="Submit Comment" alt="Submit Comment" title="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>