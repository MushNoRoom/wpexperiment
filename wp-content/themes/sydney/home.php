<?php
/**
 * The home template file.
 *
 * @package Sydney
 */

get_header(); ?>
<?php 
	if ( get_theme_mod('blog_layout','classic') == 'classic' ) :
	get_sidebar();
	endif;
?>
<?php get_footer(); ?>
