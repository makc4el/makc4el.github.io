<?php
/*
Template Name: Package
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
<main id="package">
	<section class="package_about">
		<div class="container">
			<div class="package_about-text_container">
				<h1 class="package-title">Wonder of England queen</h1>
				<p class="package-date">Mar 01 - Mar 13 2017</p>
				<p class="package-text">If you have never visited China, but have a desire to gain an understanding of this diverse and complex nation, this itinerary offers an excellent introduction. With large-scale modern cities to leisurely paced villages, China provides first-time visitors with a plethora of conflicting impressions. In this itinerary, you will have the opportunity to see and experience a wide variety of China's highlights including historic Beijing, ancient Xi'an, the Pandas of Chengdu, the epic landscapes of Yangshuo and the juxtapositions of Shanghai.	</p>
			</div>
			<div class="package_about-map_container">
				<div class="package-map"></div>
			</div>
		</div>
	</section>
	<section class="package_chose">
		<div class="container">
			<ul class="package_list">
				<li class="package_item package_item-countries">
					<p class="package_item-title">Countries</p>
					<input type="text" value="England - Germany - France" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-counter">
					<p class="package_item-title">Guests</p>
					<input type="text" value="1" id="spinner1" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-counter">
					<p class="package_item-title">Raiting</p>
					<input type="text" value="4" id="spinner2" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-date">
					<p class="package_item-title">Start date</p>
					<input type="text" placeholder="date" id="datepicker" class="package_item_text"/>
					<label for="datepicker" class="package_item_text-label"></label>
				</li>
				<li class="package_item package_item-money">
					<input type="text" value="$3200" readonly="readonly" class="package_item_text"/>
				</li>
				<li class="package_item package_item-btn"><a href="<?= get_permalink(2086) ?>" class="inform-log_link package-log_link">START PLANNING</a></li>
				<li class="package_item package_item-btn-share"><a href="#" class="package-log_link">SHARE THIS PACKAGE</a></li>
			</ul>
		</div>
	</section>
	<section class="package_block">
		<div class="container">
			<ul class="package_block-list">
				<li class="package_block-item">
					<div class="package_block-item_content">
						<div class="package_block-item-info">
							<p class="package_block-item-info-title">Day 1-3 - London </p>
							<p class="package_block-item-info-text">London is the capital and most populous city of England and the United Kingdom. Standing on the River Thames in the south east of the island of Great Britain, London has been a major settlement for two millennia. It was founded.</p>
							<p class="package_block-item-info-top-title">TOP HIGHLIGHTS</p>
							<ul class="package_block-item-info_list">
								<li class="package_block-item-info_item item-info-museum"><span class="package_block-item-info-item-text">Grand Buddha of Leshan</span></li>
								<li class="package_block-item-info_item item-info-smile"><span class="package_block-item-info-item-text">The French Concession</span></li>
								<li class="package_block-item-info_item item-info-animal"><span class="package_block-item-info-item-text">The Summer Palace</span></li>
								<li class="package_block-item-info_item item-info-city"><span class="package_block-item-info-item-text">Big city zoo</span></li>
							</ul><a href="#" class="view-link">VIEW DETAILS ABOUT LONDON</a>
						</div>
						<div class="package_block-item-imgs">
							<div class="package_block-item-img"></div>
							<div class="package_block-item-img"></div>
							<div class="package_block-item-img"></div>
							<div class="package_block-item-img"></div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
	</main>
<?php get_footer(); ?>
