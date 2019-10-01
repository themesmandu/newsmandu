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
			<div class="footer-gallery">
			<?php dynamic_sidebar( 'Footer 1' ); ?>
			</div>
			<div class="bottom-footer">
				<div class="container">
					<div class="row footer-widgets">
						<?php dynamic_sidebar( 'Footer 2' ); ?>
					</div>
					<div class="site-info row">
						<div class="copyright-text col-md-6">
							<p><?php echo esc_html( get_theme_mod( 'footer_copyright_text' ) ); ?></p>
						</div>
						<div class="author col-md-6">
							<?php
								/* translators: 1: Theme name, 2: Theme author. */
								printf( esc_html__( 'Theme: %1$s by %2$s.', 'newsmandu' ), 'Newsmandu', '<a href="">Thememandu</a>' );
							?>
						</div>
						
					</div><!-- .site-info -->
				</div>
			</div>
				<button class="up-btn" id="up-btn" title="<?php echo esc_html( __( 'Go to top', 'newsmandu' ) ); ?>" style="display: block;"><i class="fas fa-chevron-up"></i></button>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
