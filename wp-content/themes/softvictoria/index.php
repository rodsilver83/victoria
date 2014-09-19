<?php get_header(); ?>
<div id='main'>
	<div id='content'>
		<h1>Main content area</h1>
		<?php/*
		 if (have_posts()): while(have_posts()): the_post(); ?>
			<h1><?php the_title();?></h1>

			<h4>Posted on <?php the_time('F jS Y')?></h4>
			<p><?php the_content(__('(more ...)'));?></p>
			<hr/>
		<?php endwhile; else:?>
			<p><?php _e('Sorry, we couldn\'t find the post you are looking for...')?></p>
		<?php endif;
		*/
		?>
		<?php
		//for each category, show 5 posts
		$cat_args=array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		   );
		$categories=get_categories($cat_args);
		  foreach($categories as $category) { 
		    $args=array(
		      'showposts' => 1,
		      'category__in' => array($category->term_id),
		      'caller_get_posts'=>1
		    );
		    $posts=get_posts($args);
		      if ($posts) {
		        echo '<p>Category: <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> </p> ';
						
		        foreach($posts as $post) {
		          setup_postdata($post); 
		the_content();
		?>

		          <!-- p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a><br><?php the_post();?></p-->
		          <?php
		        } // foreach($posts
						

		      } // if ($posts
		    } // foreach($categories
		
		?>
		
	</div>
	<?php get_sidebar();?>
</div>
<div id='delimiter'></div>
<?php get_footer();?>