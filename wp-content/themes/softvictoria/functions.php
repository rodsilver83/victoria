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
add_action( 'admin_init', 'restrict_admin', 1 );

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
?>