<?php
/**
 * The Template for displaying all page authors
 *
 * @package WordPress
 * @subpackage softvictoria
 * @since softvictoria 1.0
 */

// set_post_thumbnail_size( 50, 50 );

get_header(); 

$post_id =  get_the_id();
$objPost = get_post($post_id); 
setup_postdata($objPost);
?>
<div id="primary" class="row site-content">
    <div role="main" id="the-post" class="large-12 columns">
        <div class="the-post-title">
            <h1><?php the_title();?></h1>
        </div>
        <!-- blockquote class="the-post-author">
            <cite><?php // the_author_posts_link()?> | <?php the_date()?></cite>
        </blockquote -->
        <?php // the_content();?>
        <div class="row the-author-list">
            <?php
            global $wpdb;
            $args = array( 'orderby' => 'display_name', 'order' => 'ASC', 'who' => 'authors' );
            $authors = get_users( $args );
        
            // For each author in $authors, we display their name and a link to their author archive page
            //foreach ( $authors as $author ) {

                // EXAMPLE: display author first & last name

                //echo "<a href='".get_author_posts_url( $author->ID )."'>{$author->first_name} {$author->last_name}</a><br>". get_avatar( get_the_author_meta( 'ID' ), 1 ) ."\n";
                    //echo the_author_meta( 'description' )."<br>\n" ;
            //}
             
             $num_authors = count($authors);
            ?>

            <?php foreach ( $authors as $author ) :?>
              <div class="an-author large-12 columns">
                <div class="row an-author-content">
                  <div class="large-4 columns">
                    <a href="<?php echo get_author_posts_url( $author->ID ); ?>">
                      <?//php echo ( "{$author->first_name} {$author->last_name}" ) ;?>
                      <?//php echo get_avatar( get_the_author_meta( 'ID' ), 1 )."\n"; ?>
                    <?php echo get_avatar($author->ID, USER_AVATAR_FULL_HEIGHT); ?>
                    </a>
                  </div>
                  <div class="large-8 columns">
                    <a href="<?php echo get_author_posts_url( $author->ID ); ?>">
                      <h3 class="who-author"><?php echo ( "{$author->first_name} {$author->last_name}" ) ;?> <span>Ver Artículos  <i class="general foundicon-right-arrow"></i></span></h3>
                    </a>
                    <p class="an-author-desc">
                      <?php echo the_author_meta( 'description', $author->ID  )."<br>\n" ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="cwat">
             </div>
            <?php endforeach; ?>
       
        </div>
    </div><!-- #the-post -->

</div><!-- #primary -->


<?php get_footer(); ?>