<?php
/**
 * The template used for displaying the gallery content.
 *
 * @package wolf
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'wolf' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <?php if ( 'post' == get_post_type() ) : ?>
        <div class="entry-meta">
            <?php wolf_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
    <?php else : ?>
        <?php
            $images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
            if ( $images ) :
                $total_images = count( $images );
                $image = array_shift( $images );
                $image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
        ?>

        <figure class="gallery-thumb">
            <a href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
        </figure><!-- .gallery-thumb -->

        <p><em><?php printf( _n( 'This gallery contains <a %1$s>%2$s photo</a>.', 'This gallery contains <a %1$s>%2$s photos</a>.', $total_images, 'wolf' ),
                'href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'wolf' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
                number_format_i18n( $total_images )
            ); ?></em></p>
    <?php endif; ?>
    <?php the_excerpt(); ?>
    <?php endif; ?>

    <footer class="entry-meta">
        <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
            <?php
                /* translators: used between list items, there is a space after the comma */
                $categories_list = get_the_category_list( __( ', ', 'wolf' ) );
                if ( $categories_list && wolf_categorized_blog() ) :
            ?>
            <span class="cat-links">
                <?php printf( __( 'Posted in %1$s', 'wolf' ), $categories_list ); ?>
            </span>
            <?php endif; // End if categories ?>

            <?php
                $tags_list = get_the_tag_list( '', __( ', ', 'wolf' ) );
                if ( $tags_list ) :
            ?>
            <span class="sep"> | </span>
            <span class="tag-links">
                <?php printf( __( 'Tagged %1$s', 'wolf' ), $tags_list ); ?>
            </span>
            <?php endif; // End if $tags_list ?>
        <?php endif; // End if 'post' == get_post_type() ?>

        <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
        <span class="sep"> | </span>
        <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wolf' ), __( '1 Comment', 'wolf' ), __( '% Comments', 'wolf' ) ); ?></span>
        <?php endif; ?>

        <?php edit_post_link( __( 'Edit', 'wolf' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
    </footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
