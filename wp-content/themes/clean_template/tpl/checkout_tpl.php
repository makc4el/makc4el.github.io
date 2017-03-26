<?php
/*
Template Name: Checkout
*/
?>

<?php get_header(); ?>



<?php
$id_tour = intval($_GET['id']);
if(!$id_tour){
	return;
}
$fields = get_fields($id_tour);
$fields = $fields['content'];

?>
<script>
	var id_tour = "<?= $id_tour ?>";
	localStorage.setItem('id_tour', id_tour);
</script>
<?php if ( !is_user_logged_in() ) { ?>

	<script>
		var log_in_url = "<?= get_permalink(2054) ?>";
		var redirect = "<?= get_permalink(2205) ?>";
		window.location = log_in_url;
		localStorage.setItem('redirect', redirect);
	</script>

<?php } ?>

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
				<div class="det_event-date det_event-bl">
					<p class="event-taiting-title event-title">Start date:</p>
					<p class="event-taiting-text event-text">17.10.2016</p>
				</div>
			</div>
			<p class="booking_det-price">Total price: <span>$3200</span></p>
		</div>
	</div>
</section>

<section class="inform_container booking_section-container">
	<div class="container">
		<div class="inform_list-container">

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="accounts@dultravels-online.ch111">
				<input type="hidden" name="lc" value="USD">
				<input type="hidden" name="item_name" value="<?= get_the_title($id_tour)?>">
				<input type="hidden" name="amount" value="0">
				<input type="hidden" name="currency_code" value="USD">
				<input type="hidden" name="button_subtype" value="services">
				<input type="hidden" name="no_note" value="0">
				<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynowCC_LG.gif:NonHostedGuest">
				<input type="image" src="https://www.paypalobjects.com/ru_RU/RU/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal">
				<img alt="" border="0" src="https://www.paypalobjects.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
	</div>

</section>

<?php get_footer() ?>
