<?php
/**
* A Simple Category Template
*/

get_header(); ?> 

<div id="primary" class="row site-content">
    <div id="content" role="main">

<?php 
// Check if there are any posts to display
$args=array(
    'category__in' => 56,

    'post_type' => 'ANY',
    'post_status' => 'publish',
    'posts_per_page' => 1000,
    'orderby'=> 'title',
    'order' => 'asc',
        'nopaging' => true, 
  );

      $my_query = new WP_Query($args);
// print(json_encode($my_query));
?>

        <div role="main" id="the-category" class="large-12 columns">    
            <div class="archive-header">
                <div class="the-category-title">
                    <p>
                    Red de Fellows
                    </p>
                </div>
            </div>

            <div class="row">
            <?php

            if( $my_query->have_posts() ) {

        while ($my_query->have_posts()) : $my_query->the_post(); 
            ?>
                <div class="large-4 columns category-post the-fellow">
                    <!--div class="category-post-title">
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                        <small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
                    </div-->
                    <div class="the-fellow-logo">
                        <?php 
                        $post_thumbnail =  get_the_post_thumbnail( $post->ID, array(500,500)); 
                        print $post_thumbnail = (!empty($post_thumbnail))?$post_thumbnail: "<img src='http://placepuppy.it/500/500' class='the-squared-image' width='100%' height='auto'>";
                        ?>
                    </div>
                    <div class="the-fellow-entry">
                        <?php  the_content(); ?>
                    </div>
                </div>

            <?php endwhile; 
         }    
        ?>
            </div><!-- End row -->

        </div>

    </div>
</div>
<script type="text/javascript">
   $('.the-fellow').hover(function () {
        $('.the-fellow-entry', this).stop(true, true).slideDown("normal");
    }, function () {
        $('.the-fellow-entry', this).stop(true, true).hide();
    });
</script>

<?php get_footer(); ?>