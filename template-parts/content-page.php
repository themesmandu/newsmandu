<?php
/**
 * Template part for displaying page content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu-Magazine
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php
	the_post_thumbnail(
		'Newsmandu-Magazine-featured-900-600',
		array(
			'class' => 'img-fluid rounded mb-2',
		)
	);
	?>
	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Newsmandu-Magazine-magazine' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current page */
						__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'Newsmandu-Magazine-magazine' ),
						get_the_title()
					),
					'<footer class="entry-footer"><span class="edit-link">',
					'</span></footer>'
				);
			?>
		</footer>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
