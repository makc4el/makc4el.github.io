<?php
/*
Template Name: Registration
*/
?>

<?php get_header(); ?>

<section class="inform_container inform_reg">
	<div class="container">
		<h1 class="booking_title">
			<?= get_field('text_your_information') ?>
		</h1>
		<a href="<?= get_permalink(2054) ?>" class="sing_new">Sign in to your account</a>
<?php
function custom_registration_function() {
	if (isset($_POST['submit'])) {

		registration_validation(
			$_POST['fname'],
			$_POST['lname'],
			$_POST['country'],
			$_POST['phone'],
			$_POST['username'],
			$_POST['password'],
			$_POST['username'],
			$_POST['lname']." ".$_POST['lname']
		);

		// sanitize user form input
		global $username, $password, $email, $first_name, $last_name, $nickname, $bio;
		$first_name = 	sanitize_text_field($_POST['fname']);
		$last_name 	= 	sanitize_text_field($_POST['lname']);
		$country 	= 	$_POST['country'];
		$phone 		= 	sanitize_text_field($_POST['phone']);

		$username	= 	sanitize_user($_POST['username']);
		$password 	= 	esc_attr($_POST['password']);
		$email 		= 	$username;
		$nickname 	= 	$first_name ." ".$last_name;

		// call @function complete_registration to create the user
		// only when no WP_error is found
		complete_registration(
			$first_name,
			$last_name,
			$country,
			$phone,
			$username,
			$password,
			$email,
			$nickname
		);
	}

		registration_form(
			$first_name,
			$last_name,
			$country,
			$phone,
			$username,
			$password,
			$email,
			$nickname
		);
	}

function registration_form( $first_name, $last_name, $country, $phone, $username, $password, $email, $nickname ) {
	?>
    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
		<ul class="inform_list">
			<li class="inform_item">
				<p class="inform-title">
					<?=get_field("text_first_name")?>
				</p>
				<input 
					type="text" 
					placeholder="<?=get_field("placeholder_first_name")?>"
					class="inform-input" 
					name="fname" 
					value="<?=(isset($_POST['fname']) ? $first_name : null)?>"
				>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">
				<?=get_field("text_last_name")?>
				</p>
				<input 
					type="text" 
					placeholder="<?=get_field("placeholder_last_name")?>"
					class="inform-input" 
					name="lname" 
					value="<?=(isset($_POST['lname']) ? $last_name : null)?>"
				>
			</li>
				
			<li class="inform_item inform_item-btn inform_item-select">
				<p class="inform-title">
					<?=get_field('text_country_of_residence')?>
				</p>
				<select name="country" class="inform-input_select-country">
					<?php foreach (get_field('list_country_of_residence') as $k=>$v){ ?>
						<option <?php if($k==0){echo "selected=\"selected\"";} ?> value="<?=$v['country']?>"><?=$v['country']?></option>
					<?php } ?>
				</select>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">
				<?=get_field("text_mobile_number")?>
				</p>
				<input 
					type="text" 
					placeholder="<?=get_field("placeholder_mobile_number")?>"
					class="inform-input" 
					name="phone" 
					value="<?=(isset($_POST['phone']) ? $phone : null)?>"
				>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">
				<?=get_field("text_email")?>
				</p>
				<input 
					type="text" 
					placeholder="<?=get_field("placeholder_email")?>"
					class="inform-input" 
					name="username" 
					value="<?=(isset($_POST['username']) ? $username : null)?>"
				>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">Password</p>
				<input 
					type="password" 
					placeholder="Password" 
					class="inform-input" 
					name="password" 
					value="<?=(isset($_POST['password']) ? $password : null)?>"
				>
			</li>	
			
			<li class="inform_item inform_item-btn">
				<input type="submit" name="submit" value="<?=get_field("title_button_continue")?>"/>
			</li>
		</ul>
	</form>
	<?php
}

function registration_validation( $first_name, $last_name, $country, $phone, $username, $password, $email, $nickname )  {
	global $reg_errors;
	$reg_errors = new WP_Error;

	if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
		$reg_errors->add('field', 'Required form field is missing');
	}

	if ( strlen( $username ) < 4 ) {
		$reg_errors->add('username_length', 'Username too short. At least 4 characters is required');
	}

	if ( username_exists( $username ) )
		$reg_errors->add('user_name', 'Sorry, that username already exists!');

	if ( !validate_username( $username ) ) {
		$reg_errors->add('username_invalid', 'Sorry, the username you entered is not valid');
	}

	if ( strlen( $password ) < 5 ) {
		$reg_errors->add('password', 'Password length must be greater than 5');
	}

	if ( !is_email( $email ) ) {
		$reg_errors->add('email_invalid', 'Email is not valid');
	}

	if ( email_exists( $email ) ) {
		$reg_errors->add('email', 'Email Already in use');
	}

	if ( is_wp_error( $reg_errors ) ) {

		foreach ( $reg_errors->get_error_messages() as $error ) {
			echo '<div>';
			echo '<strong>ERROR</strong>:';
			echo $error . '<br/>';
			echo '</div>';
		}
	}
}

function complete_registration() {
	global $reg_errors, $first_name, $last_name, $country, $phone, $username, $password, $email, $nickname;
	if ( count($reg_errors->get_error_messages()) < 1 ) {
		$userdata = array(
			'user_login'	=> 	$username,
			'user_email' 	=> 	$email,
			'user_pass' 	=> 	$password,
			'first_name' 	=> 	$first_name,
			'last_name' 	=> 	$last_name,
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
?>
		<?php custom_registration_function(); ?>
	</div>
</section>

<?php get_footer(); ?>
