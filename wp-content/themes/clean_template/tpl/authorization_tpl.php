<?php
/*
Template Name: Authorization
*/
?>

<?php get_header(); ?>

<section class="inform_container">
	<div class="container">
		<h1 class="booking_title">
			<?=get_field('text_your_information')?>
		</h1>
		<a href="<?=get_permalink(2052)?>" class="sing_new">Sign up new account</a>
		<ul id="main_ul" class="inform_list">
			<form name="loginform" id="loginform" method="post">
				<li class="inform_item">
					<p class="inform-title">
						<?=get_field('text_email')?>
					</p>
					<input
						readonly
						onfocus="this.removeAttribute('readonly')"
						type="text"
						placeholder="<?=get_field('placeholder_email')?>"
						class="inform-input input"
						name="login"
						id="user_login"
						value=""
						size="20"
						tabindex="10"
					/>
				</li>

				<li class="inform_item">
					<p class="inform-title">
						<?=get_field('text_password')?>
					</p>
					<input
						readonly
						onfocus="this.removeAttribute('readonly')"
						type="password"
						placeholder="<?=get_field('placeholder_password')?>"
						class="inform-input input"
						name="pwd"
						id="user_pass"
						value=""
						size="20"
						tabindex="20"
					/>
				</li>
				<li id="submit_authorization" class="inform_item inform_item-btn">
					<a href="#" class="inform-log_link"><?=get_field('title_button_login')?></a>
				</li>
			</form>
		</ul>
	</div>
</section>
<script>
	var redirect = localStorage.getItem('redirect');
	if(redirect!==null){
		window.location = redirect;
	}
</script>
<?php get_footer(); ?>
