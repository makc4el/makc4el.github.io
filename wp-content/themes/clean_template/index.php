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
<section class="tour_chose package_chose">
	<div class="container">
		<ul class="package_list">
			<li class="package_item package_item-countries">
				<p class="package_item-title">Countries</p>
				<input type="text" value="England - Germany - France" readonly="readonly" class="package_item_text"/>
			</li>
			<li class="package_item package_item-money">
				<p class="package_item-title">Duration</p>
				<input type="text" value="0" readonly="readonly" class="package_item_text"/>
			</li>
			<li class="package_item package_item-counter">
				<p class="package_item-title">Guests</p>
				<input type="text" value="0" id="spinner1" readonly="readonly" class="package_item_text"/>
			</li>
			<li class="package_item package_item-counter">
				<p class="package_item-title">Raiting</p>
				<input type="text" value="1*" id="spinner2" readonly="readonly" class="package_item_text"/>
			</li>
			<li class="package_item package_item-money package_item-money-last">
				<p class="package_item-title">Budget</p>
				<input type="text" value="$3200" readonly="readonly" class="package_item_text"/>
			</li>
		</ul>
	</div>
</section>
<section class="tour-carts_section">
	<div class="container">



		<?php $c=0; if ( have_posts() ) {  while ( have_posts() ) { the_post(); ?>
			<?php $id = $post->ID; ?>
		<div class="cart_container">
			<div class="cart_img-container">
				<div class="cart-cost_conatiner">
					<p class="cart-cost">
						<?=get_field('price', $id)?>
					</p>
					<p class="cart-days">
						<?=get_field('count_days', $id)?>
					</p>
				</div>
				<div class="cart-img-list">
					<?php foreach (get_field('images') as $k=>$v){ ?>
						<div class="owl-item"></div>
						<div class="owl-item" style="background: url(<?=$v['image']?>) no-repeat center;background-size: cover;"></div>
					<?php } ?>

				</div>
			</div>
			<div class="cart_content-container">
				<p class="cart-title">
					<?=get_field('title', $id)?>
				</p>
				<p class="cart-star-text">
					<?=get_field('description_after_title_preview', $id)?>
				</p>
				<div class="cart-star-container">
					<?php $count_gold=get_field('rating_preview', $id); for($i=0; $i<5; $i++){ ?>
						<span class="star-icon <?php if($i<$count_gold){ echo "star-gold";} ?>"></span>
					<?php } ?>
				</div>
				<p class="cart-top cart-min-title">
					<?=get_field('title_top_places_preview', $id)?>
				</p>
				<p class="cart-path">
					<?=get_field('description_top_places_preview', $id)?>
				</p>
				<p class="cart-highloghts cart-min-title">
					<?=get_field('title_top_highlightspreview', $id)?>
				</p>
				<p class="cart-path">
					<?=get_field('description_top_highlightspreview', $id)?>
				</p>
				<a href="<?= get_permalink($id) ?>" class="cart-btn">view details</a>
			</div>
		</div>
		<?php }}; ?>



<!--		<div class="cart_container">-->
<!--			<div class="cart_img-container">-->
<!--				<div class="cart-cost_conatiner">-->
<!--					<p class="cart-cost">780$</p>-->
<!--					<p class="cart-days">14 DAYS</p>-->
<!--				</div>-->
<!--				<div class="cart-img-list">-->
<!--					<div class="owl-item"></div>-->
<!--					<div class="owl-item"></div>-->
<!--				</div>-->
<!--			</div>-->
<!--			<div class="cart_content-container">-->
<!--				<p class="cart-title">Wonder of England queen</p>-->
<!--				<p class="cart-star-text">Historic and architecture</p>-->
<!--				<div class="cart-star-container"><span class="star-icon star-gold"></span><span class="star-icon star-gold"></span><span class="star-icon star-gold"></span><span class="star-icon star-gold"></span><span class="star-icon"></span></div>-->
<!--				<p class="cart-top cart-min-title">TOP PLACES</p>-->
<!--				<p class="cart-path">London - Manchester - Birmingen - Lester - Westminster</p>-->
<!--				<p class="cart-highloghts cart-min-title">TOP HIGHLIGHTS</p>-->
<!--				<p class="cart-path">Eiffel Tower - Notre Dame - London Eye - Buckingham Palace</p><a href="#" class="cart-btn">view details</a>-->
<!--			</div>-->
<!--		</div>-->




	</div>
</section>
<?php get_footer(); ?>
