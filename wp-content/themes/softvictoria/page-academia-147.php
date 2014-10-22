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
	<div role="main" id="the-post" class="large-12 columns">
		<div class="the-post-title">
			<h1><span>{</span><?php the_title();?><span>}</span></h1>
		</div>

		<div class="academia-page">
			<?php
			// $pageChildren = $wpdb->get_results("
			// 	SELECT *
			// 	FROM $wpdb->posts
			// 	WHERE post_parent = ".$post->ID."
			// 	AND post_type = 'page'
			// 	ORDER BY menu_order
			// ", 'OBJECT');

			// if ( $pageChildren ) :
			// 	foreach ( $pageChildren as $pageChild ) :
			// 		setup_postdata( $pageChild );
			// 		?>
			 	<!--div class="academia-program">
			// 		<h4><?php print '<a href="' . get_permalink( $pageChild->ID ) . '">' . get_the_title( $pageChild->ID ) . '</a>'; ?></h4>
			// 		<div class="entry">
			// 			<?//php the_content(); ?>

			// 		</div>
			// 	</div-->
				<?//php
			// 	endforeach;
			// endif;
			?>
			<?php
			$post = get_post(5482);
			setup_postdata($post);
			the_content();
			?>
			<hr>
		</div>
	</div><!-- #the-post -->
</div><!-- #primary -->
<div id="contact-section" >
	<div class="contact-wrapper">
		<h2>Formulario de contacto para emprendedoras</h2>
		<?php echo do_shortcode( '[contact-form-7 id="5370" title="___Contacto Emprendedoras"]' ); ?>
	</div>
</div><!-- /#contact-section -->

<?php get_footer(); ?>
