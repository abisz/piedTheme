<?php
/**
 * Template part for displaying posts.
 *
 * @package piedTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    /*making sure the featured image is only displayed if it has one, it's the first post and it's not an archive page*/
    if (has_post_thumbnail() && ($wp_query->current_post == 0) && !is_archive()) {
        echo '<div class="front-post-thumbnail clear">';
        echo '<a href="' . get_permalink() . '" title="' . __('Read ', 'piedtheme') . get_the_title() . '" rel="bookmark">';
        echo the_post_thumbnail('large-thumb');
        echo '</a>';
        echo '</div>';
    }
    ?>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">

            <?php piedtheme_posted_on(); ?>

            <?php
            echo get_the_tag_list( '<span class="meta"><ul><li><i class="fa fa-tag"></i>', '</li><li>', '</li></ul><i class="fa fa-tag back"></i></span>' );
            ?>

            <?php
            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                echo '<span class="comments-link meta">';
                comments_popup_link( __( 'Leave a comment', 'piedtheme' ), __( '<i class="fa fa-comment"></i>1 Comment', 'piedtheme' ), __( '<i class="fa fa-comment"></i>% Comments', 'piedtheme' ) );
                echo '<i class="fa fa-comment back"></i></span>';
            }
            ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
            the_excerpt();
		?>
	</div><!-- .entry-content -->

    <footer class="entry-footer continue-reading">
            <?php echo '<a class="btn btn-continue" href="' . get_permalink() . '" title="' . __('Continue Reading ', 'piedtheme') . get_the_title() . '" rel="bookmark">Read Full Article</a>'; ?>
    </footer>


</article><!-- #post-## -->
