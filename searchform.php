<?php
/**
 * The template for displaying search forms
 *
 * @package Newsmandu
 */

?>

<!-- Search Form Widget -->
<div class="card mb-4">
	<h5 class="card-header"><?php esc_html_e( 'Search', 'newsmandu' ); ?></h5>
		<div class="card-body">
			<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
				<label class="assistive-text screen-reader-text" for="s"><?php esc_html_e( 'Search', 'newsmandu' ); ?></label>
					<div class="input-group">
						<input class="field form-control" id="s" name="s" type="text" placeholder="<?php esc_attr_e( 'Search &hellip;', 'newsmandu' ); ?>" value="<?php the_search_query(); ?>">
							<span class="input-group-append">
								<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'Search', 'newsmandu' ); ?>">
							</span>
					</div>
			</form>
		</div>
</div>



