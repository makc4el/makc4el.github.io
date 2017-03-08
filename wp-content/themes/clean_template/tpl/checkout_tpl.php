<?php
/*
Template Name: Checkout
*/
?>

<?php get_header(); ?>
<?php
require  "PayPal/autoload.php";
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\FundingInstrument;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentCard;
use PayPal\Api\Transaction;

if(isset($_POST['number_card'])){
	print_r($_POST);

	$card = new PaymentCard();
	$card->setType("visa")
		->setNumber("4669424246660779")
		->setExpireMonth("11")
		->setExpireYear("2019")
		->setCvv2("012")
		->setFirstName("Joe")
		->setBillingCountry("US")
		->setLastName("Shopper");

	$fi = new FundingInstrument();
	$fi->setPaymentCard($card);

	$payer = new Payer();
	$payer->setPaymentMethod("credit_card")
		->setFundingInstruments(array($fi));

	$item1 = new Item();
	$item1->setName('Ground Coffee 40 oz')
		->setDescription('Ground Coffee 40 oz')
		->setCurrency('USD')
		->setQuantity(1)
		->setTax(0.3)
		->setPrice(7.50);
	/*$item2 = new Item();
	$item2->setName('Granola bars')
		->setDescription('Granola Bars with Peanuts')
		->setCurrency('USD')
		->setQuantity(5)
		->setTax(0.2)
		->setPrice(2);*/

	$itemList = new ItemList();
	$itemList->setItems(array($item1));

/*	$details = new Details();
	$details->setShipping(1.2)
		->setTax(1.3)
		->setSubtotal(17.5);*/

	$amount = new Amount();
	$amount->setCurrency("USD")
		->setTotal(20);

	$transaction = new Transaction();
	$transaction->setAmount($amount)
		->setItemList($itemList)
		->setDescription("Payment description")
		->setInvoiceNumber(uniqid());

	$payment = new Payment();
	$payment->setIntent("sale")
		->setPayer($payer)
		->setTransactions(array($transaction));

	$request = clone $payment;


try {
	$payment->create($apiContext);
} catch (Exception $ex) {

	ResultPrinter::printError('Create Payment Using Credit Card. If 500 Exception', 'Payment', null, $request, $ex);
	exit(1);
}

//	ResultPrinter::printResult('Create Payment Using Credit Card', 'Payment', $payment->getId(), $request, $payment);

	return $payment;





}

$card = new PaymentCard();

$id_tour = intval($_GET['id']);
if(!$id_tour){
	return;
}
?>
<script>
	var id_tour = "<?php $id_tour ?>";
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
<section class="pay_var">
	<div class="container">
		<h1 class="pay_var-title">How would you like to pay?</h1>
		<ul class="pay_var-list">
			<li class="pay_var-item pay_var-item-now">
				<div class="pay_var-block">
					<input id="pay_now" type="checkbox"/>
					<label for="pay_now" class="pay_var-label"></label>
					<p class="pay_var-text">Pay now</p>
				</div>
			</li>
			<li class="pay_var-item pay_var-item-letter">
				<div class="pay_var-block">
					<input id="pay_letter" type="checkbox"/>
					<label for="pay_letter" class="pay_var-label"></label>
					<p class="pay_var-text">Pay later</p>
					<p class="pay_var_text-date">Pay later on January 11, 2017</p>
					<p class="pay_var_text-date pay_var_text-date_min">Your card must be valid until 01/2017 </p>
				</div>
			</li>
		</ul>
	</div>
</section>
<section class="inform_container booking_section-container">
	<div class="container">
		<h1 class="booking_title booking_container-title">All card information is fully encrypted, secure and protected</h1>
		<div class="inform_list-container">
			<p class="inform_block-title">We accept the folowing payment methods</p>
			<form name="paypal" method="post">
			<ul class="inform_list">
				<li class="inform_item inform_item-select">
					<p class="inform-title">Select payment method</p>
					<select value="Please, select one" name="payment_method" class="inform-input_select-country">
						<option value="UK">UK</option>
						<option value="USA">USA</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
					</select>
				</li>
				<li class="inform_item cred_pass">
					<p class="inform-title">Credit/debid card #</p>
					<input type="text" placeholder="Enter your number card" name="number_card" class="inform-input"/>
				</li>
				<li class="inform_item inform_item-btn">
					<p class="inform-title">Card holder name</p>
					<input type="text" placeholder="Enter the name holder" name="holder_name" class="inform-input"/>
				</li>
				<li class="inform_item data_inp inform_item-select">
					<p class="inform-title">Explire date</p>
					<select value="Select month" name="explire_date" class="inform-input_select-country">
						<option value="UK">UK</option>
						<option value="USA">USA</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
					</select>
				</li>
				<li class="inform_item year_inp">
					<p class="inform-title">|</p>
					<input type="text" placeholder="Enter year" name="year_card" class="inform-input"/>
				</li>
				<li class="inform_item cred_pass secur_inp">
					<p class="inform-title">Card security code</p>
					<input type="text" placeholder="Enter the security code" name="security_code" class="inform-input"/>
				</li>
				<li class="inform_item inform_item-btn">
<!--					<a href="#" class="inform-log_link">BOOK AND PAY NOW</a>-->
					<input class="inform-log_link" type="submit" value="BOOK AND PAY NOW">
				</li>
			</ul>
			</form>
		</div>
	</div>

</section>

<?php get_footer() ?>
