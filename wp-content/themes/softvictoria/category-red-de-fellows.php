<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div id="primary" class="row site-content">
	<div id="content" role="main">

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

		<div role="main" id="the-category" class="large-12 columns">	
			<div class="archive-header">
				<div class="the-category-title">
					<p>
					Red de Fellows
					</p>
				</div>
			</div>

			<div class="row">
			<?php
			// The Loop
			while ( have_posts() ) : the_post();
			?>
				<div class="large-3 columns category-post the-fellow">
					<!--div class="category-post-title">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
					</div-->
					<div class="the-fellow-logo">
						<?php 
						$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
						print$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
						?>
					</div>
					<div class="the-fellow-entry">
						<?php the_content(); ?>
					</div>
				</div>

			<?php endwhile; ?>
			</div><!-- End row -->

			<?php	else: ?>

			<p>Sorry, no posts matched your criteria.</p>


		<?php endif; ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>