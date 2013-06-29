<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to wolf_comment() which is
 * located in the inc/template-tags.php file.
 *
 * @package wolf
 */
?>

<?php
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	if ( post_password_required() )
		return;
?>
	
	<?php tha_comments_before(); ?>
	<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wolf' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="navigation-comment" role="navigation">
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wolf' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wolf' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wolf' ) ); ?></div>
		</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation ?>

		<?php do_action('wolf_before_comment_list'); ?>

		<ol class="comment-list">

			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use wolf_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define wolf_comment() and that will be used instead.
				 * See wolf_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'wolf_comment' ) );
			?>
		</ol><!-- .comment-list -->

		<?php do_action('wolf_after_comment_list'); ?>


		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation-comment" role="navigation">
			<h1 class="screen-reader"><?php _e( 'Comment navigation', 'wolf' ); ?></h1>
			<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'wolf' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'wolf' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'wolf' ) ); ?></div>
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', '_wolf' ); ?></p>
	<?php endif; ?>

	<?php do_action('wolf_before_comment_form'); ?>

	<?php comment_form(); ?>

	<?php do_action('wolf_after_comment_form'); ?>

</div><!-- #comments -->
<?php tha_comments_after(); ?>

