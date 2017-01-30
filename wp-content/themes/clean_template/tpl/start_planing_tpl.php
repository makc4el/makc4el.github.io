<?php
/*
Template Name: Start planing
*/
?>
<?php get_header(); ?>

<?php
	$id= $_SESSION['id_package']?>;
?>

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
<main id="transfer">
	<section class="transfer_title_container">
		<div class="container">
			<h1 class="transfer_title">
				<?=get_field('title', $id)?>
			</h1>
			<p class="transfer_date">
				<?=get_field('date', $id)?>
			</p>
		</div>
	</section>
	<section class="package_chose transfer_chose">
		<div class="container">
			<ul class="package_list transfer_chose-list">
				<li class="package_item package_item-countries">
					<p class="package_item-title">Countries</p>
					<input type="text" value="England - Germany - France" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-counter">
					<p class="package_item-title">Guests</p>
					<input type="text" value="1" id="spinner1" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-date">
					<p class="package_item-title">Start date</p>
					<input type="text" placeholder="date" id="datepicker" class="package_item_text"/>
					<label for="datepicker" class="package_item_text-label"></label>
				</li>
				<li class="package_item package_item-money">
					<p class="package_item-title">Budget</p>
					<input type="text" value="$3200" readonly="readonly" class="package_item_text"/>
				</li>
			</ul>
			<ul class="package_list transfer_chose-list">
				<li class="transform_chose-item transform_nav transform_nav-active"><a class="transform_chose-link">PLANNER</a></li>
				<li class="transform_chose-item transform_nav"><a class="transform_chose-link">MAP</a></li>
				<li class="transform_chose-item transform_nav"><a class="transform_chose-link">SUMMARY</a></li>
				<li class="transform_chose-item transform_chose-item-request"><a class="transform_chose-link">Special request</a></li>
				<li class="package_item package_item-btn transform_chose-item"><a href="#" class="inform-log_link package-log_link">BOOK ORDER</a></li>
				<li class="package_item package_item-btn-share">
					<a id="share_package2" href="#" class="package-log_link">SHARE THIS PACKAGE</a>
					<a style="display: none" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink()?>" class="package-log_link">
						SHARE THIS PACKAGE FACEBOOK
					</a>
					<a style="display: none" target="_blank" href="https://twitter.com/home?status=<?php echo get_permalink()?>" class="package-log_link">
						SHARE THIS PACKAGE TWITTER
					</a>
					<a style="display: none" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink()?>" class="package-log_link">
						SHARE THIS PACKAGE Google Plus
					</a>
					<a style="display: none" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink()?>" class="package-log_link">
						SHARE THIS PACKAGE LinkedIn
					</a>
					<a style="display: none" target="_blank" href="https://pinterest.com/pin/create/button/?url=URL_SHARE&media=<?php echo get_permalink()?>" class="package-log_link">
						SHARE THIS PACKAGE Pinterest
					</a>
				</li>
			</ul>
		</div>
	</section>
	<section class="transfer_way">
		<div class="container">
			<ul class="transfer-way_list">
				<li class="transfer-wat_item">
					<div class="transfer-logo"></div>
				</li>
				<li class="transfer-wat_item transfer-way_item-type">
					<p class="transfer-way_title">TRANSFER TYPE</p>
					<p class="transfer-way_text">Transfer</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-from">
					<p class="transfer-way_title">FROM</p>
					<p class="transfer-way_text">Beijing Capital Airport</p>
					<p class="transfer-wat_date">21 Dec, 12:00 PM</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-to">
					<p class="transfer-way_title">TO</p>
					<p class="transfer-way_text">Beijing New Future Hotel</p>
					<p class="transfer-wat_date">22 Dec, 13:00 AM</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-btn"><a href="#" class="transfer-way_btn">DETAILS & ADJUST</a></li>
			</ul>
			<ul class="transfer-way_list">
				<li class="transfer-wat_item">
					<div class="transfer-logo"></div>
				</li>
				<li class="transfer-wat_item transfer-way_item-type">
					<p class="transfer-way_title">CITY</p>
					<p class="transfer-way_text">London</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-from">
					<p class="transfer-way_title">HOTEL</p>
					<p class="transfer-way_text">London hotel 3*</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-to">
					<p class="transfer-way_title">ROOM</p>
					<p class="transfer-way_text">Standart double room</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-btn">
					<p class="transfer-way-path">4 nights (Feb 01 - Feb 05)</p>
					<div id="slider"></div>
				</li>
			</ul>
		</div>
	</section>
	<section class="transfer_seats">
		<div class="container">
			<p class="transfer_seats-title">Dec 01, Wed</p>
			<ul class="transfer_seats-list">
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Spain Cathedra</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
			</ul>
			<p class="transfer_seats-title">Dec 01, Wed</p>
			<ul class="transfer_seats-list">
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Spain Cathedra</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
			</ul>
			<p class="transfer_seats-title">Dec 01, Wed</p>
			<ul class="transfer_seats-list">
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Spain Cathedra</p>
						</div>
					</div>
				</li>
				<li class="transfer_seats-item">
					<div class="transfer_seats-container">
						<div class="transfer_seats-image"></div>
						<div class="transfer_seats-content">
							<p class="transfer_seats_time">08:30 - 15:30</p>
							<p class="transfer_seats_object">Beijing Kung Fu Show</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
</main>

<?php get_footer() ?>
<script>
//	share_package2
// show SHARE LINK2

$(function() {

	var share_url_inner= localStorage.getItem("url_share");
	console.log(share_url_inner);
	$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+share_url_inner+'" class="package-log_link">'+
		+'SHARE THIS PACKAGE FACEBOOK </a>'+
		+'<a style="display: none" target="_blank" href="https://twitter.com/home?status='+share_url_inner+'" class="package-log_link">'+
		+'SHARE THIS PACKAGE TWITTER </a>'+
		+'<a style="display: none" target="_blank" href="https://plus.google.com/share?url='+share_url_inner+'" class="package-log_link">'+
		+'SHARE THIS PACKAGE Google Plus </a>'+
		+'<a style="display: none" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='+share_url_inner+'" class="package-log_link">'+
		+'SHARE THIS PACKAGE LinkedIn </a>'+
		+'<a style="display: none" target="_blank" href="https://pinterest.com/pin/create/button/?url=URL_SHARE&media='+share_url_inner+'" class="package-log_link">'+
		+'SHARE THIS PACKAGE Pinterest </a>');

	$("#share_package2").click(function (e) {
		e.preventDefault();
		var share_links = $("#share_package2").siblings();
		share_links.each(function () {
			$( this ).toggle();
		});

	});
});


</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/start_planing.js"></script>