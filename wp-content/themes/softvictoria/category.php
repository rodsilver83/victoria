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
	
		<?php if (!is_category(array(19,20,29,42,53)) && !is_home()) : ?>
		<div role="main" id="the-category" class="large-9 columns">	
		<?php else : ?>
		<div role="main" id="the-category" class="large-12 columns">
		<?php endif; ?>
			<div class="archive-header">
				<?php single_cat_title( '', false ); ?>
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
			<div class="category-post row">
				<div class="large-3 columns category-thumb">
					<?php 
						
						if(has_post_thumbnail())
						{
							the_post_thumbnail();
						}
						?>
				</div>
				<div class="large-9 columns">
					<div class="category-post-title">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small> 

					</div>

					<div class="the-category-entry">
						<?php 
						
						if(has_post_thumbnail())
						{
							//the_post_thumbnail();
						}
						the_excerpt(); 
						?>

					 <!--p class="postmetadata">
					 	<?//php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
					 </p-->
						 <div class="read-more">
						 	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
						 		Ver más</a>
						 </div>
					</div>
				</div>
			</div>

			<?php endwhile; 

				else: ?>

			<?php if (!is_category(array(19,20,29,42,53)) && !is_home()) : ?>
			<div role="main" id="the-category" class="large-9 columns">	
			<?php else : ?>
			<div role="main" id="the-category" class="large-12 columns">
			<?php endif; ?>
				<div class="archive-header">
				
					<div class="the-category-title">
						<p>
							Aún no hay publicaciones
						</p>
					</div>
				</div>

				<div class="category-post">
					<div class="category-post-title">
						<p>Pero suscríbete para que te avisemos cuando publiquemos algo de tu interés</p>
					</div>
				</div>
			</div>


		<?php endif; ?>
		</div>
		<?php
		if (!is_category(array(19,20,29,42,53)) && !is_home()) { 
		 get_sidebar(); 
		}
		
?>
	</div>
</div>

<?php get_footer(); ?>