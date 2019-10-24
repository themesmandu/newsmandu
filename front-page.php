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
		<h2 class="feat-title"><?php echo esc_html( get_theme_mod( 'featured_title' ) ); ?><span> <?php echo esc_html( get_theme_mod( 'featured_sub_title' ) ); ?></span></h2>
		<?php if ( 0 !== count( $activefeat ) ) : ?>
			<?php if ( get_theme_mod( 'featured_post_toggle' ) ) : ?>
		<div class=" row featured-first">
				<?php
				foreach ( $activefeat as $key => $i ) :
					$newsmandu_featured_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) );
					$newsmandu_featured_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_featured_post_' . $i ) )->post_title );
					$newsmandu_featured_date        = get_the_date( get_theme_mod( 'newsmandu_featured_post_' . $i )->post_date );
					$newsmandu_featured_author      = get_the_author_meta( get_theme_mod( 'newsmandu_featured_post_' . $i )->post_author );
					$newsmandu_featured_category    = get_the_term_list( get_theme_mod( 'newsmandu_featured_post_' . $i ), 'category' );
					$newsmandu_featured_description = apply_filters( 'the_excerpt', get_the_excerpt( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) );
					?>
			<div class="entries col-md-4">
				<div class="entries-visual">
					<?php if ( $newsmandu_featured_image ) : ?>
					<img src="<?php echo esc_url( $newsmandu_featured_image ); ?>" alt="">    
					<?php endif; ?>
				</div>
				<div class="entries-desc">
					<?php echo wp_kses_post( $newsmandu_featured_category ); ?>	<span>|</span><?php newsmandu_posted_on( $newsmandu_featured_date ); ?> 
					<?php if ( $newsmandu_featured_title ) : ?>
						<h2><a href="<?php echo esc_url( get_permalink( get_theme_mod( 'newsmandu_featured_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_featured_title ); ?></a></h2>
					<?php endif; ?>
					<p><?php newsmandu_posted_by( $newsmandu_featured_author ); ?></p>
						<?php if ( $newsmandu_featured_description ) : ?>
						<div class="desc">
							<?php echo wp_kses_post( $newsmandu_featured_description ); ?>
						</div>
					<?php endif; ?>
				</div>	
			</div>
				<?php endforeach; ?>
		</div>
			<?php endif; ?><!-- End of featured post toggle -->
		<?php endif; ?><!-- End of Active count Loop -->
		<?php if ( get_theme_mod( 'ad_setting2' ) ) : ?>
		<div class = 'ad-area'>
			<?php echo wp_kses( get_theme_mod( 'ad_setting2' ), expanded_alowed_tags() ); ?>
		</div>
		<?php endif; ?> <!-- End of ad-area1 -->
		<?php if ( 0 !== count( $activesec ) ) : ?>
			<?php if ( get_theme_mod( 'featured_post_second_toggle' ) ) : ?>
		<div class="featured-second">
				<?php
				foreach ( $activesec as $key => $i ) :
					$newsmandu_featured_second_image  = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_featured_second_post_' . $i ) ) );
					$newsmandu_featured_second_title  = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_featured_second_post_' . $i ) )->post_title );
					$newsmandu_featured_second_date   = get_the_date( get_theme_mod( 'newsmandu_featured_second_post_' . $i )->post_date );
					$newsmandu_featured_second_author = get_the_author_meta( get_theme_mod( 'newsmandu_featured_second_post_' . $i )->post_author );
					?>
			<div class="featured-content">
					<?php if ( $newsmandu_featured_second_image ) : ?>
				<img src="<?php echo esc_url( $newsmandu_featured_second_image ); ?>" alt="">  
				<?php endif; ?>
				<div class="content-meta">
					<?php if ( $newsmandu_featured_second_title ) : ?>
					<h2><a href="<?php echo esc_url( get_permalink( get_theme_mod( 'newsmandu_featured_second_post_' . $i ) ) ); ?>"><?php echo esc_html( $newsmandu_featured_second_title ); ?></a></h2>
					<?php endif; ?>
					<div class="meta">
						<i class="fas fa-user-alt"><?php newsmandu_posted_by( $newsmandu_featured_second_author ); ?></i>
						<i class="far fa-calendar-alt"><?php newsmandu_posted_on( $newsmandu_featured_second_date ); ?></i>
					</div>
				</div>
			</div>
				<?php endforeach; ?>
		</div>
		<?php endif; ?><!-- End of featured second post toggle -->
		<?php endif; ?><!-- End of Active count Loop -->
	</div>
</section>
<?php endif; ?> <!-- End of Active Loop -->
<?php if ( get_theme_mod( 'top_stories_toggle' ) ) : ?>
<section class="top-stories">
	<?php
		$newsmandu_top_stories_image       = wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_post_page_dropdown' ) ) );
		$newsmandu_top_stories_title       = apply_filters( 'the_title', get_post( get_theme_mod( 'newsmandu_post_page_dropdown' ) )->post_title );
		$newsmandu_top_stories_description = apply_filters( 'the_content', get_post( get_theme_mod( 'newsmandu_post_page_dropdown' ) )->post_content );
	?>
	<div class="bg-img">
		<div class="overlay"></div>
		<img src="<?php echo esc_url( $newsmandu_top_stories_image ); ?>" alt="">
		<div class="entry-content container">
			<h2><?php echo esc_html( $newsmandu_top_stories_title ); ?></h2>
			<?php echo wp_kses_post( $newsmandu_top_stories_description ); ?>
		</div>
	</div>
	<div class="container">
		<div class="row top-post">
			<?php newsmandu_latest_post(); ?>
		</div>
		<?php if ( get_theme_mod( 'ad_setting3' ) ) : ?>
		<div class = 'ad-area'>
			<?php echo wp_kses( get_theme_mod( 'ad_setting3' ), expanded_alowed_tags() ); ?>
		</div>
		<?php endif; ?> <!-- End of ad-area2 -->
		<div class="row">
			<div class="skip-post col-md-8">
					<?php newsmandu_latest_skip_post(); ?>
			</div>
		<?php if ( dynamic_sidebar( 'Front Page Sidebar' ) ) : ?>	
		<div class="sidebar col-md-4">
			<?php dynamic_sidebar( 'Front Page Sidebar' ); ?>
		</div>
		<?php endif; ?>
	</div>
</div>
</section>
<?php endif; ?><!-- End of top story post toggle -->
<?php
get_footer();
