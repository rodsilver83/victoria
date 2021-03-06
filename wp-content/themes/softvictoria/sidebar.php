<div id='sidebar' class="large-3 columns">
    <div class='sidebartitle'>
        <h2><?php _e('Categorías');?></h2>
    </div>
    <ul class="no-bullet cat-list">
        <?php
        $cat_args=array(
            'orderby' => 'name',
            'order' => 'ASC',
            'include'=> array(59,58,60,63,61,62) 
        );                $counter=0;
        $categories=get_categories($cat_args);
        if ($categories) 
        {
            foreach($categories as $term) 
            {
              echo '<li><a href="' . get_category_link( $term->term_id ) . '" title="' . sprintf( __( "Ver todas las publicaciones en %s" ), $term->name ) . '" ' . '>' . $term->name.'</a></li> ';
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
          'category__not_in' => array($cat[0]->cat_ID, 14, 10, 55, 19, 20, 29, 42, 53, 56, 30),
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
              <a href='${post_link}' class='the-post-link'><i class='general foundicon-right-arrow'> ".get_the_title()."</i></a>
            </li>
          ";
          }
          print ${'html'};
          wp_reset_postdata();
          ?>
      </ul>
    <!-- Subscribe -->
    <div class='sidebartitle'>
      <h2><?php _e('Suscríbete');?></h2>
    </div>
    <div class="subscribe-form">
      <iframe width="100%" height="100%" scrolling="no" frameborder="0" src="<?= $_SERVER['SERVER_NAME']  ?>/?wysija-page=1&controller=subscribers&action=wysija_outter&wysija_form=1&external_site=1&wysijap=subscriptions" class="iframe-wysija" tabindex="0" style="position: static; top: 0pt; margin: 0px; border-style: none; height: 330px; left: 0pt; visibility: visible;" marginwidth="0" marginheight="0" allowtransparency="true" title="Subscription MailPoet"></iframe>
    </div> 
    <div class="sidebar-description">
      Suscríbete a nuestro Newsletter y recibe las noticias más relevantes
    </div> 
  </div>