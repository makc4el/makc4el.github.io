<?php
/*
Template Name: Transfer summ
*/
?>
<?php get_header(); ?>

<?php
$id= $_SESSION['id_package'];
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
				<?= get_field("title", $id) ?>
			</h1>
			<p class="transfer_date">
				<?= get_field("date", $id) ?>
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

				</li>
			</ul>
		</div>
	</section>
	<section class="transfer-summ_text-section">
		<div class="container">
			<div class="transfer-summ_content">
				<div class="transfer-summ_container">
					<div class="transfer-summ_title-container">
						<h1 class="transfer-summ_title">
							<?= get_field("title", $id) ?>
						</h1>
						<p class="transfer-summ_text">
							<?= get_field("description_iterary_on_transfer_summ_page", $id) ?>
						</p>
						<p class="transfer-summ_title">Overall Costs</p>
						<p class="transfer-summ_cost">Price per Person<span>USD <?=get_field('price', $id)?></span></p>
						<p class="transfer-summ_cost transfer-summ_cost-total">TOTAL PRICE<span>USD 5,072</span></p>
					</div>
					<div class="transfer-summ_image-container">
						<div src="images/transfer-icon/bound.jpg" class="transfer-summ-images"></div>
					</div>
				</div>
				<div class="transfer-summ_include-container">
					<ul class="transfer-summ_include">
						<li class="transfer-summ_item transfer-summ_item-title">Included</li>
						<?php foreach (get_field("included", $id) as $k=>$v){ ?>
							<li class="transfer-summ_item">
								<?=$v['item']?>
							</li>
						<?php } ?>
					</ul>
					<ul class="transfer-summ_include">
						<li class="transfer-summ_item transfer-summ_item-title">Excluded</li>
						<?php foreach (get_field("excluded", $id) as $k=>$v){ ?>
							<li class="transfer-summ_item transfer-summ_item-none">
								<?=$v['item']?>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="transfer-itinerary">
					<div class="transfer-itinerary_title">ITINERARY</div>
					<?php
					$fields = get_fields($id);
					foreach ($fields['itinerarys2'] as $key => $item) :
					?>
					<?php if($item['acf_fc_layout'] == 'one_day') : ?>
					<ul class="transfer-itinerary_list">
						<li class="transfer-itinerary_item transfer-itinerary-t">
							<p class="transfer-itinerary_item_title">
								<?=$item['from_date']?>
							</p>
							<p class="transfer-itinerary_item_time">
								<span><?=$item['from_date']?></span>
								<span><?=$item['to_date']?></span>
							</p>
						</li>
						<li class="transfer-itinerary_item transfer-itinerary-tx">
							<p class="transfer-itinerary_item-text">
								<?=$item['city']?>
							</p>
							<div class="transfer-iti-row">
								<div class="transfer-iti-col-title"><?=$item['transfer_type']?></div>
								<div class="transfer-iti-col-text"><?=$item['from']?></div>
							</div>
<!--							<div class="transfer-iti-row">-->
<!--								<div class="transfer-iti-col-title">Road Transfer (Private)</div>-->
<!--								<div class="transfer-iti-col-text">Novotel Xinqiao London Double Room Double Bed Incl.: Breakfast</div>-->
<!--							</div>-->
						</li>
					</ul>
					<?php endif; ?>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</section>
	<section class="what-next_section">
		<div class="container">
			<div class="what-next">
				<div class="what-next_text">
					<h1 class="what-next-title">What’s next?</h1>
					<p class="what-next-text">- Go to the travel planner <span>to select activities, pick hotels and change durations.</span></p>
					<p class="what-next-text">- Go to the summary <span>to send yourself a link to the itinerary or to print it.</span></p>
				</div><a href="#" id="sheckout" class="what-next_text-btn">CHECKOUT</a>
			</div>
		</div>
	</section>
</main>

<?php get_footer() ?>
<script>
	$(function() {
		var share_url_inner= localStorage.getItem("url_share");
		console.log(share_url_inner);

		$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='+share_url_inner+'" class="package-log_link"> FACEBOOK </a>');
		$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://twitter.com/home?status='+share_url_inner+'" class="package-log_link"> TWITTER</a>');
		$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://plus.google.com/share?url='+share_url_inner+'" class="package-log_link"> Google Plus </a>');
		$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url='+share_url_inner+'" class="package-log_link"> LinkedIn </a>');
		$("#share_package2").parent().append('<a style="display: none" target="_blank" href="https://pinterest.com/pin/create/button/?url=URL_SHARE&media='+share_url_inner+'" class="package-log_link"> Pinterest </a>');


		$("#share_package2").click(function (e) {
			e.preventDefault();
			var share_links = $("#share_package2").siblings();
			share_links.each(function () {
				$( this ).toggle();
			});

		});

		var location= localStorage.getItem("locations");
		$('#location').val(location)

	});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/start_planing.js"></script>