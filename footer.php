<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package piedTheme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

        <?php piedtheme_social_menu(); ?>

        <div id="impressum">
            <h1>Impressum:</h1>
            <p>Simon Reinsperger</p>
            <p>1220, Wien </p>
            <p>privater Blog über Webtechnologien</p>
        </div>

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'piedtheme' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'piedtheme' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'piedtheme' ), 'piedtheme', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->


	</footer><!-- #colophon -->
</div><!-- #page -->





<?php wp_footer(); ?>

</body>
</html>
