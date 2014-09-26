<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<?php 
			
			$post_id =  get_the_id();
			$objPost = get_post($post_id); 
			// $content = get_the_content();
			print($objPost->post_content);
			?>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>