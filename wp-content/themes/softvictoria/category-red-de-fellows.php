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

		<div role="main" id="the-category" class="large-9 columns">	
			<div class="archive-header">
				<?php
				// Display optional category description
				 if ( category_description() ) : 
				?>
				<div class="the-category-title">
					<p>
					<?php single_cat_title( '', false ); ?>
					<?php echo category_description(); ?>
					</p>
				</div>
				<?php endif; ?>
			</div>

			<?php
			// The Loop
			while ( have_posts() ) : the_post();
			?>
			<div class="category-post">
				<div class="category-post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
				</div>

				<div class="the-category-entry">
					<?php the_content(); ?>

				 <!--p class="postmetadata">
				 	<?//php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
				 </p-->
				</div>
			</div>

			<?php endwhile; 

				else: ?>

			<p>Sorry, no posts matched your criteria.</p>


		<?php endif; ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>