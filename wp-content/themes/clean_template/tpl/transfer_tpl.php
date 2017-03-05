<?php
/*
Template Name: Transfer
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
if($item['acf_fc_layout'] == 'tab_planner'){
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
	<section id="before_html" class="package_chose transfer_chose">
		<div class="container">
			<ul class="package_list transfer_chose-list">
				<li class="package_item package_item-countries">
					<p class="package_item-title">Countries</p>
					<input type="text" id="countries" value="" readonly="readonly" class="package_item_text"/>
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
				<li class="transform_chose-item transform_nav transform_nav-active"><a href="<?=get_permalink(2086)."?id=".$id_tour?>" class="transform_chose-link">PLANNER</a></li>
				<li class="transform_chose-item transform_nav"><a class="transform_chose-link">MAP</a></li>
				<li class="transform_chose-item transform_nav"><a href="<?=get_permalink(2199)."?id=".$id_tour?>" class="transform_chose-link">SUMMARY</a></li>
				<li class="transform_chose-item transform_chose-item-request"><a class="transform_chose-link">Special request</a></li>
				<li class="package_item package_item-btn transform_chose-item"><a href="<?=get_permalink(2088)?>" class="inform-log_link package-log_link">BOOK ORDER</a></li>
				<li class="package_item package_item-btn-share transform_chose-item"><a href="#" class="package-log_link">SHARE THIS PACKAGE</a></li>
			</ul>
		</div>
	</section>
<?php foreach ($item['one_city'] as $k=>$v){ ?>
	<section class="transfer_way">
		<div class="container">
			<ul class="transfer-way_list">
				<li class="transfer-wat_item">
					<div class="transfer-logo" style="background: url(<?=$v['icon']?>) no-repeat center;background-size: 100% 100%;"></div>
				</li>
				<li class="transfer-wat_item transfer-way_item-type">
					<p class="transfer-way_title">
						<?=$v['title_transfer_type']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['transfer_type']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-from">
					<p class="transfer-way_title">
						<?=$v['title_from']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['from']?>
					</p>
					<p class="transfer-wat_date">
						<?=$v['date_from']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-to">
					<p class="transfer-way_title">
						<?=$v['title_to']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['to']?>
					</p>
					<p class="transfer-wat_date">
						<?=$v['date_to']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-btn">
					<a href="#" class="transfer-way_btn">
						<?=$v['title_details_adjust']?>
					</a>
				</li>
			</ul>
			<ul class="transfer-way_list">
				<li class="transfer-wat_item">
					<div class="transfer-logo" style="background: url(<?=$v['icon2']?>) no-repeat center;background-size: 100% 100%;"></div>
				</li>
				<li class="transfer-wat_item transfer-way_item-type">
					<p class="transfer-way_title">
						<?=$v['title_city']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['city']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-from">
					<p class="transfer-way_title">
						<?=$v['title_hotel']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['hotel']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-to">
					<p class="transfer-way_title">
						<?=$v['title_room']?>
					</p>
					<p class="transfer-way_text">
						<?=$v['room']?>
					</p>
				</li>
				<li class="transfer-wat_item transfer-way_item-btn">
					<p class="transfer-way-path">
						<?=$v['description_aftr_count_nights']?>
					</p>
					<div id="slider"></div>
				</li>
			</ul>
		</div>
	</section>
	<section class="transfer_seats">
		<div class="container">
		<?php foreach ($v['highlights_one_day'] as $kk=>$vv){ ?>
				<p class="transfer_seats-title">
					<?=$vv['date']?>
				</p>
				<ul class="transfer_seats-list">
					<?php foreach ($vv['description_highlights'] as $kkk=>$vvv){ ?>
					<li class="transfer_seats-item">
						<div class="transfer_seats-container">
							<div class="transfer_seats-image" style="background: url(<?=$vvv['images']?>) no-repeat center;
    background-size: cover;"></div>
							<div class="transfer_seats-content">
								<p class="transfer_seats_time">
									<?=$vvv['hours']?>
								</p>
								<p class="transfer_seats_object"><?=$vvv['description']?></p>
								<div class="transfer_seats_edit"></div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>

			</div>
		<?php } ?>
	</section>
	<?php } ?>
</main>
<?php }} ?>
<?php get_footer(); ?>
