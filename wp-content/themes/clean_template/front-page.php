<?php get_header(); ?>

<section class="way_block-container">
	<div class="container">
		<ul class="way_list">
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>1 </span>
					<p class="way_text">Choose your destination</p></a></li>
			<li class="way_item "><a href="#" class="way_stap-link"><span>2</span>
					<p class="way_text">	Choose your package</p></a></li>
			<li class="way_item "><a href="#" class="way_stap-link"><span>3</span>
					<p class="way_text">Client information</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>4</span>
					<p class="way_text">Payment</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>5</span>
					<p class="way_text">Confirmation</p></a></li>
		</ul>
	</div>
</section>

<main id="map_main">
	<section id="map"></section>
	<div class="choose_map">
		<div class="container">
			<h1 class="choose_map-title">England / Gerany / France<span>countries</span></h1>
			<a href="#" class="choose_btn"> <span>next</span></a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDruxYYr6FOGtihXaXbkkD6rGPq8LQ2pM&callback=initMap"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/select_tours.js"></script>
