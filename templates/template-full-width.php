<?php
/**
 * Template Name: Full Width
 *
 * @package wolf
 */

get_header(); ?>

	<div id="primary" class="fullwidth">
			<div id="content" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php do_action('wolf_before_single'); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php wolf_content_nav( 'nav-below' ); ?>

			<?php do_action('wolf_after_single'); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() )
					comments_template();
			?>

		<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>