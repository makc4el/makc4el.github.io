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
		<a href="#" class="sing_new">Sign in to your account</a>
<!--		<ul class="inform_list">-->
<!--			<li class="inform_item">-->
<!--				<p class="inform-title">First name</p>-->
<!--				<input type="text" placeholder="Enter your first name" class="inform-input"/>-->
<!--			</li>-->
<!--			<li class="inform_item">-->
<!--				<p class="inform-title">Last name</p>-->
<!--				<input type="text" placeholder="Enter your last name" class="inform-input"/>-->
<!--			</li>-->
<!--			<li class="inform_item inform_item-btn inform_item-select">-->
<!--				<p class="inform-title">Country of residence</p>-->
<!--				<select class="inform-input_select-country">-->
<!--					<option value="UK">UK</option>-->
<!--					<option value="USA">USA</option>-->
<!--					<option value="Saudi Arabia" selected="selected">Saudi Arabia</option>-->
<!--				</select>-->
<!--			</li>-->
<!--			<li class="inform_item">-->
<!--				<p class="inform-title">Mobile number</p>-->
<!--				<input type="text" placeholder="Enter your phone number" class="inform-input"/>-->
<!--			</li>-->
<!--			<li class="inform_item">-->
<!--				<p class="inform-title">Email</p>-->
<!--				<input type="text" placeholder="Enter your email address" class="inform-input"/>-->
<!--			</li>-->
<!--			<li class="inform_item inform_item-btn"><a href="#" class="inform-log_link">CONTINUE</a></li>-->
<!--		</ul>-->
		<form name="loginform" id="loginform" method="post" class="userform" action=""> <!-- обычная форма, по сути нам важен только класс -->
			<input type="text" name="log" id="user_login" placeholder="Логин или email"> <!-- сюда будут писать логин или email -->
			<input type="password" name="pwd" id="user_pass" placeholder="Пароль"> <!-- ну пароль -->
			<input name="rememberme" type="checkbox" value="forever"> Запомнить меня <!-- запомнить ли сессию, forever - навсегда,  -->
			<input type="submit" value="Войти"> <!-- субмит -->
			<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>"> <!-- куда отправим юзера если все прошло ок -->
			<input type="hidden" name="nonce" value="<?php echo wp_create_nonce('login_me_nonce'); ?>"> <!-- поле со строкой безопасности, будем проверим её в обработчике чтобы убедиться, что форма отправлена откуда надо, аргумент login_me_nonce, конечно, лучше поменять на свой -->
			<input type="hidden" name="action" value="login_me"> <!-- обязательное поле, по нему запустится нужная функция -->
			<div class="response"></div> <!-- ну сюда будем пихать ответ от сервера -->
		</form>
	</div>
</section>

<?php get_footer(); ?>
