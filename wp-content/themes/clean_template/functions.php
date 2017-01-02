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

//add_action( 'init', 'blockusers_init' );
//function blockusers_init() {
//	if ( !is_admin()) {
//		wp_redirect( home_url() );
//		exit;
//	}
//}