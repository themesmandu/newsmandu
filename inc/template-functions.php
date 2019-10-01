<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Newsmandu
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newsmandu_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'newsmandu_pingback_header' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newsmandu_body_classes( $classes ) {
	/* using mobile browser */
	if ( wp_is_mobile() ) {
		$classes[] = 'wp-is-mobile';
	} else {
		$classes[] = 'wp-is-not-mobile';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	// Adds a class if the front-page.
	if ( is_front_page() ) {
		$classes[] = 'front-page';
	}
	// Adds a class if the customizer preview.
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'newsmandu_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @param array $classes Classes for the article element.
 * @return array
 */
function newsmandu_post_classes( $classes ) {
	$classes[] = ( has_post_thumbnail() ? 'has-thumbnail' : 'no-thumbnail' );

	if ( is_front_page() || is_home() || is_archive() ) {
		$classes[] = 'post-preview';
	}

	if ( is_singular( array( 'post', 'page' ) ) && ! is_front_page() ) {
		$classes[] = 'card mb-4';
	}

	if ( is_home() || is_archive() ) {
		$classes[] = 'card mb-4';
	}

	return $classes;
}
add_action( 'post_class', 'newsmandu_post_classes' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @param string $link link for link text.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function newsmandu_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	if ( get_theme_mod( 'more_link' ) ) {
		$link  = '...';
		$link .= sprintf(
			'<p><a href="%1$s" class="more-link btn btn-primary">%2$s</a></p>',
			esc_url( get_permalink( get_the_ID() ) ),
			/* translators: %2$s: Name of current post */
			sprintf( __( '%1$s<span class="screen-reader-text">%2$s</span>', 'newsmandu' ), esc_html( get_theme_mod( 'more_link' ) ), get_the_title( get_the_ID() ) )
		);
	} else {
		$link = '...';
	}
	return $link;
}
add_filter( 'excerpt_more', 'newsmandu_excerpt_more' );
add_filter( 'the_content_more_link', 'newsmandu_excerpt_more' );

/**
 * Responsive Image class from Bootstrap
 * which appended to automatically generated image classes
 *
 * @param string $html responsive image class.
 */
function newsmandu_bootstrap_class_images( $html ) {
	$classes = 'img-fluid'; // separated by spaces, e.g. 'img image-link'
	// check if there are already classes assigned to the anchor.
	if ( preg_match( '/<img.*? class="/', $html ) ) {
		$html = preg_replace( '/(<img.*? class=".*?)(".*?\/>)/', '$1 ' . $classes . '$2', $html );
	} else {
		$html = preg_replace( '/(<img.*?)(\/>)/', '$1 class="' . $classes . '"$2', $html );
	}
	return $html;
}
add_filter( 'the_content', 'newsmandu_bootstrap_class_images', 10 );

/**
 * Added table class from Bootstrap
 *
 * @param string $content boottrap table class.
 */
function newsmandu_bootstrap_table_class( $content ) {
	return str_replace( '<table', '<table class="table"', $content );
}
add_filter( 'the_content', 'newsmandu_bootstrap_table_class' );

/**
 * Adds a class to the navigation links of posts
 */
function newsmandu_posts_link_attributes() {
	return 'class="btn btn-light"';
}
add_filter( 'next_posts_link_attributes', 'newsmandu_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'newsmandu_posts_link_attributes' );

/**
 * Comment form container.
 */
function newsmandu_comment_form_wrap_start() {
	echo '<div class="card my-4"><div class="card-body">';
}

/**
 * Comment form wrapper.
 */
function newsmandu_comment_form_wrap_end() {
	echo '</div></div>';
}
add_action( 'comment_form_after', 'newsmandu_comment_form_wrap_end' );
add_action( 'comment_form_before', 'newsmandu_comment_form_wrap_start' );

/**
 * Add custom class to comment reply link.
 *
 * @param string $content comment reply link class.
 */
function newsmandu_comment_reply_link( $content ) {
	$extra_classes = 'btn btn-primary';
	return preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $extra_classes, $content );
}
add_filter( 'comment_reply_link', 'newsmandu_comment_reply_link', 99 );

/**
 * Custom Excerpt lengths.
 */
function newsmandu_custom_excerpt_length() {
	return 16;
}
add_filter( 'excerpt_length', 'newsmandu_custom_excerpt_length' );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @param string $template front-page.php.
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function newsmandu_front_page( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'newsmandu_front_page' );
/**
 * Custom filter to add col class.
 */
function col_class_filter() {
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
		return 'col-md-12';
	}
	if ( is_single() && is_active_sidebar( 'sidebar-1' ) ) {
		return 'col-md-8 offset-md-8';
	}
}
add_filter( 'input_class', 'col_class_filter' );
/**
 * Displays latest post entries
 */
function newsmandu_latest_post() {
	global $post;
	$latest_posts = new WP_Query(
		array(
			'posts_per_page'      => 4,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
		)
	);

	while ( $latest_posts->have_posts() ) :
		$latest_posts->the_post();
		?>
		<div class="col-md-3">
			<div class="latest-image">
				<?php
				the_post_thumbnail(
					'newsmandu-featured-900-600',
					array(
						'class' => 'img-fluid rounded mb-2',
					)
				);
				$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					echo '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
				}
				?>
			</div>
			<div class="latest-entries">
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php newsmandu_posted_on(); ?>
				<?php if (is_home() || is_front_page() ) : ?>
				<p><?php the_excerpt(); ?></p>
			<?php endif; ?>
			</div>	
		</div>

		<?php
	endwhile;
	wp_reset_postdata();
}
/**
 * Displays skipped latest post entries
 */
