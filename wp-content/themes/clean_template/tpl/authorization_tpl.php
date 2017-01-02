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
		<ul class="inform_list">
			<form name="loginform" id="loginform" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
				<li class="inform_item">
					<p class="inform-title">
						<?=get_field('text_email')?>
					</p>
					<input
						type="text"
						placeholder="<?=get_field('placeholder_email')?>"
						class="inform-input input"
						name="log"
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
				<!--				<input name="rememberme" type="checkbox" id="rememberme" value="forever" tabindex="90" />-->
					<input type="submit" name="wp-submit" id="wp-submit" class="button-primary" value="<?=get_field('title_button_login')?>" tabindex="100" />
					<input type="hidden" name="redirect_to" value="<?php echo get_option('home'); ?>/" />
				<li class="inform_item inform_item-btn">
					<input type="hidden" name="testcookie" value="1" />
				</li>
			</form>

<!--			<a href="--><?php //echo get_option('home'); ?><!--/wp-login.php?action=lostpassword" title="Password Lost and Found">-->
<!--				Lost your password?-->
<!--			</a>-->
		</ul>
	</div>
</section>

<?php get_footer(); ?>
