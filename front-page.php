<?php
/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Newsmandu
 */

get_header();
?>
	<?php
	$activefeat = array();
	for ( $i = 0; $i < 3; $i++ ) {
		if ( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) {
			$activefeat[] = $i;
		}
	}
	?>
	<?php
	$activesec = array();
	for ( $i = 0; $i <= 4; $i++ ) {
		if ( get_theme_mod( 'newsmandu_featured_second_post_' . $i ) ) {
			$activesec[] = $i;
		}
	}
	?>
	<?php if ( 0 !== count( $activefeat ) || count( $activesec ) ) : ?>
<section class="featured-section">
	<div class="container">
		<?php if ( 0 !== count( $activefeat ) ) : ?>
		<div class="featured-first">
			<?php
			foreach ( $activefeat as $key => $i ) :
				$newsmandu_featured_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) );
				$newsmandu_featured_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_featured_post_' . $i ) )->post_title );
				$newsmandu_featured_date        = get_the_date( get_theme_mod( 'newsmandu_featured_post_' . $i )->post_date );
				$newsmandu_featured_author      = get_the_author_meta( get_theme_mod( 'newsmandu_featured_post_' . $i )->post_author );
				$newsmandu_featured_category    = get_the_term_list( get_theme_mod( 'newsmandu_featured_post_' . $i ), 'category' );
				$newsmandu_featured_description = apply_filters( 'the_content', get_post( get_theme_mod( 'newsmandu_featured_post_' . $i ) )->post_content );
				?>
				<?php newsmandu_posted_on( $newsmandu_featured_date ); ?>
				<?php echo wp_kses_post( $newsmandu_featured_category ); ?>
				<?php if ( $newsmandu_featured_image ) : ?>
			<img src="<?php echo esc_url( $newsmandu_featured_image ); ?>" alt="">    
			<?php endif; ?>
				<?php if ( $newsmandu_featured_title ) : ?>
			<h2><?php echo esc_html( $newsmandu_featured_title ); ?></h2>
					<?php newsmandu_posted_by( $newsmandu_featured_author ); ?>
					<?php if ( $newsmandu_featured_description ) : ?>
						<?php echo wp_kses_post( $newsmandu_featured_description ); ?>
			<?php endif; ?>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
			<?php endif; ?>
		<?php if ( 0 !== count( $activesec ) ) : ?>
		<div class="featured-second">
			<?php
			foreach ( $activesec as $key => $i ) :
				$newsmandu_featured_image = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) );
				$newsmandu_featured_title = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_featured_post_' . $i ) )->post_title );
				?>
				<?php if ( $newsmandu_featured_image ) : ?>
			<img src="<?php echo esc_url( $newsmandu_featured_image ); ?>" alt="">    
			<?php endif; ?>
				<?php if ( $newsmandu_featured_title ) : ?>
			<h2><?php echo esc_html( $newsmandu_featured_title ); ?></h2>
			<?php endif; ?>
			<?php endforeach; ?>
		</div>
			<?php endif; ?>
	</div>
</section>
		<?php endif; ?>
<?php
get_footer();
