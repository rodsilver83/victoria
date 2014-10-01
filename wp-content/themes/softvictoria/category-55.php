<?php

get_header(); ?> 

<div id="primary" class="row site-content">
	<div id="content" role="main">

<?php 
$catid = get_query_var('cat');
?>

		<div role="main" id="the-category" class="large-9 columns">	
			<div class="archive-header">
				<?php
				print(single_cat_title());
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

			<ul class="subcategories">
			        <?php $cats = get_categories('order=desc&title_li=&child_of='.$catid);
			                foreach ($cats as $cat) { ?>
			<li>
			                <h4><a href="<?php echo get_category_link( $cat->cat_ID ); ?>" rel="bookmark"
			title="<?php echo $cat->cat_name; ?>"><?php echo $cat->cat_name; ?></a></h4>
			</li>
			<?php }
			?>
			</ul>
			</div>
		</div>

		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>

