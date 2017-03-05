<?php
/*
Template Name: Start planing
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
			<li class="way_item"><a href="#" class="way_stap-link"><span>3</span>
					<p class="way_text">Client information</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>4</span>
					<p class="way_text">Payment</p></a></li>
			<li class="way_item"><a href="#" class="way_stap-link"><span>5</span>
					<p class="way_text">Confirmation</p></a></li>
		</ul>
	</div>
</section>
<main id="transfer">
<main id="transfer">
	<main id="package">
		<section class="package_about">
			<div class="container">
				<div class="package_about-text_container">
					<h1 class="package-title" id="title_tour"></h1>
<!--					<p class="package-date">Mar 01 - Mar 13 2017</p>-->
					<p class="package-text" id="description1">
					</p>
				</div>
				<div class="package_about-map_container">
					<div class="package-map"></div>
				</div>
			</div>
		</section>
		<section class="package_chose">
			<div class="container">
				<ul class="package_list transfer_chose-list">
					<li class="transform_chose-item transform_nav transform_nav-active"><a class="transform_chose-link">PLANNER</a></li>
					<li class="transform_chose-item transform_nav"><a class="transform_chose-link">MAP</a></li>
					<li class="transform_chose-item transform_nav">
						<a id="summary" href="<?= get_permalink(2086)?>" class="transform_chose-link">SUMMARY</a>
					</li>
					<li class="transform_chose-item transform_chose-item-request"><a class="transform_chose-link">Special request</a></li>
					<li class="package_item package_item-btn transform_chose-item"><a href="#" class="inform-log_link package-log_link">BOOK ORDER</a></li>
<!--					<li class="package_item package_item-btn-share">-->
<!--						<a id="share_package2" href="#" class="package-log_link">SHARE THIS PACKAGE</a>-->
<!---->
<!--					</li>-->
				</ul>
			</div>
		</section>
		<section class="package_block">
			<div class="container">
				<ul class="package_block-list">
					<li class="package_block-item">
						<div class="package_block-item_content">
							<div class="package_block-item-info">
								<p class="package_block-item-info-title" id="title_before_description_2">

								</p>
								<p class="package_block-item-info-text" id="description2"></p>
								<p class="package_block-item-info-top-title" id="title_top_highlights"></p>
								<ul class="package_block-item-info_list" id="top_highlights">
								</ul>
								<a href="#" class="view-link">VIEW DETAILS ABOUT LONDON</a>
							</div>
							<div class="package_block-item-imgs" id="images_tour">

							</div>
						</div>
					</li>
				</ul>
			</div>
		</section>
	</main>
</main>

<?php get_footer() ?>
<script>
	//	share_package2
	// show SHARE LINK2
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
		var location= localStorage.getItem("CityName");
		$('#location').val(location)
	});
</script>





<script src="<?php echo get_template_directory_uri(); ?>/js/start_planing.js"></script>