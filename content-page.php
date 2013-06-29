<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wolf
 */
?>

<?php tha_entry_before(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php tha_entry_top(); ?>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php do_action('wolf_before_page'); ?>

		<?php the_content(); ?>
		<?php 
			wp_link_pages( array( 
				'before' => '<div class="page-links">' . __( 'Pages:', 'wolf' ), 
				'after' => '</div>',
			) ); 
		?>

		<?php do_action('wolf_after_page'); ?>

	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'wolf' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php tha_entry_bottom(); ?>
</article><!-- #post-## -->
<?php tha_entry_after(); ?>
