<?php
// Включаем поддержку миниатюр
add_theme_support('post-thumbnails');

// Задаем размеры миниатюре
set_post_thumbnail_size(254, 190);

// Регистрируем сайдбар
if ( function_exists('register_sidebar') ) {

	register_sidebar(array(
		'name' => 'test',
		'id' => 'test',
		'description' => 'test',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	));

}
//FOR SEARCH
//function SearchFilter($query) {
//    if ($query->is_search) {
//        $query->set('post_type', 'post');
//    }
//    return $query;
//}
//add_filter('pre_get_posts','SearchFilter');

//FOR DOWNLOAD 
//function enable_extended_upload ( $mime_types =array() ) {
//	$mime_types['gz']  = 'application/x-gzip';
//	$mime_types['zip']  = 'application/zip';
//	$mime_types['rtf'] = 'application/rtf';
//	$mime_types['ppt'] = 'application/mspowerpoint';
//	$mime_types['ps'] = 'application/postscript';
//	$mime_types['flv'] = 'video/x-flv';
//	$mime_types['txt'] = 'text/plain';
//	$mime_types['pdf'] = 'application/pdf';
//	$mime_types['flv'] = 'video/x-flv';
//	$mime_types['mp4'] = 'video/mp4';
//	$mime_types['m3u8'] = 'application/x-mpegURL';
//	$mime_types['ts'] = 'video/MP2T';
//	$mime_types['3gp'] = 'video/3gpp';
//	$mime_types['mov'] = 'video/quicktime';
//	$mime_types['avi'] = 'video/x-msvideo';
//	$mime_types['wmv'] = 'video/x-ms-wmv';
//	unset( $mime_types['exe'] );
//	unset( $mime_types['bin'] );
//	return $mime_types;
//}
//add_filter('upload_mimes', 'enable_extended_upload');

								//FOR CLEAN CACHE ONE POST
//add_action( 'save_post', 'action_function_name_11', 10, 3 );
//function action_function_name_11( $post_id, $post, $update ) {
//	global $wpdb;
//	$post_url = (get_permalink( $post_id ));
//	$post_url = md5(substr($post_url, 7));
//	$query="DELETE FROM cache WHERE link = '".$post_url."';";
//	$wpdb->query($query);
//}

// add_action( 'wp_enqueue_scripts', 'my_scripts_method2' );
// function my_scripts_method2(){
//   wp_deregister_script( 'jquery' );
//   wp_deregister_script( 'jquery-migrate' );
// }



// Ban Update WP, plugins, themes
//require_once('models/ban-update.php');

//function return_term_lang_slug($slug, $taxonomy) {
//  $curent_slug =  get_term_by('slug', $slug, $taxonomy);
//  if(function_exists('icl_object_id') && !is_wp_error($curent_slug) ) {
//    $id = icl_object_id($curent_slug->term_id,$taxonomy,true);
//  } else {
//    return $slug;
//  }
//  if ($id && !is_wp_error($id)) {
//  	 $lang_term = get_term_by('id', $id, $taxonomy);
//  	 return $lang_term->slug;
//  }
//}

function users_redirect(){
	wp_redirect(site_url());
	die();
}
if(!current_user_can('manage_options')){
	add_action('admin_init','users_redirect');
}
////////////////////////////REGISTRATION///////////////////////////////////////////////////////////////////////////
function registration_ajax(){
//	echo json_encode($_POST['fields']) ;
//	die();
	$fname = $_POST['fields']['fname'];
	$lname = $_POST['fields']['lname'];
	$country = $_POST['fields']['country'];
	$phone = $_POST['fields']['phone'];
	$username = $_POST['fields']['fname'];
	$password = $_POST['fields']['password'];
	$email = $_POST['fields']['email'];

	custom_registration_function($fname, $lname, $country, $phone, $username, $password, $email );
	die();
}

function custom_registration_function($fname, $lname, $country, $phone, $username, $password, $email) {
	$registration_validation=registration_validation($username, $email);
	if(count($registration_validation)==0){
		$fname = 	sanitize_text_field($fname);
		$lname 	= 	sanitize_text_field($lname);
		$country 	= 	sanitize_text_field($country);
		$phone 		= 	sanitize_text_field($phone);
		$username	= 	sanitize_user($username);
		$password 	= 	esc_attr($password);
		$nickname 	= 	$fname ." ".$lname;
		complete_registration($registration_validation,$fname, $lname, $country, $phone, $username, $password, $nickname, $email);
	}else{
		echo json_encode($registration_validation) ;
	}
}

function registration_validation( $username, $email )  {
	global $reg_errors;
	$reg_errors = new WP_Error;

	if ( username_exists( $username ) )
		$reg_errors->add('user_name', 'That username already exists!');

	if ( !validate_username( $username ) ) {
		$reg_errors->add('username_invalid', 'The username you entered is not valid');
	}

	if ( !is_email( $email ) ) {
		$reg_errors->add('email_invalid', 'Email not valid');
	}

	if ( email_exists( $email ) ) {
		$reg_errors->add('email', 'Email Already in use');
	}

	if ( is_wp_error( $reg_errors ) ) {
		return $reg_errors->get_error_messages();
	}
}

function complete_registration($registration_validation, $fname, $lname, $country, $phone, $username, $password, $nickname, $email) {
	if ( count($registration_validation) < 1 ) {
		$userdata = array(
			'user_login'	=> 	$fname,
			'user_email' 	=> 	$email,
			'user_pass' 	=> 	$password,
			'first_name' 	=> 	$fname,
			'last_name' 	=> 	$lname,
			'nickname' 		=> 	$nickname,
		);
		$user_id = wp_insert_user( $userdata );

		if( ! is_wp_error( $user_id ) ) {
			update_user_meta($user_id, 'country', $country);
		}
		if( ! is_wp_error( $user_id ) ) {
			update_user_meta($user_id, 'phone', $phone);
		}
		echo 'Registration complete.';
	}
}

add_action('wp_ajax_registration', 'registration_ajax');
add_action('wp_ajax_nopriv_registration', 'registration_ajax');




////////////////////////////AUTHORIZATION///////////////////////////////////////////////////////////////////////////
function myauthorization_callback(){
//	echo json_encode($_POST['fields']) ;


	$login = $_POST['fields']['login'];
	$pwd = $_POST['fields']['pwd'];
	$creds = array();
	$creds['user_login'] = $login;
	$creds['user_password'] = $pwd;
	$creds['remember'] = false;

	$user = wp_signon( $creds, false );

	if ( is_wp_error($user) )
//		echo $user->get_error_message();
		echo 'Error incorrect username or password';
	else
		echo 'authorization complete.';
//		echo json_encode($user);
		wp_die();
}

add_action('wp_ajax_myauthorization', 'myauthorization_callback');
add_action('wp_ajax_nopriv_myauthorization', 'myauthorization_callback');















