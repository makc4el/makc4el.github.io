<?php
/*
PostType Page Template: Tour
Description: One tour
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
				<h1 class="package-title">
					<?=get_field('title')?>
				</h1>
				<p class="package-date">
					<?=get_field('date')?>
				</p>
				<p class="package-text">
					<?=get_field('long_description')?>
				</p>
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
				<li class="package_item package_item-btn">
					<a href="" id="start_planing" class="inform-log_link package-log_link">START PLANNING</a>
				</li>
				<li class="package_item package_item-btn-share">
					<a id="share_package" href="#" class="package-log_link">SHARE THIS PACKAGE</a>
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
	<section class="package_block">
		<div class="container">
			<ul class="package_block-list">
				<li class="package_block-item">
					<div class="package_block-item_content">
						<div class="package_block-item-info">
							<p class="package_block-item-info-title">
								<?=get_field('text')?>
							</p>
							<p class="package_block-item-info-text">
								<?=get_field('short_description')?>
							</p>
							<p class="package_block-item-info-top-title">
								<?=get_field('title_top_highlights')?>
							</p>
							<ul class="package_block-item-info_list">
								<?php
									$arr = [
										0=> 'item-info-museum',
										1=> 'item-info-smile',
										2=> 'item-info-animal',
										3=> 'item-info-city'
									]
								?>
								<?php foreach (get_field('top_highlights') as $k=>$v){ ?>
									<li class="package_block-item-info_item <?=$arr[$k]?>">
										<span class="package_block-item-info-item-text"><?=$v['item']?></span>
									</li>
								<?php } ?>
							</ul>
							<a href="#" class="view-link">
								<?=get_field('title_view_details_about')?>
							</a>

						</div>
						<div class="package_block-item-imgs">
							<?php foreach (get_field('images') as $k=>$v){ ?>
								<div class="package_block-item-img" style="background: url(<?=$v['image']?>) no-repeat center;background-size: cover;"></div>
							<?php } ?>

						</div>
					</div>
				</li>
			</ul>
		</div>
	</section>
</main>

<script>
	var url_share= "<?=get_permalink()?>";
	var id_package = <?=get_the_ID()?>;
	var url_redirect_start_planing ="<?=get_permalink(2169)?>";
</script>
<?php get_footer(); ?>
