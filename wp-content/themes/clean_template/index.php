<?php get_header(); ?>

<section class="way_block-container">
	<div class="container">
		<ul class="way_list">
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>1 </span>
					<p class="way_text">Choose your destination</p></a></li>
			<li class="way_item prev_step"><a href="#" class="way_stap-link"><span>2</span>
					<p class="way_text">	Choose your package</p></a></li>
			<li class="way_item "><a href="#" class="way_stap-link"><span>3</span>
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
				<input type="text" value="" readonly="readonly" class="package_item_text" id="locations"/>
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
	<div class="container" id="tours">
		
		
		
	</div>
</section>

<?php get_footer(); ?>

<script>
	var select_location = localStorage.getItem('CityName');
		$('#locations').val(select_location);

	var data = {
		'action': 'show_tours',
		'select_locations' : select_location
	};

	$.ajax({
		url:ajaxurl, // обработчик
		data:data, // данные
		type:'POST', // тип запроса
		success:function(data){

			var container = $('#tours');
//			console.log(data);
			container.append(data);
			// var r= JSON.parse(data);

		}
	});




	

</script>