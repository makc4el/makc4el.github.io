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
function show_tours_ajax()
{
	$select_locations = $_POST['select_locations'];
	$select_locations = explode(",", $select_locations);
	$available_tours = get_posts();

	if (!$available_tours) {
		echo "not available tours";
		wp_die();
	}

	foreach ($available_tours as $k=>$v){
		$id_available_tours[]=$v->ID;
	}

	$html = '';
foreach ($id_available_tours as $v){

	$fields = get_fields($v);
	$id_tour = $v;
	$fields = $fields['content'];

	foreach ($fields as $key => $item) {
		
		if($item['acf_fc_layout'] == 'preview'){
			$gallery = '';
			foreach ($item['gallery'] as $k=>$v){
				$gallery.='<div class="owl-item" style="background: url('.$v['image'].') no-repeat center;background-size: cover;"></div>';
			}

			$stars = '';
			for ($i=0; $i<5; $i++){
				if($item['rating_number_of_stars']<=$i){
					$stars.='<span class="star-icon star-gold"></span>';
				}
				$stars.='<span class="star-icon "></span>';

			}

			$html.= '<div class="cart_container">
          <div class="cart_img-container">
            <div class="cart-cost_conatiner">
              <p class="cart-cost">'.$item['price'].'$</p>
              <p class="cart-days">'.$item['number_of_days'] .' '.$item['title_days'].'</p>
            </div>
            <div class="cart-img-list">'.$gallery.'</div>
          </div>
          <div class="cart_content-container">
            <p class="cart-title">'.$item['title'].'</p>
            <p class="cart-star-text">'.$item['description_after_title'].'</p>
            <div class="cart-star-container">'.$stars.'</div>
            <p class="cart-top cart-min-title">'.$item['title_top_places'].'</p>
            <p class="cart-path">'.$item['top_places'].'</p>
            <p class="cart-highloghts cart-min-title">'.$item['title_top_highlights'].'</p>
            <p class="cart-path">'.$item['top_highlights'].'</p>
            <a href="#" data-idtour="'.$id_tour.'" class="cart-btn">'.$item['title_button_view_details'].'</a>
          </div>
        </div>';
		}
	}
}



	//начало путевки
	$start_tour = $select_locations[1];
	if (!$start_tour) {
		echo "not available tours";
		wp_die();

	}

	$html.="<script>$( '.cart-btn' ).click(function(e) {
		e.preventDefault();
		localStorage.setItem('id_tour', $(this).data('idtour'));
		window.location = start_paning;
	});</script>";


	echo $html ;
}

add_action('wp_ajax_show_tours', 'show_tours_ajax');
add_action('wp_ajax_nopriv_show_tours', 'show_tours_ajax');


/////////////////////START PLANING//////////////////////////////////////////////
add_action('wp_ajax_start_planing', 'start_planing');
add_action('wp_ajax_nopriv_start_planing', 'start_planing');
function start_planing() {
	$id_tour = $_POST['id_tour'];
	$fields = get_fields($id_tour);
	$fields = $fields['content'];
	print_r($fields);
	foreach ($fields as $key => $item) {
		if($item['acf_fc_layout'] == 'a_general_description_of_the_whole_tour'){
			//TODO
			//file:///C:/wamp64/www/travel.lc/slice/package.html
		}
	}
	


	wp_die();
}




/////////////////////transfer//////////////////////////////////////////////
add_action('wp_ajax_transfer', 'transfer');
add_action('wp_ajax_nopriv_transfer', 'transfer');
function transfer() {
	$title_tour = $_POST['title_tour'];

	$available_tours = get_fields(2130, 'tours_and_sity');
	if(!$available_tours){
		echo "not available tours";
		wp_die();
	}

	foreach ($available_tours['tours_and_sity'] as $k=>$v){
		if($v['title_tour']==$title_tour){
			foreach ($v['tour'] as $kk => $vv){
				$tours[] =get_fields($vv->ID) ;
			}
$html="";
			foreach ($tours as $tour){
print_r($tour['city_name_first_tour']);





					$html= '<section class="transfer_way">
						<div class="container">
							<ul class="transfer-way_list">
								<li class="transfer-wat_item">
									<div class="transfer-logo"></div>
								</li>
								<li class="transfer-wat_item transfer-way_item-type">
									<p class="transfer-way_title">TRANSFER TYPE</p>
									<p class="transfer-way_text">Transfer</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-from">
									<p class="transfer-way_title">FROM</p>
									<p class="transfer-way_text">'.$tour['city_name_first_tour'].'</p>
									<p class="transfer-wat_date">21 Dec, 12:00 PM</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-to">
									<p class="transfer-way_title">TO</p>
									<p class="transfer-way_text">Beijing New Future Hotel</p>
									<p class="transfer-wat_date">22 Dec, 13:00 AM</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-btn">
								<a href="#" class="transfer-way_btn">DETAILS & ADJUST</a>
								</li>
							</ul>
							<ul class="transfer-way_list">
								<li class="transfer-wat_item">
									<div class="transfer-logo"></div>
								</li>
								<li class="transfer-wat_item transfer-way_item-type">
									<p class="transfer-way_title">CITY</p>
									<p class="transfer-way_text">London</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-from">
									<p class="transfer-way_title">HOTEL</p>
									<p class="transfer-way_text">London hotel 3*</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-to">
									<p class="transfer-way_title">ROOM</p>
									<p class="transfer-way_text">Standart double room</p>
								</li>
								<li class="transfer-wat_item transfer-way_item-btn">
									<p class="transfer-way-path">4 nights (Feb 01 - Feb 05)</p>
									<div id="slider"></div>
								</li>
							</ul>
						</div>
					</section>
					<section class="transfer_seats">
						<div class="container">
							<p class="transfer_seats-title">Dec 01, Wed</p>
							<ul class="transfer_seats-list">
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Spain Cathedra</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
							</ul>
							<p class="transfer_seats-title">Dec 01, Wed</p>
							<ul class="transfer_seats-list">
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Spain Cathedra</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
							</ul>
							<p class="transfer_seats-title">Dec 01, Wed</p>
							<ul class="transfer_seats-list">
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Spain Cathedra</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
								<li class="transfer_seats-item">
									<div class="transfer_seats-container">
										<div class="transfer_seats-image"></div>
										<div class="transfer_seats-content">
											<p class="transfer_seats_time">08:30 - 15:30</p>
											<p class="transfer_seats_object">Beijing Kung Fu Show</p>
											<div class="transfer_seats_edit"></div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</section>';






//					print_r($v);
			}


































			$response = array(
				'tours_html'=>$html,
				'tour_price'=>$v['tour_price'],
				'price_per_person'=>$v['price_per_perso'],
				'count_days'=>$v['count_days'],
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