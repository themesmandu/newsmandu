<?php
/**
 * Template part for displaying search result
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Newsmandu-Magazine
 */

$newsmandu_content = get_theme_mod( 'blog_layout' ) === 'list' ? '-list' : '';
?>

<?php

	/*
	 * Include the Post-Format-specific template for the content.
	 */

	get_template_part(
		'template-parts/post/preview' . $newsmandu_content,
		get_post_format()
	);



