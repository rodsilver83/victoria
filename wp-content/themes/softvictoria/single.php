<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */

get_header(); ?>

	<div id="primary" class="row site-content">
		<div role="main" id="the-post" class="large-9 columns">
			<div class="the-post-title">
				<h1>The Post Title</h1>
			</div>
			<img src="http://placehold.it/720x350&text=imagen" class="custom-thumbnail-class">

			<blockquote>Those people who think they know everything are a great annoyance to those of us who do.<cite>Isaac Asimov</cite></blockquote>
			<p>
			<?php 
			
			$post_id =  get_the_id();
			$objPost = get_post($post_id); 
			// $content = get_the_content();
			print($objPost->post_content);
			?>
			</p>
		</div><!-- #the-post -->
		<?php get_sidebar(); ?>
	</div><!-- #primary -->


<?php get_footer(); ?>