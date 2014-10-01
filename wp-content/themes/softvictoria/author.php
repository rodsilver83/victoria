<?php
/**
 * The Template for displaying search results
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
	<div id="content" role="main">
		<div role="main" id="the-category" class="large-12 columns">	
			<div class="archive-header">
				
		    <?php
		    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
		    ?>

		    <div class="the-category-title">
					<p>Acerca de <?php echo $curauth->nickname; ?></p>
				</div>
				<p class="the-author-description">
					<?php echo $curauth->user_description; ?>
				</p>
<!-- dl>
      <dt>Website</dt>
      <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
      <dt>Profile</dt>
      <dd><?php echo $curauth->user_description; ?></dd>
  </dl -->

			</div>
			<div class="the-author-posts">
				<h2>Todos sus posts</h2>
			</div>
		</div>
			<?php
				/*
				 * Since we called the_post() above, we need to
				 * rewind the loop back to the beginning that way
				 * we can run the loop properly, in full.
				 */
				 rewind_posts();

				/* -- para la biografía del autor -- */
			if ( get_the_author_meta( 'description' ) ) : 
				get_template_part( 'author-bio', get_post_format() ); 
			endif; 
			/* -- para la biografía del autor -- */


			/* -- para el autor page -- */
			$post_id =  get_the_id();
			$objPost = get_post($post_id); 
			setup_postdata($objPost);
			the_post();
 			get_template_part( 'content', get_post_format() ); 
			rewind_posts();
			/* -- para el autor -- */

			printf( __( 'All posts by %s', 'softvictoria' ), '<span class="vcard">' . get_the_author() . '</span>' ); 
			$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			// get his posts 'ASC'
			 if ( have_posts() ) : 
				while ( have_posts() ) : 

					the_post(); ?>

			<div class="category-post">
				<div class="category-post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
				</div>

				<div class="the-category-entry">
					<?php the_content(); ?>

				 <!--p class="postmetadata">
				 	<?//php comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed'); ?>
				 </p-->
				</div>
			</div>


	    <?php 
				endwhile; 
		else: ?>
	        <p><?php _e('No posts by this author.'); ?></p>

	    <?php endif; ?>
	   
			<?// php get_template_part( 'content', 'none' ); ?>
	</div>
</div>

<?php get_footer(); ?>