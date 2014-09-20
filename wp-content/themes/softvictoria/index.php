<?php get_header(); ?>
<div id='main'>
	<div id='content'>
		<h1>Main content area</h1>
		<?php/*
		 if (have_posts()): while(have_posts()): the_post(); ?>
			<h1><?php the_title();?></h1>

			<h4>Posted on <?php the_time('F jS Y')?></h4>
			<p><?php the_content(__('(more ...)'));?></p>
			<hr/>
		<?php endwhile; else:?>
			<p><?php _e('Sorry, we couldn\'t find the post you are looking for...')?></p>
		<?php endif;
		die();
		*/
		?>
		<?php
		/**
		* ===============
		* aquí está el ejemplo
		$wpdb->query( $wpdb->prepare( "INSERT INTO $wpdb->my_custom_table
		( id, field_key, field_value ) VALUES ( %d, %s, %s )", 1, $field_key, $field_value ) );
		*/
		
		/*
		global $wpdb;
		// $rsCategorias=$wpdb->get_results( $wpdb->prepare("SELECT wpt.term_id, wpt.name, wptt.term_taxonomy_id FROM wp_terms wpt, wp_term_taxonomy wptt WHERE wpt.term_id = wptt.term_id AND wptt.taxonomy='category' AND wptt.count >0;") );
		$rsCategorias=$wpdb->get_results("SELECT wpt.term_id, wpt.name, wptt.term_taxonomy_id FROM wp_posts wpp, wp_term_relationships wptr, wp_term_taxonomy wptt, wp_terms wpt  WHERE wpp.ID = wptr.object_id AND wptr.term_taxonomy_id = wptt.term_taxonomy_id AND wptt.term_id = wpt.term_id AND wptt.taxonomy='category' AND wpp.post_content <> '' AND post_type='post' AND wpp.post_status = 'Publish' ORDER BY wpt.term_id DESC ;
		");
		// print_R($rsCategorias);
		foreach($rsCategorias as $regCategoria)
		{
			echo '<p>Category: <a href="' . get_category_link( $regCategoria->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $regCategoria->name ) . '" ' . '>' . $regCategoria->term_id.": ".$regCategoria->name.'</a> </p> ';
			$args=array(
			'showposts' => 1,
			'category__in' => array($regCategoria->term_id),
			'caller_get_posts'=>1, 
			);
			$posts=get_posts($args)[0];

			if($posts->post_content!='')
			{
				unset($posts);
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
			print("===============<br/>");
		}
		die();
		*/

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
		
	</div>
	<?php get_sidebar();?>
</div>
<div id='delimiter'></div>
<?php get_footer();?>