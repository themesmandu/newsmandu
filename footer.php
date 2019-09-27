<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmandu
 */

?>

	</div><!-- #content -->
	<footer id="footer">
			<div class="newsletter-widgets col-md-6 offset-md-3">
				<?php dynamic_sidebar( 'Newsletter-widget' ); ?>
			</div>
			<div class="gallery">
			<?php dynamic_sidebar( 'Footer 1' ); ?>
			</div>
			<div class="bottom-footer">
				<div class="container">
					<div class="row footer-widgets">
						<?php dynamic_sidebar( 'Footer 2' ); ?>
					</div>
					<div class="site-info">
						<?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( ' %s', 'newsmandu' ), '<a href="https://wordpress.org/">WordPress</a>' );
						?>
						<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'newsmandu' ), 'Newsmandu', '<a href="">Thememandu</a>' );
						?>
					</div><!-- .site-info -->
				</div>
			</div>
				<button class="up-btn" id="up-btn" title="<?php echo esc_html( __( 'Go to top', 'newsmandu' ) ); ?>" style="display: block;"><i class="fas fa-chevron-up"></i></button>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
