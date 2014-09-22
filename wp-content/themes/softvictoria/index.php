<?php get_header(); ?>
<div id="main-intro">
	<div class="intro-spacer"></div>
	<div id="content" class="row">
		<div class="large-12 columns">
			<img src="<?php bloginfo('template_directory'); ?>/img/victoria-mail-logo.png" alt="Victoria 147" width="50%" height="auto">
		</div>
		<div class="large-12 columns intro-bottom">
			<blockquote class="intro-quote">“Somos una organización que busca redefinir el concepto de la mujer actual.”</blockquote class="intro">
				<br>
			<a href="" class="intro-scroll">
				<p class="text-center">SCROLL</p>
				<img src="<?php bloginfo('template_directory'); ?>/img/scroll.png">
			</a>
		</div>
	</div>
</div>
<div class="content-other">
	<?php
	 if (have_posts()): while(have_posts()): the_post(); ?>
		<h1><?php the_title();?></h1>
		<h4>Posted on <?php the_time('F jS Y')?></h4>
		<p><?php the_content(__('(more ...)'));?></p>
		<hr/>
	<?php endwhile; else:?>
		<p><?php _e('Sorry, we couldn\'t find the post you are looking for...')?></p>
	<?php endif;
	?>
	<?php
	?>
</div>
<div id="delimiter"></div>
<?php get_footer();?>