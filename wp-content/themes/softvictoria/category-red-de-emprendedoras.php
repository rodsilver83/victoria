<?php

get_header(); ?> 
<br/><br/><br/><br/>

<div id="primary" class="row site-content">
	<div id="content" role="main">

<?php 
$catid = get_query_var('cat');
?>

		<div role="main" id="the-category" class="large-9 columns">	
      <div class="the-category-title">
	
				<?php
				print('<p>'.single_cat_title().'</p>');
				// Display optional category description
				 if ( category_description() ) : 
				?>
				<p>
				<?php echo category_description(); ?>
				</p>
				<?php endif; ?>
			</div>

			<!--ul class="subcategories" -->
			        <?php $cats = get_categories('order=desc&child_of='.$catid);
			                foreach ($cats as $cat) { ?>
												<div class="category-post">
													<div class="category-post-title">
														<h2><a href="<?php echo get_category_link( $cat->cat_ID ); ?>" rel="bookmark" title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a></h2>
													</div>

													<div class="the-category-entry">
														<?php the_content(); ?>

													 <!--p class="postmetadata">
													 	<?//php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
													 </p-->
													</div>
												</div>
				
			<!--li>
			                <h4><a href="<?php echo get_category_link( $cat->cat_ID ); ?>" rel="bookmark"
			title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a></h4>
			</li-->
			<?php }
			?>
			<!-- /ul -->
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>

