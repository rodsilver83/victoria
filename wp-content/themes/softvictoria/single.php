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
		<div class="social-post">
			<div class="twitterbutton"><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script><div> <a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink() ?>" data-counturl="<?php the_permalink() ?>" data-text="<?php the_title(); ?>" data-via="V147_org" data-related="V147_org">Tweet</a></div></div>
			<div class="likebutton"><iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo rawurlencode(get_permalink()); ?>&layout=button_count&show_faces=false&width=100&action=like&font=verdana
&colorscheme=light&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div>
			<div class="linkedinshare"><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="right"></script></div>
			<div class="plusonebutton"><g:plusone size="medium"></g:plusone></div>
		</div>
		<?php the_content();?>
		<p>
		</p>
	</div><!-- #the-post -->
	<?php get_sidebar(); ?>
</div><!-- #primary -->
<div class="row">
	<?php disqus_embed('victoria147'); ?>
<?//php comments_template(); ?>
</div>
<script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script>
<?php get_footer(); ?>