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


function register_my_session()
{
	if( !session_id() )
	{
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
	$tours_id = $_POST['tours_id'];

	$args = array(
		'numberposts' => -1,
		'order'       => 'DESC',
		'include'     => $tours_id,
		'exclude'     => array(),
		'post_type'   => 'post',
	);

	$posts = get_posts( $args );
	foreach($posts as $post){ setup_postdata($post);
		$id = $post->ID;
		?>
		<div class="cart_container">
			<div class="cart_img-container">
				<div class="cart-cost_conatiner">
					<p class="cart-cost">
						<?=get_field('price', $id)?>
					</p>
					<p class="cart-days">
						<?=get_field('count_days', $id)?> DAYS
					</p>
				</div>
				<div class="cart-img-list">
					<?php foreach (get_field('images', $id) as $k=>$v){ ?>
						<div class="owl-item"></div>
						<div class="owl-item" style="background: url(<?=$v['image']?>) no-repeat center;background-size: cover;"></div>
					<?php } ?>
				</div>
			</div>
			<div class="cart_content-container">
				<p class="cart-title">
					<?=get_field('title', $id)?>
				</p>
				<p class="cart-star-text">
					<?=get_field('description_after_title_preview', $id)?>
				</p>
				<div class="cart-star-container">
					<?php $count_gold=get_field('rating_preview', $id); for($i=0; $i<5; $i++){ ?>
						<span class="star-icon <?php if($i<$count_gold){ echo "star-gold";} ?>"></span>
					<?php } ?>
				</div>
				<p class="cart-top cart-min-title">
					<?=get_field('title_top_places_preview', $id)?>
				</p>
				<p class="cart-path">
					<?=get_field('description_top_places_preview', $id)?>
				</p>
				<p class="cart-highloghts cart-min-title">
					<?=get_field('title_top_highlightspreview', $id)?>
				</p>
				<p class="cart-path">
					<?=get_field('description_top_highlightspreview', $id)?>
				</p>
				<a href="<?= get_permalink($id) ?>" class="cart-btn view_tour">view details</a>
			</div>
		</div>
<?php
	}
	wp_reset_postdata(); // сброс
	wp_die();

}

add_action('wp_ajax_show_tours', 'show_tours_ajax');
add_action('wp_ajax_nopriv_show_tours', 'show_tours_ajax');


/////////////////////START PLANING//////////////////////////////////////////////
add_action('wp_ajax_start_planing', 'start_planing');
add_action('wp_ajax_nopriv_start_planing', 'start_planing');
function start_planing() {
	$id_package = intval( $_POST['id_package'] );
	unset($_SESSION['id_package']);
	$_SESSION['id_package']= $id_package;

	wp_die();
}





























add_action('wp_ajax_my_action', 'my_action_callback');
add_action('wp_ajax_nopriv_my_action', 'my_action_callback');
function my_action_callback() {
	$whatever = intval( $_POST['whatever'] );
	echo $whatever + 10;
	wp_die();
}