function newsmandu_latest_skip_post() {
	global $post;
	$latest_posts = new WP_Query(
		array(
			'posts_per_page'      => 4,
			'offset'              => 4,
			'post_type'           => 'post',
			'ignore_sticky_posts' => true,
		)
	);

	while ( $latest_posts->have_posts() ) :
		$latest_posts->the_post();
		?>
		<div class="row">
			<div class="latest-image col-md-4">
				<?php
				the_post_thumbnail(
					'newsmandu-featured-900-600',
					array(
						'class' => 'img-fluid rounded mb-2',
					)
				);

				?>
			</div>
			<div class="latest-entries col-md-6">
				<?php
				$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu' ) );
				if ( $categories_list ) {
					/* translators: 1: list of categories. */
					echo '<span class="cat-links">' . $categories_list . '</span>'; // WPCS: XSS OK.
				}
				?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<i class="fas fa-user-alt"><?php newsmandu_posted_by(); ?></i>
				<i class="far fa-calendar-alt"><?php newsmandu_posted_on(); ?></i>
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>	
		<?php
	endwhile;
	wp_reset_postdata();
}
/**
 * Navigation for single post
 */
function newsmandu_navigation() {

	if ( ! is_singular( 'post' ) ) {
		return;
	}
	$prev_post = get_previous_post();
	if ( $prev_post ) :
		$pre_image = wp_get_attachment_url( get_post_thumbnail_id( $prev_post ) );
		$pre_title = apply_filters( 'the_title', get_post( $prev_post )->post_title );
		?>
		<div class="previous">
			<a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
				<div class="ytcont">
					<div class="prev-img">
						<img src="<?php echo esc_url( $pre_image ); ?>" alt="">
					</div>
					<div class="prev-title">
						<span>Previous Post</span>
						<h4 class="entry-title"><?php echo esc_html( $pre_title ); ?></h4>
					</div>
				</div>
			</a>			
		</div>
		<?php
endif;
	$next_post = get_next_post();
	if ( $next_post ) :
		$next_image = wp_get_attachment_url( get_post_thumbnail_id( $next_post ) );
		$next_title = apply_filters( 'the_title', get_post( $next_post )->post_title );
		?>
		<div class="next">
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
				<div class="ytcont">
					<div class="nex-title">
						<span>Next Post</span>
						<h4 class="entry-title"><?php echo esc_html( $next_title ); ?></h4>
					</div>
					<div class="nex-img">
						<img src="<?php echo esc_url( $next_image ); ?>" alt="">
					</div>
				</div>
			</a>	
		</div>
		<?php
endif;
}
/**
 * Displays author details.
 */
function newsmandu_authors_profile() {
	if ( get_the_author_meta( 'description' ) ) :
		?>
		<div class="row">
			<div class="author-img">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), '150' ); ?>
			</div>
			<div class="author-detail">
				<div class="author-name">
					<h3>Author: <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php esc_html( the_author_meta( 'display_name' ) ); ?></a></h3>
				</div>
				<div class="author-desc">
					<p><?php esc_textarea( the_author_meta( 'description' ) ); ?></p>
				</div>
			</div>
		</div>
		
		<?php
	endif;
}

