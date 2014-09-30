
<?php
	get_header();

$tmp_search = new WP_Query('s=' . wp_specialchars($_GET['s'])."&show_posts=1");
gettype($tmp_search);
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
						$posts = $tmp_search->posts;
						$html  = "";
						$i=0;
						foreach($posts as $post)
						{
							setup_postdata($post); 
							$html .= "<div>";
							$html .="<a href='".get_the_permalink()."' class='the-post-link'>".get_the_title()."</a>";
							$html .= "<p> " . get_the_excerpt();
							$html .= " " . get_the_author();
							$html .= " " . get_the_date();
							$html .= " " . get_the_time();
							$html .= "</p></div>";
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


<?php get_footer()?>