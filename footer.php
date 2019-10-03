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
			<div class="newsletter-widgets">
				<?php dynamic_sidebar( 'Newsletter-widget' ); ?>
			</div>
			<?php if ( get_theme_mod( 'footer_instagram_title' ) || get_theme_mod( 'footer_instagram' ) ) : ?>
			<div class="footer-gallery">
				<?php if ( get_theme_mod( 'footer_instagram_title' ) ) : ?>
					<h2><?php echo esc_html( get_theme_mod( 'footer_instagram_title' ) ); ?></h2>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'footer_instagram' ) ) : ?>
					<?php echo do_shortcode( get_theme_mod( 'footer_instagram' ) ); ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="bottom-footer">
				<div class="container">
					<?php
					$active = array();
					for ( $i = 1; $i <= 4; $i++ ) {
						if ( is_active_sidebar( 'footer-' . $i ) ) {
							$active[] = $i;
						}
					}
					?>
					<?php if ( 0 !== count( $active ) ) { ?>
					<div id="footer-widgets" class="row footer-widgets">
						<?php foreach ( $active as $footer_widget_id ) : ?>
						<div class="col-lg-3 col-sm-6 column">
							<?php dynamic_sidebar( 'footer-' . $footer_widget_id ); ?>
						</div>
					<?php endforeach; ?>
					</div>
					<?php } ?>
					<div class="row footer-social">
						<?php
						if ( has_nav_menu( 'social_menu' ) ) :
							wp_nav_menu(
								array(
									'theme_location' => 'social_menu',
								)
							);
									endif;
						?>
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
