<?php
/*
Template Name: Transfer summ
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
foreach ($fields as $key => $item) {
if($item['acf_fc_layout'] == 'tab_summary'){


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
				<?=$item['title']?>
			</h1>
			<p class="transfer_date">
				<?=$item['date']?>
			</p>
		</div>
	</section>
	<section class="package_chose transfer_chose">
		<div class="container">
			<ul class="package_list transfer_chose-list">
				<li class="package_item package_item-countries">
					<p class="package_item-title">Countries</p>
					<input type="text" id="countries" readonly="readonly" class="package_item_text"/>
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
				<li class="transform_chose-item transform_nav ">
					<a href="<?=get_permalink(2086)."?id=".$id_tour?>" class="transform_chose-link">PLANNER</a>
				</li>
				<li class="transform_chose-item transform_nav">
					<a class="transform_chose-link">MAP</a>
				</li>
				<li class="transform_chose-item transform_nav transform_nav-active">
					<a href="<?=get_permalink(2199)."?id=".$id_tour?>" class="transform_chose-link">SUMMARY</a>
				</li>
				<li class="transform_chose-item transform_chose-item-request">
					<a class="transform_chose-link">Special request</a>
				</li>
				<li class="package_item package_item-btn transform_chose-item">
					<a href="<?=get_permalink(2088)?>" class="inform-log_link package-log_link">BOOK ORDER</a>
				</li>
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
							<?=$item['title']?>
						</h1>
						<p class="transfer-summ_text">
							<?=$item['description_after_title']?>
						</p>
						<p class="transfer-summ_title">
							<?=$item['title_overal_costs']?>
						</p>
						<p class="transfer-summ_cost">
							<?=$item['title_price_per_person']?>
							<span>USD <?=$item['price_per_person']?></span>
						</p>
						<p class="transfer-summ_cost transfer-summ_cost-total">
							TOTAL PRICE
							<span>USD <?=$item['total_price']?></span>
						</p>
					</div>
					<div class="transfer-summ_image-container">
						<div src="<?=$item['image']?>" class="transfer-summ-images"></div>
					</div>
				</div>
				<div class="transfer-summ_include-container">
					<ul class="transfer-summ_include">
						<li class="transfer-summ_item transfer-summ_item-title">Included</li>
						<?php foreach ($item["included"] as $k=>$v){ ?>
							<li class="transfer-summ_item">
								<?=$v['item']?>
							</li>
						<?php } ?>
					</ul>
					<ul class="transfer-summ_include">
						<li class="transfer-summ_item transfer-summ_item-title">Excluded</li>
						<?php foreach ($item["excluded"] as $k=>$v){ ?>
							<li class="transfer-summ_item transfer-summ_item-none">
								<?=$v['item']?>
							</li>
						<?php } ?>
					</ul>
				</div>
				<div class="transfer-itinerary">
					<div class="transfer-itinerary_title">
						<?=$item['title_itineraries']?>
					</div>
					<?php
					foreach ($item['itineraries'] as $k => $v) {
					?>
						<ul class="transfer-itinerary_list">
							<li class="transfer-itinerary_item transfer-itinerary-t">
								<p class="transfer-itinerary_item_title">
									<?=$v['date']?>
								</p>
								<p class="transfer-itinerary_item_time">
									<span><?=$v['hours_start']?></span><span><?=$v['hours_end']?></span>
								</p>
							</li>
							<li class="transfer-itinerary_item transfer-itinerary-tx">
								<p class="transfer-itinerary_item-text">
									<?=$v['title_arriving']?>
								</p>
							<?php foreach ($v['arriving'] as $kk=>$vv){ ?>
								<div class="transfer-iti-row">
									<div class="transfer-iti-col-title"><?=$vv['title']?></div>
									<div class="transfer-iti-col-text"><?=$vv['description']?></div>
								</div>
								<?php } ?>
							</li>
						</ul>
					<?php } ?>

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
				</div><a href="<?=get_permalink(2052)?>" id="sheckout" class="what-next_text-btn">CHECKOUT</a>
			</div>
		</div>
	</section>
</main>
<?php }} ?>
<?php get_footer() ?>
<script>
	$(function() {
		var share_url_inner= window.location.href;
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
		var select_location = localStorage.getItem('CityName');
		$('#countries').val(select_location);


	});
</script>
