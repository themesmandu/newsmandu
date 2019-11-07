<?php
/**
 * Newsmandu Standalone Functions.
 *
 * Some of the functionality here could be replaced by core features.
 *
 * @package Newsmandu
 */

if ( ! function_exists( 'newsmandu_entry_summary' ) ) :
	/**
	 *
	 * Template part which displays post excerpts on the posts page.
	 */
	function newsmandu_entry_summary() {

		global $post;
		$has_more = strpos( $post->post_content, '<!--more' );

		if ( $has_more ) {
			the_content();
		} else {
			the_excerpt();
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'newsmandu' ),
				'after'  => '</div>',
			)
		);
	}
endif;

if ( ! function_exists( 'newsmandu_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function newsmandu_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		} else {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		}
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( ' %s', 'post date', 'newsmandu' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'newsmandu_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function newsmandu_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'newsmandu' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'newsmandu_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function newsmandu_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links fot-tag"><i class="far fa-folder"></i>' . esc_html__( ' %1$s', 'newsmandu' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'newsmandu' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links fot-tag"><i class="fas fa-tags"></i>' . esc_html__( ' %1$s', 'newsmandu' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link fot-tag">';
			comments_popup_link( 'Leave a Comment', '<i class="far fa-comment"></i> 1', '<i class="far fa-comments"></i> %', '', 'Comments are off for this post' );

			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'newsmandu' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;


if ( ! function_exists( 'newsmandu_comment' ) ) :
	/**
	 * Used as a callback by wp_list_comments() for displaying the comments.
	 *
	 * @param string $comment actual comment.
	 * @param string $args arguments.
	 * @param string $depth depth.
	 */
	function newsmandu_comment( $comment, $args, $depth ) {
		// Get correct tag used for the comments.
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		} ?>

<<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
	id="comment-<?php comment_ID(); ?>">

		<?php
			// Switch between different comment types.
		switch ( $comment->comment_type ) :
			case 'pingback':
			case 'trackback':
				?>
	<div class="pingback-entry"><span class="pingback-heading"><?php esc_html_e( 'Pingback:', 'newsmandu' ); ?></span>
				<?php comment_author_link(); ?></div>
				<?php
				break;
			default:
				if ( 'div' != $args['style'] ) {
					?>
	<div id="div-comment-<?php comment_ID(); ?>" class="comment-meta">
			<?php } ?>
		<div class="comment-author vcard">
			<figure>
				<?php
						// Display avatar unless size is set to 0.
				if ( $args['avatar_size'] != 0 ) {
					$avatar_size = ! empty( $args['avatar_size'] ) ? $args['avatar_size'] : 70; // set default avatar size
					echo get_avatar( $comment, $avatar_size );
				}
				?>
			</figure>

			<div class="comment-metadata">
				<?php
						// Display author name.
						printf( __( '<span class="fn">%s</span> ', 'newsmandu' ), get_comment_author_link() );
				?>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="date">
					<?php
							/* translators: 1: date, 2: time */
							printf(
								__( '%1$s at %2$s', 'newsmandu' ),
								get_comment_date(),
								get_comment_time()
							);
					?>
				</a>

				<div class="comment-details">
					<div class="comment-text"><?php comment_text(); ?></div><!-- .comment-text -->
					<?php
							// Display comment moderation text.
					if ( $comment->comment_approved === '0' ) {
						?>
					<em
						class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'newsmandu' ); ?></em><br />
						<?php
					}
					?>

				</div><!-- .comment-details -->
					<?php
						edit_comment_link( __( '(Edit)', 'newsmandu' ), '  ', '' );
					?>
			</div><!-- .comment-meta -->
			<div class="reply">
					<?php
						// Display comment reply link.
						comment_reply_link(
							array_merge(
								$args,
								array(
									'add_below' => $add_below,
									'depth'     => $depth,
									'max_depth' => $args['max_depth'],
								)
							)
						);
					?>
			</div>
		</div><!-- .comment-author -->
				<?php
				if ( 'div' !== $args['style'] ) {
					?>
	</div>
					<?php
				}
				// IMPORTANT: Note that we do NOT close the opening tag, WordPress does this for us.
				break;
		endswitch; // End comment_type check.
	}
endif;


/**
 * Display the class for layout div wrapper.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function newsmandu_layout_class( $classes = '' ) {
	// Separates classes with a single space.
	echo 'class="' . join( ' ', newsmandu_set_layout_class( $classes ) ) . '"'; // WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function newsmandu_set_layout_class( $class = '' ) {

	// Define classes array.
	$classes = array();

	// Grid classes.
	if ( ( is_home() || is_archive() ) && ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = '';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'newsmandu_set_layout_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Display the class for content wrapper div.
 *
 * @param array $classes One or more classes to add to the class list.
 */
function newsmandu_content_class( $classes = '' ) {
	// Separates classes with a single space.
	echo ' ' . join( ' ', newsmandu_set_content_class( $classes ) );// WPCS: XSS OK.
}

/**
 * Adds custom class.
 *
 * @param array $class Classes for the div element.
 * @return array
 */
function newsmandu_set_content_class( $class = '' ) {

	// Define classes array.
	$classes = array();
	if ( is_single() ) {
		$classes[] = 'col-md-10';
	}
	$classes[] = 'col-md-8';

	// Centered.
	if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_position' ) === 'none' ) {
		$classes[] = 'offset-md-2';
	}

	$classes = array_map( 'esc_attr', $classes );

	// Apply filters to entry post class for child theming.
	$classes = apply_filters( 'newsmandu_set_content_class', $classes );

	// Classes array.
	return array_unique( $classes );
}

/**
 * Condition function.
 * This is a static front page and not the latest posts page.
 */
function newsmandu_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}
/**
 *  Filters tags.
 */
function expanded_alowed_tags() {
	$my_allowed = wp_kses_allowed_html( 'post' );
	// iframe.
	$my_allowed['iframe'] = array(
		'src'             => array(),
		'height'          => array(),
		'width'           => array(),
		'frameborder'     => array(),
		'allowfullscreen' => array(),
	);
	// form fields - input.
	$my_allowed['input'] = array(
		'class' => array(),
		'id'    => array(),
		'name'  => array(),
		'value' => array(),
		'type'  => array(),
	);
	// select.
	$my_allowed['select'] = array(
		'class' => array(),
		'id'    => array(),
		'name'  => array(),
		'value' => array(),
		'type'  => array(),
	);
	// select options.
	$my_allowed['option'] = array(
		'selected' => array(),
	);
	// style.
	$my_allowed['style'] = array(
		'types' => array(),
	);

	// script.
	$my_allowed['script'] = array(
		'src' => array(),
	);
		return $my_allowed;
}
