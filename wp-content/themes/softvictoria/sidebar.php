		<div id='sidebar' class="large-3 columns">
			<div class='sidebartitle'>
				<h2><?php _e('Categorías');?></h2>
			</div>
			<ul class="no-bullet cat-list">
				<?php
				/* $args = array(
					'show_option_all'    => '',
					'orderby'            => 'name',
					'order'              => 'ASC',
					'style'              => 'list',
					'show_count'         => 0,
					'hide_empty'         => 1,
					'use_desc_for_title' => 0,
					'child_of'           => 0,
					'feed'               => '',
					'title_li'					 => '',
					'feed_type'          => '',
					'feed_image'         => '',
					'exclude'            => '',
					'exclude_tree'       => '',
					'include'            =>  array(11,33,30,29,28),
					'hierarchical'       => 1,
					'show_option_none'   => __( 'No categories' ),
					'number'             => null,
					'echo'               => 1,
					'depth'              => 0,
					'current_category'   => 1,
					'pad_counts'         => 0,
					'taxonomy'           => 'category',
					'walker'             => null
					);
				 	wp_list_categories($args); */

					//display random sorted list of terms in a given taxonomy
					$counter = 0;
					$max = 5; //number of categories to display
					$taxonomy = 'category';
					$terms = get_terms($taxonomy);
					shuffle ($terms);
					//echo 'shuffled';
					if ($terms) {
						foreach($terms as $term) {
							$counter++;
							if ($counter <= $max) {
						  	echo '<li><a href="' . get_category_link( $term->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a></li> ';
						 	}
						}
					}

				?>
			</ul>
			
			<div class='sidebartitle'>
				<h2><?php _e('Te puede interesar');?></h2>
			</div>
				<ul class="no-bullet cat-list">
					<?php
					$html= '';
					$post_id =  get_the_id();
					$objPost = get_post($post_id); 
					setup_postdata($objPost);
					// print_r(get_the_category($post_id));
					$cat=get_the_category($post_id);
					$args=array(
					'showposts' => 5,
					'category__in' => $cat[0]->cat_ID,
					'caller_get_posts'=>1, 
					'hide_empty'=>1,
					);
					//Testing the content of the post before it prints da HTML
					$posts=get_posts($args);
					
					
					foreach($posts as $post) 
					{
						setup_postdata($post); 
						// $post_content = wordwrap($post_wrapped, 20);
						$post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
						$post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
						$post_link=post_permalink();
						$post_title=get_the_title();

						$html  .= "<li>
				    <div class='orbit-caption'>
							<a href='${post_link}' class='the-post-link'><i class='general foundicon-right-arrow'>".get_the_title()."</i></a>
				    </div>
					  </li>
				    ";
					}
					print ${'html'};
					wp_reset_postdata();
					?>
				</ul>
		</div>