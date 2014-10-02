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
		<blockquote class="the-post-author">
			<cite><?php the_author_posts_link()?> | <?php the_date()?></cite>
		</blockquote>

		<div class="page">
			<?php
			$pageChildren = $wpdb->get_results("
				SELECT *
				FROM $wpdb->posts
				WHERE post_parent = ".$post->ID."
				AND post_type = 'page'
				ORDER BY menu_order
			", 'OBJECT');

			if ( $pageChildren ) :
				foreach ( $pageChildren as $pageChild ) :
					setup_postdata( $pageChild );
					?>

				<h4><?php print '<a href="' . get_permalink( $pageChild->ID ) . '">' . get_the_title( $pageChild->ID ) . '</a>'; ?></h4>
				<div class="entry">
					<?php the_excerpt(); ?>
				</div>

				<?php
				endforeach;
			endif;
			?>
		</div>
		<p>
			
			<?php echo do_shortcode( '[contact-form-7 id="41" title="Contact Form"]' ); ?>
			
		</p>
	</div><!-- #the-post -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->


<?php get_footer(); ?>
