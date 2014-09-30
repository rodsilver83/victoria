<?php
/**
 * The Template for displaying search results
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */


get_header(); ?>
<div id="primary" class="row site-content">
	<div id="content" role="main">
		<div role="main" id="the-category" class="large-9 columns">	
			<div class="archive-header">
		<?php if ( have_posts() ) : ?>

			<?php
				/*
				 * Queue the first post, that way we know what author
				 * we're dealing with (if that is the case).
				 *
				 * We reset this later so we can run the loop
				 * properly with a call to rewind_posts().
				 */
				// the_post();
			?>
			</div>
		</div>

			<?php printf( __( 'All posts by %s', 'softvictoria' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?>
			<!-- .archive-header -->

			<?php
				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				rewind_posts();
			?>

			<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php get_template_part( 'author-bio' ); ?>
			<?php endif; ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>


		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>