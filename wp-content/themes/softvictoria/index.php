<?php get_header(); ?>
<link rel="stylesheet" href="../../plugins/wp-team-manager/css/tm-style.css" type="text/css" media="screen" title="no title" charset="utf-8">
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
<!-- Team Members -->
<div class="content-team">
	<div id='content-teams'>
		<!--- @@ pnm begin -->
		<?php

		$cat_args=array(
			'orderby' => 'name',
			'order' => 'ASC',
			'include'=> array(33,30,28)
		);
		$categories=get_categories($cat_args);
		foreach($categories as $category) 
		{ 

			if($category->count > 0 )
			{
				$args=array(
				'showposts' => 1,
				'category__in' => array($category->term_id),
				'caller_get_posts'=>1, 
				'hide_empty'=>1,
				);
				//Testing the content of the post before it prints da HTML

				$posts=get_posts($args)[0];

				if($posts->post_content!='')
				{
					unset($posts);
					// echo '<p>Category: <a href="' .  . '" title="' .  . '" ' . '>' . $category->name.'</a> </p> ';
					$category_link= get_category_link( $category->term_id );
					$title_link=sprintf( __( "View all posts in %s" ), $category->name );
					$html="<p>Category: <a href='${category_link}' title='${title_link}'>{$category->name}</a></p>";
					print($html);
					$posts=get_posts($args);
					foreach($posts as $post) 
					{
						setup_postdata($post); 
						if($contenido= the_content() != '')
						{
							print($contenido);
						}
					} // foreach($posts)

				} // post_content
			} // count 
			print('<h1><hr><hr></h1>');
		} // foreach($categories)

		?>
<h1><hr><hr></h1>
		<?php echo do_shortcode("[team_manager category='0' orderby='menu_order' limit='0' post__in='' exclude='' layout='grid' image_layout='rounded' ]")?>
		<h1><hr><hr></h1>
		<?php echo do_shortcode( '[contact-form-7 id="41" title="Formulario de Contacto"]' ); ?>
		<!-- @@ pnm end-->
</div>
<!-- End Team Members -->
<div id="delimiter"></div>
<?php get_footer();?>