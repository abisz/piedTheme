<?php
/**
 * Template part for displaying posts.
 *
 * @package piedTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">

            <?php piedtheme_posted_on(); ?>

            <?php
            echo get_the_tag_list( '<ul><li><i class="fa fa-tag"></i>', '</li><li>', '</li></ul>' );
            ?>

            <?php
            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                echo '<span class="comments-link">';
                comments_popup_link( __( 'Leave a comment', 'my-simone' ), __( '<i class="fa fa-comment"></i>1 Comment', 'my-simone' ), __( '<i class="fa fa-comment"></i>% Comments', 'my-simone' ) );
                echo '</span>';
            }
            ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'piedtheme' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'piedtheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


</article><!-- #post-## -->
