<?php
$tmp_search = new WP_Query('s=' . wp_specialchars($_GET['s'])."&show_posts=1");
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'softvictoria' ), get_search_query() ); ?></h1>
			</header>

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
		    <div class='orbit-caption'>
					<a href='${post_link}' class='the-post-link'>".get_the_title()."</a>
				".the_author()."</p>
					".the_content()." <p>".the_date()."</p>
					
		    </div>
				<br/><br/><br/><br/>
		    ";
				$i++;
			}
			print($html);
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->


