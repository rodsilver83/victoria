<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */


$post_id =  get_the_id();
$objPost = get_post($post_id); 
setup_postdata($objPost);
?>

		<?php the_content();?>
