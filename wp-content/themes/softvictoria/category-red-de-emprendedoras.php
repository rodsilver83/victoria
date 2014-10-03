<?php

get_header(); ?> 
<div id="primary" class="row site-content">
	<div id="content" role="main">

<?php 
$catid = get_query_var('cat');
?>

		<div role="main" id="the-category" class="large-12 columns">	
      <div class="the-category-title">
				<p>
				<?php
				print('<p>'.single_cat_title().'</p>');
				// Display optional category description
				 if ( category_description() ) : 
				?>
				
				<?php echo category_description(); ?>
				</p>
				<?php endif; ?>
			</div>

      <?php $cats = get_categories('order=desc&child_of='.$catid);
        foreach ($cats as $cat) { ?>
				<div class="category-post generation-list">
					<div class="category-post-title">
						<h2><a href="<?php echo get_category_link( $cat->cat_ID ); ?>" rel="bookmark" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a></h2>
					</div>

					<div class="the-category-entry">
						<?php the_content(); ?>
					</div>
				</div>
				
			<?php }
			?>
			</div>
		</div>

	</div>
</div>
<?php get_footer(); ?>


