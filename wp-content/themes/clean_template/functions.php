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
//	unset( $mime_types['bin'] );
//	return $mime_types;
//}
//add_filter('upload_mimes', 'enable_extended_upload');

function register_my_session(){
	if( !session_id() ) {
		session_start();
	}
}
add_action('init', 'register_my_session');


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


////////////////////////////////////////////SELECT CITY///////////////////////////////////////////////////////////////
function selectcity_ajax(){
	$city = $_POST['city'];
	$post_page = get_permalink(2123);
	$all_cities_and_tours = get_field('tours_and_sity', 2130);
	foreach ($all_cities_and_tours as $k=>$v){
		if($v['city']==$city){
			array_unshift($v['tour'], $post_page);
			echo json_encode($v['tour']);
		}
	}
	wp_die();
}
add_action('wp_ajax_selectcity', 'selectcity_ajax');
add_action('wp_ajax_nopriv_selectcity', 'selectcity_ajax');


////////////////////////////////////////////SHOW TOURS///////////////////////////////////////////////////////////////
function show_tours_ajax(){
	$select_locations = $_POST['select_locations'];
	$select_locations = explode(",", $select_locations);
	$available_tours = get_fields(2130, 'tours_and_sity');
	if(!$available_tours){
		echo "not available tours";
		wp_die();
	}

	//начало путевки
	$start_tour = $select_locations[1];
	if(!$start_tour){
		echo "not available tours";
		wp_die();
	}

	$found_tours = array();
	foreach ($available_tours['tours_and_sity'] as $k=>$v){

		foreach ($v['cities'] as $kk=>$vv){
			$address = $vv['city']['address'];
			$str=strpos($address, ",");
			$city=substr($address, 0, $str);
			if(stripos('Лондон', $city)!==false){
				$found_tours[]=$v;


			}
		}
	}

	if(count($found_tours)==0){
		echo "not available tours";
		wp_die();
	}

	foreach ($found_tours as $tour){

		?>
		<div class="cart_container">
			<div class="cart_img-container">
				<div class="cart-cost_conatiner">
					<p class="cart-cost"><?=$tour['tour_price']?>$</p>
					<p class="cart-days"><?=$tour['count_days']?></p>
				</div>
				<div class="cart-img-list">
					<?php foreach ($tour['preview_gallery'] as $img){?>
						<div class="owl-item" style="background: url(<?=$img['image']?>) no-repeat center;background-size: cover;"></div>
					<?php } ?>
				</div>
			</div>
			<div class="cart_content-container">
				<p class="cart-title"><?=$tour['title_tour']?></p>
				<p class="cart-star-text"><?=$tour['short_description_preview']?></p>
				<div class="cart-star-container">
					<span class="star-icon star-gold"></span>
					<span class="star-icon star-gold"></span>
					<span class="star-icon star-gold"></span>
					<span class="star-icon star-gold"></span>
					<span class="star-icon"></span>
				</div>
				<p class="cart-top cart-min-title">
					<?=$tour['title_top_places_preview']?>
				</p>
				<p class="cart-path">
					<?=$tour['top_places_preview']?>
				</p>
				<p class="cart-highloghts cart-min-title">
					<?=$tour['title_top_highlightspreview']?>
				</p>
				<p class="cart-path">
					<?=$tour['top_highlightspreview']?>
				</p>
				<a href="#" class="cart-btn">view details</a>
				<p class="is_tours" style="display: none"><?php foreach ($tour['tour'] as $v){echo $v->ID.",";} ?></p>
				<p class="title_tour" style="display: none"><?=$tour['title_tour']?></p>
			</div>
		</div>
	<?php } ?>
	<script>
		$(".cart-btn").click(function (e) {
			e.preventDefault();
			var id_show_tours = $(this).next().text();
			var title_tour = $(this).next().next().text();
			localStorage.setItem("id_show_tours", id_show_tours);
			localStorage.setItem("title_tour", title_tour);
			window.location = start_paning;
		});
	</script>
<?php

	wp_die();

}

add_action('wp_ajax_show_tours', 'show_tours_ajax');
add_action('wp_ajax_nopriv_show_tours', 'show_tours_ajax');


/////////////////////START PLANING//////////////////////////////////////////////
add_action('wp_ajax_start_planing', 'start_planing');
add_action('wp_ajax_nopriv_start_planing', 'start_planing');
function start_planing() {
	$title_tour = $_POST['title_tour'];

	$available_tours = get_fields(2130, 'tours_and_sity');
	if(!$available_tours){
		echo "not available tours";
		wp_die();
	}

	foreach ($available_tours['tours_and_sity'] as $k=>$v){
		if($v['title_tour']==$title_tour){
			
			$response = array(
				'title_show_tour'=>$v['title_tour'],
				'description_1'=>$v['description_1'],
				'description_2'=>$v['description_2'],
				'title_top_highlights'=>$v['title_top_highlights'],
				'top_highlights2'=>$v['top_highlights'],
				'tour_images'=>$v['tour_images'],
				'tour_price'=>$v['tour_price'],
				'title_tour'=>$v['title_tour'],
				'count_days'=>$v['count_days'],
				'title_before_description_2'=>$v['title_before_description_2'],
		);
		}
	}

echo json_encode($response);


	wp_die();
}





























add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');
function my_action_callback() {
	$whatever = intval( $_POST['whatever'] );
	echo $whatever + 10;
	wp_die();
}








//
//function my_acf_init() {
//
//	acf_update_setting('google_api_key', 'AIzaSyBTsaGllt7sdCMr3CLUDPYBhVc4LVgA1AI');
//}
//
//add_action('acf/init', 'my_acf_init');