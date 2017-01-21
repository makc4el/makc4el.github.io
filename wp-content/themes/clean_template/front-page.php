<?php get_header(); ?>

<section class="way_block-container">
	<div class="container">
		<ul class="way_list">
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>1 </span>
					<p class="way_text">Choose your destination</p></a></li>
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>2</span>
					<p class="way_text">	Choose your package</p></a></li>
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>3</span>
					<p class="way_text">Client information</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>4</span>
					<p class="way_text">Payment</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>5</span>
					<p class="way_text">Confirmation</p></a></li>
		</ul>
	</div>
</section>

<section class="inform_container">
	<div class="container">
		<h1 class="booking_title">Map</h1>
		<ul class="inform_list">
			<li class="inform_item">

				<select name="city_and_tour" id="city_and_tour">
					<?php print_r(get_field('tours_and_sity', 2130)); ?>
						<option value="not">Select city</option>
					<?php foreach (get_field('tours_and_sity', 2130) as $city){ ?>
						<option value="<?= $city['city'] ?>"><?= $city['city'] ?></option>
					<?php } ?>
				</select>

			</li>
			
			
		</ul>
	</div>
</section>
<main id="main"></main>

<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/select_tours.js"></script>
