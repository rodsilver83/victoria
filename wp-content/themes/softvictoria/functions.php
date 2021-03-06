<?php

add_theme_support('post-thumbnails');

set_post_thumbnail_size( 500, 500 );

function startsWith($haystack, $needle)
{
    return $needle === "" || strpos($haystack, $needle) === 0;
}
function endsWith($haystack, $needle)
{
    return $needle === "" || substr($haystack, -strlen($needle)) === $needle;
}

function restrict_admin()
{
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
	}
}
//add_action( 'admin_init', 'restrict_admin', 1 );

// ====== funciones para el plugin de contact form 7

add_action("wpcf7_before_send_mail", "wpcf7_do_before_send");  

function wpcf7_do_before_send($wpcf7) {  

	$submission = WPCF7_Submission::get_instance();
	$data = $submission->get_posted_data();
	$_SESSION['posted_data']=$data;
	return true;
}

function wpcf7_do_after_mail_sent( $contact_form ) {

	// print_r($_SESSION['posted_data']);
	if(isset($_SESSION['posted_data']['tipo-emprendedora']))
	{
		if(startsWith($_SESSION['posted_data']['tipo-emprendedora'], '1'))
		{
			wp_redirect( site_url('/candidata-a-academia-147') ); exit;
			
		}
		elseif(startsWith($_SESSION['posted_data']['tipo-emprendedora'], '2'))
		{
			wp_redirect( site_url('/candidata-a-academia-147-jr-sr') ); exit;
		}
		elseif(startsWith($_SESSION['posted_data']['tipo-emprendedora'], '3'))
		{
			wp_redirect( site_url('/candidata-a-emprendedoras') ); exit;
		}
	}

	// if ( $title == 'Newsletter Signup' ) {
	// 
	// 	$email = $posted_data['email'];
	// 
	// 	header('Location: http://campuzoic.us2.list-manage1.com/subscribe?u=e014c12069e8858be934de06e&id=e5c704e1b9&MERGE0=$email');
	// }
} 
add_action( 'wpcf7_mail_sent', 'wpcf7_do_after_mail_sent' );


// ======= Funciones para personalizar el plugnin 

function my_process_fsctf_mail_sent($form) {

##################################
 // control which forms you want this on
 $all_forms = true; // set to true for process on all forms, or false to use settings below
 $forms = array('3');  // one or more individual forms
 ##################################
 if ( !in_array($form->form_number, $forms) && $all_forms != true)
 return;

if ( $form->form_number == 3 ) {
	print_r($form->posted_data);
  foreach ($form->posted_data as $name => $value) { 

     //do whatever code A you want here

  }
}

if ( $form->form_number == 2 ) {
  foreach ($form->posted_data as $name => $value) { 

     //do whatever code B you want here

  }
}

// do not return a string, because this is only an action hook
return;

} // end function
// Hook into Fast Secure Contact Form after email sent
add_action('fsctf_mail_sent', 'my_process_fsctf_mail_sent');


// add a favicon to your
// function blog_favicon() {
// echo '<link rel="Shortcut Icon" type="image/x-icon" href="'.get_bloginfo('wpurl').'http://cdn3.wpbeginner.com/favicon.ico" />';
// }
// add_action('wp_head', 'blog_favicon');

//Remove the Wordpress Version
function wpbeginner_remove_version() {
return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

//Customized Gravatar for comments
add_filter( 'avatar_defaults', 'newgravatar' );
function newgravatar ($avatar_defaults) {
	$myavatar = get_bloginfo('template_directory') . '/images/gravatar.gif';
	$avatar_defaults[$myavatar] = "Victoria147";
	return $avatar_defaults;
}

function victoria_scripts_styles() {
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}

//Testing Disqus
function disqus_embed($disqus_shortname) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$post->post_title.'";
        var disqus_url = "'.get_permalink($post->ID).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post->ID.'";
    </script>';
}


function the_avatars(){
	if ( !defined( 'USER_AVATAR_FULL_WIDTH' ) ) define( 'USER_AVATAR_FULL_WIDTH', 250 );
	if ( !defined( 'USER_AVATAR_FULL_HEIGHT' ) ) define( 'USER_AVATAR_FULL_HEIGHT', 250 );
}
// ========= eaeaea eaeaea eaeaea 

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}	
?>
