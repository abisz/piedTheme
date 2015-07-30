<?php
/**
 * Template part for displaying single posts.
 *
 * @package piedTheme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<header class="entry-header">

        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

            <?php piedtheme_posted_on(); ?>

            <?php
            echo get_the_tag_list( '<span class="meta meta-tags"><ul><li><i class="fa fa-tag"></i>', '</li><li>', '</li></ul><i class="fa fa-tag back"></i></span>' );
            ?>

            <?php
            if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
                echo '<span class="meta comments-link">';
                comments_popup_link( __( 'Leave a comment', 'piedtheme' ), __( '<i class="fa fa-comment"></i>1 Comment', 'piedtheme' ), __( '<i class="fa fa-comment"></i>% Comments', 'my-simone' ) );
                echo '<i class="fa fa-comment back"></i></span>';
            }
            ?>

        </div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'piedtheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
        <?php
            edit_post_link( esc_html__( 'Edit', 'piedtheme' ), '<span class="edit-link">', '</span>' );
        ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

