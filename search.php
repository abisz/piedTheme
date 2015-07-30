<?php
/**
 * The template for displaying search results pages.
 *
 * @package piedTheme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'piedtheme' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

            <?php the_posts_pagination( array(
                'prev_text'          => __( '<i class="fa fa-backward"></i>', 'piedtheme' ),
                'next_text'          => __( '<i class="fa fa-forward"></i>', 'piedtheme' ),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'piedtheme' ) . ' </span>',
            ) ); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
