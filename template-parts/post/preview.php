<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	the_post_thumbnail(
		'newsmandu-thumb-750-300',
		array()
	);
	?>

	<div class="card-body">
			<?php
			the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			?>
		<div class="entry-summary card-text">
			<?php newsmandu_entry_summary(); ?>
		</div>
		<footer class="entry-footer">
			<?php newsmandu_entry_footer(); ?>
		</footer>
	</div>
	<?php
	if ( get_post_type() === 'post' ) {
		?>

	<div class="entry-meta card-footer">
			<?php newsmandu_posted_on(); ?>
			<?php newsmandu_posted_by(); ?>
	</div>

		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
