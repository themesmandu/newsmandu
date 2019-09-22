<?php
/**
 * The site header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Newsmandu
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="site">
		<header id="top-header" class="site-header" role="banner">
			<a class="skip-link" href="#content"><?php esc_html_e( 'To the content', 'newsmandu' ); ?></a>
			<div class="container">
			<?php if ( ! get_theme_mod( 'hide_top_menu' ) ) : ?>
				<div class="row navbar">
					<?php if ( get_theme_mod( 'contact_email' ) || get_theme_mod( 'phone_number' ) ) : ?>
					<div class="site-detail col-md-6">
						<?php if ( get_theme_mod( 'contact_email' ) ) : ?>
						<p><?php echo esc_html( get_theme_mod( 'contact_email' ) ); ?></p>
						<?php endif; ?>	
						<?php if ( get_theme_mod( 'phone_number' ) ) : ?>
						<p><?php echo esc_html( get_theme_mod( 'phone_number' ) ); ?></p>
						<?php endif; ?>	
					</div>
					<?php endif; ?>	
					<div class="secondary-menu col-md-6">
						<?php
						if ( has_nav_menu( 'top_menu' ) ) :
							wp_nav_menu(
								array(
									'theme_location' => 'top_menu',
								)
							);
						endif;
						?>
					</div>
				</div>
				<?php endif; ?>
				<div class="logo">
					<div class="site-branding">
						<?php if ( ! has_custom_logo() ) { ?>

							<?php if ( is_front_page() && is_home() ) : ?>

						<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
								title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
								itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

						<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
							title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
							itemprop="url"><?php bloginfo( 'name' ); ?></a>
							<?php
						endif;
						$newsmandu_description = get_bloginfo( 'description', 'display' );
						if ( $newsmandu_description || is_customize_preview() ) :
							?>
						<p class="site-description"><?php echo wp_kses_post( $newsmandu_description ); ?></p>
						<?php endif; ?>


							<?php
						} else {
							the_custom_logo();
						}
						?>
					</div>
				</div>
			</div>

			<?php
			if ( get_theme_mod( 'menubar_mode' ) === 'alt' ) {
				// alternative navigation bar:
				// left: logo, main menu - right: search form or something.
				get_template_part( 'template-parts/navigation/main-navbar', 'alt' );
			} else {
				// standard navigation bar:
				// left: logo - right: main menu.
				get_template_part( 'template-parts/navigation/main-navbar' );
			}
			if ( ! is_front_page() ) {
				// Header Image.
				get_header_image();
				?>
				<div class="header-img" style="background-image:url( <?php header_image(); ?> );">
					<header class="entry-header pb-4">
						<?php single_post_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</header>
				</div>
				<?php
			}
			if ( is_front_page() && ! is_home() ) {
				// head banner on the front page if it enabled.
				get_template_part( 'template-parts/jumbotron' );
			}
			?>

		</header><!-- #masthead -->
		<?php if ( is_front_page() ) : ?>
		<!-- slider background -->
		<div id="header-slider" class="carousel slide carousel-fade" data-ride="carousel" data-interval="3900" >


			<ul class="carousel-indicators">
				<?php
				for ( $i = 0; $i < 4; $i++ ) :
					?>
				<li data-target="#header-slider" data-slide-to="<?php echo esc_html( $i ); ?>" class="<?php echo esc_html( 0 === $i ? 'active' : '' ); ?>"></li>
				<?php endfor; ?>
			</ul>

			<div class="carousel-inner">
				<?php
				for ( $i = 0; $i < 4; $i++ ) :
					$j = $i + 1;
					?>
				<div class="carousel-item <?php echo esc_html( 'carousel-item-' . $i ); ?> <?php echo esc_html( 0 === $i ? 'active' : '' ); ?>">
				<div class="carousel-wrap">
					<div class="header-content">
						<div class="container">
							<?php
							$newsmandu_slider_post = new WP_Query( array( 'p' => get_theme_mod( 'newsmandu_slider_post_' . $i ) ) );
							while ( $newsmandu_slider_post->have_posts() ) :
								$newsmandu_slider_post->the_post();
								$categories_list = get_the_category_list( esc_html__( ', ', 'newsmandu' ) );
								if ( $categories_list ) {
									?>
									<span class="frontpage-cat-links"><?php echo wp_kses_post( $categories_list ); ?></span> 
									<?php
								}
								?>
							<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
							</h2>
							<p><i class="fas fa-user-alt"><span class="detail"><a
									href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo get_the_author(); ?></a></span></i>
									<i class="far fa-calendar-alt"><span class="detail"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_date(); ?></a></span></i>
							</p>
								<?php
							endwhile;
							?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
					<!-- Style for slider background -->
					<style>
					.carousel-item-<?php echo esc_html( $i ); ?>
					{
						background-image: url(
						<?php
						echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_theme_mod( 'newsmandu_slider_post_' . $i ) ) ) );
						?>
						);
						height: 750px;

					}

					.header-content h2 {
						color: chartreuse;
					}

					.header-content p {
						color: white;
					}
					</style>
					</div>
				</div>
				<?php endfor; ?>

			</div>

		</div>
		<?php endif; ?>

		<div id="content" class="content-wrap">
