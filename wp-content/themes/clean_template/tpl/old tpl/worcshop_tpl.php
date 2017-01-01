<?php
/*
Template Name: workshop
*/
?>

<?php get_header(); ?>
<header class="header-inside header-cnc">
	<?php
		require_once('wp-content/themes/clean_template/tpl/link_home_page.php');
	?>
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
	<?php
		require_once('wp-content/themes/clean_template/tpl/switch.php');
	?>
</header>
<main id="main">
	<div class="workshop">
		<div class="workshop__bg" style="background: url(<?php the_field('background_image') ?>) no-repeat center; background-size: cover;">

			<h1 class="home__title main-title home__title--inside">

				<?php the_field('big_title') ?>
			</h1>
		</div>

		<div class="main-content">

		<div id="workshop-container-wrap" class="workshop-container-wrap main-content__inner">
			<div class="workshop-container">


				<div id="contact-header" class="main-content__header">
					<h1 class="main-content__header-title">
						<?php the_field('small_title1') ?>
					</h1>
					<p class="main-content__text">
						<?php the_field('text1') ?>
					</p>
				</div>

				<ul class="workshop-gallery">
					<?php foreach (get_field('slider') as $k=>$v){ ?>
						<li class="workshop-gallery__slide">
							<?php foreach ($v['slide'] as $kk=>$vv){ ?>
								<a href="<?=$vv['image']?>" title="Gallery" rel="Photo" class="workshop-gallery__item item">
									<img src="<?=$vv['image']?>" alt=""/>
								</a>
							<?php } ?>
						</li>
					<?php } ?>
				</ul>

				<h3 class="workshop-subtitle">
					<?php the_field('small_title2') ?>
				</h3>
				<p class="main-content__text">
					<?php the_field('text2') ?>
				</p>
				<div class="workshop-video">
					<div class="full-height_video">
				      <div id="full-height_video_video-object"></div>

				    </div>
				     <div class="btn-play-stop">
				        <button class="play"></button>
				        <button class="stop"></button>
			        </div>




					<button class="workshop-video__play"></button>
					<!-- <?php the_field('video') ?> -->
					<!-- <iframe width="560" height="315" src="<?php the_field('video') ?>" frameborder="0" allowfullscreen></iframe> -->
				</div>
				<h3 class="workshop-subtitle">
					<?php the_field('small_title2') ?>
				</h3>
				<p class="main-content__text">
					<?php the_field('text3') ?>
				</p>
				</div>
			</div>
			<?php
				require_once('wp-content/themes/clean_template/tpl/close_link.php');
			?>
			<a href="<?=$close_link?>" class="main-content__close"></a>
		</div>
	</div>
</main>

<script >
var path = "<?php echo the_field('video') ?>";
</script>
<?php get_footer(); ?>


<script src="<?php echo get_template_directory_uri(); ?>/js/custom_svitcher.js"></script>
