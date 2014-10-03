<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */

get_header(); 

$post_id =  get_the_id();
$objPost = get_post($post_id); 
setup_postdata($objPost);
?>
<div id="primary" class="row site-content">
	<div role="main" id="the-post" class="large-9 columns">
		<div class="the-post-title">
			<h1><?php the_title();?></h1>
		</div>
		<!-- blockquote class="the-post-author">
			<cite><?php // the_author_posts_link()?> | <?php the_date()?></cite>
		</blockquote -->

		<?php // the_content();?>
		
		
		<p>
			<?php
			global $wpdb;
			
			$args = array( 'orderby' => 'display_name', 'order' => 'ASC', 'who' => 'authors' );
			$authors = get_users( $args );
		
			// For each author in $authors, we display their name and a link to their author archive page
			foreach ( $authors as $author ) {

			    // EXAMPLE: display author first & last name

			    echo "<a href='".get_author_posts_url( $author->ID )."'>{$author->first_name} {$author->last_name}</a><br>\n";
			}
			?>
		</p>
	</div><!-- #the-post -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->


<?php get_footer(); ?>
