<?php

add_theme_support('post-thumbnails');

set_post_thumbnail_size( 500, 500 );

function restrict_admin()
{
	if ( ! current_user_can( 'manage_options' ) && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF'] ) {
                wp_redirect( site_url() );
	}
}
add_action( 'admin_init', 'restrict_admin', 1 );

// ====== funciones para el plugin de contact form 7

function your_wpcf7_mail_sent_function( $contact_form ) {
	$title = $contact_form->title;
	$posted_data = $contact_form->posted_data;
	print_r($posted_data);
	// print_r($contact_form);
	die();

	// if ( $title == 'Newsletter Signup' ) {
	// 
	// 	$email = $posted_data['email'];
	// 
	// 	header('Location: http://campuzoic.us2.list-manage1.com/subscribe?u=e014c12069e8858be934de06e&id=e5c704e1b9&MERGE0=$email');
	// }
} 
add_action( 'wpcf7_mail_sent', 'your_wpcf7_mail_sent_function' );


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