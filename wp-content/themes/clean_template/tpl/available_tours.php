<?php
/*
Template Name: Available tours
*/
?>
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
<section class="booking_det">
	<div class="container">
		<h1 class="booking_title">Booking details</h1>
		<div class="booking_container">
			<p class="booking_det-title">Wonder of England queen</p>
			<p class="booking_det-range">Mar 01 - Mar 13 2017</p>
			<div class="booking_det_event">
				<div class="det_event-city det_event-bl">
					<p class="event-city-title event-title">Cities:</p>
					<p class="event-city-text event-text">London - Paris - Leon - Muchen - Berlin</p>
				</div>
				<div class="det_event-guest det_event-bl">
					<p class="event-guest-title event-title">Guests:</p>
					<p class="event-guest-text event-text">1</p>
				</div>
				<div class="det_event-taiting det_event-bl">
					<p class="event-taiting-title event-title">Raiting:</p>
					<p class="event-taiting-text event-text">4*</p>
				</div>
				<div class="det_event-date det_event-bl">
					<p class="event-taiting-title event-title">Start date:</p>
					<p class="event-taiting-text event-text">17.10.2016</p>
				</div>
			</div>
			<p class="booking_det-price">Total price: <span>$3200</span></p>
		</div>
	</div>
</section>
<section class="inform_container">
	<div class="container">
		<h1 class="booking_title">Your information</h1><a href="#" class="sing_new">Sign up new account</a>
		<ul class="inform_list">
			<li class="inform_item">
				<p class="inform-title">Email</p>
				<input type="text" placeholder="Enter your email address" class="inform-input"/>
			</li>
			<li class="inform_item">
				<p class="inform-title">Password</p>
				<input type="text" placeholder="Enter your password" class="inform-input"/>
			</li>
			<li class="inform_item inform_item-btn"><a href="#" class="inform-log_link">LOGIN</a></li>
		</ul>
	</div>
</section>
<main id="main"></main>

<?php get_footer(); ?>
