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

    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post" name="registration">
		<ul id="main_ul" class="inform_list">
			<li class="inform_item">
				<p class="inform-title">
					<?=get_field("text_first_name")?>
				</p>
				<input
					readonly
					onfocus="this.removeAttribute('readonly')"
					type="text" 
					placeholder="<?=get_field("placeholder_first_name")?>"
					class="inform-input" 
					name="fname" 
				>
				<p id="error_firstname"></p>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">
				<?=get_field("text_last_name")?>
				</p>
				<input
					readonly
					onfocus="this.removeAttribute('readonly')"
					type="text" 
					placeholder="<?=get_field("placeholder_last_name")?>"
					class="inform-input" 
					name="lname" 
				>
				<p id="error_lastname"></p>
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
					readonly
					onfocus="this.removeAttribute('readonly')"
					type="text" 
					placeholder="<?=get_field("placeholder_mobile_number")?>"
					class="inform-input" 
					name="phone" 
				>
				<p id="error_mobilenumber"></p>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">
				<?=get_field("text_email")?>
				</p>
				<input
					readonly
					onfocus="this.removeAttribute('readonly')"
					type="text" 
					placeholder="<?=get_field("placeholder_email")?>"
					class="inform-input" 
					name="email"
				>
				<p id="error_email"></p>
			</li>
			
			<li class="inform_item">
				<p class="inform-title">Password</p>
				<input
					readonly
					onfocus="this.removeAttribute('readonly')"
					type="password" 
					placeholder="Password" 
					class="inform-input" 
					name="password" 
				>
				<p id="error_password"></p>
			</li>
			<li id="submit_registration" class="inform_item inform_item-btn">
				<a href="#" class="inform-log_link">CONTINUE</a>
			</li>

		</ul>
	</form>
		
	</div>
</section>
<script>
	var redirect = localStorage.getItem('redirect');
	if(redirect!==null){
		window.location = redirect;
	}
</script>
<?php get_footer(); ?>
