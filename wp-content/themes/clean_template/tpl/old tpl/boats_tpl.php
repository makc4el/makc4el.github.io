<?php
/*
Template Name: Boats
*/
?>
<?php get_header(); ?>

<header id="header" class="header-cnc">
	<?php
		require_once('wp-content/themes/clean_template/tpl/link_home_page.php');
	?>
	<div class="select-container dropdown">
		<div class="single-select-container dropdown">
	    <div class="select-container__caption">
	    </div>
	    <ul class="select-container__dropdown">
	      <?php
	        $languages= icl_get_languages();
	        foreach($languages as $k=>$v){
	          if ($v['active']==1) {
	            $active_tag=$v['tag'];
	            echo "<span style='display:none' id='active_tag'>".$active_tag."</span>";
	          }
	      ?>
	      <li class="select-container__item">
	        <a href="<?= $v['url'] ?>" data-active="<?=$v['tag']?>">
	          <img src="<?= $v['country_flag_url'] ?>" class="flag"/>
	          <span class="value"><?= $v['translated_name'] ?></span>
	        </a>
	      </li>
	      <?php } ?>
	    </ul>
	  </div>
  	</div>
		<?php
			require_once('wp-content/themes/clean_template/tpl/switch.php');
		?>
</header>
<main class="home">
	<div class="home-content"></div>
		<div class="full-height_video">
	      <div id="full-height_video_video-object"></div>
	    </div>

	<div class="tab-content__inner">
			<h1 class="home__title">
				<?php the_field('title') ?>
			</h1>
			<p class="home__text">
				<?php the_field('description') ?>
			</p>
			<a href="<?php the_field('link_more') ?>" class="home__link">
				<?php the_field('text_link_more') ?>
			</a>
			<div class="btn-play-stop">
		        <button class="play"></button>
		        <button class="stop"></button>
	        </div>
			<div class="service">
				<?php foreach (get_field('services') as $k=>$v){ ?>
					<a href="<?=$v['link'] ?>" style="background: url(<?=$v['image'] ?>) no-repeat center; background-size: 100%;" class="service__item service__item--design">
						<div class="service__title">
							<span class="service__number"><?=$v['number'] ?></span>
							<p class="service__caption"><?=$v['title'] ?></p>
						</div>
					</a>
				<?php } ?>
			</div>


		</div>
</main>
<script >
var path = "<?php echo the_field('video') ?>";
</script>
<?php get_footer(); ?>

<script src="<?php echo get_template_directory_uri(); ?>/js/custom_svitcher.js"></script>
