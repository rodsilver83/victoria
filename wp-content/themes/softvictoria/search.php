
<?php
	get_header();

$tmp_search = new WP_Query('s=' . wp_specialchars($_GET['s'])."&show_posts=1");
?>
	

	<div id="primary" class="row site-content">
		<div id="content" role="main">
		
		<?php if ( have_posts() ) : ?>

		<div role="main" id="the-post" class="large-12 columns">

			<div class="archive-header">
				<div class="the-category-title">
					<?php printf( __( 'Resultados con el término: %s', 'softvictoria' ), get_search_query() ); ?>
				</div>
			</div>

			<div class="category-post">

				<div class="the-category-entry">
					<?php
						global $wpdb;
						$posts = $tmp_search->posts;
						$html  = "";
						$i=0;
						foreach($posts as $post)
						{
							setup_postdata($post); 
							// $post_content = wordwrap($post_wrapped, 20);
							$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
							$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
							$post_link=post_permalink();
							$post_title=get_the_title();
							$html  .= "
					    <div>
								<a href='${post_link}' class='the-post-link'>".get_the_title()."</a>
							".the_author()." 
								".the_content()." <p>".the_date()."</p>
								
					    </div>
					    ";
							$i++;
						}
						print($html);
						?>

				 
				</div>
			</div>
			

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div>
	</div><!-- #primary -->


