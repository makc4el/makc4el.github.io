<?php
/*
Template Name: Contact
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
<main>
	<div class="contact">

		<div class="contact__wrapper">
			<h1 class="home__title main-title">
			<?php the_field('big_title') ?>
		</h1>
		</div>
		<div class="main-content">
			<div id="contact-page" class="main-content__inner">
				<div class="main-content__scroll">
					<h1 class="main-content__header-title">
						<?php the_field('small_title') ?>
					</h1>
					<div class="contact-information">
						<div class="contact-information__item">
							<div class="contact-information__icon contact-information--location"></div>
							<p class="contact-information__text">
								<?php the_field('location') ?>
							</p>
						</div>
						<div class="contact-information__item contact-information--email">
							<div class="contact-information__icon contact-information--mail"></div>
							<a href="mailto:<?php the_field('email') ?>" class="contact-information__text">
								<?php the_field('email') ?>
							</a>
						</div>
						<div class="contact-information__item contact-information--phones">
							<div class="contact-information__icon contact-information--phone"></div>
							<p class="contact-information__text">
								<span><?php the_field('name1') ?> </span>
								<a href = "tel:<?php the_field('phone1') ?>"><?php the_field('phone1_title') ?></a>
								<a href="mailto:<?php the_field('email1') ?>">
									<?php the_field('email1') ?>
								</a>
								, <?php the_field('location1') ?>
							</p>
							<p class="contact-information__text">
								<span><?php the_field('name2') ?> </span>
								<a href = "tel:<?php the_field('phone2') ?>"><?php the_field('phone2_title') ?></a>
								<a href="mailto:<?php the_field('email2') ?>">
									<?php the_field('email2') ?>
								</a>
								, <?php the_field('location2') ?>
							</p>
							<p class="contact-information__text">
								<span><?php the_field('name3') ?></span>
								<a href = "tel:<?php the_field('phone3') ?>"><?php the_field('phone3_title') ?>,</a>
								<?php the_field('location3') ?>
							</p>
						</div>
					</div>
					<?php
						require_once('wp-content/themes/clean_template/tpl/contact_us_form_tpl.php');
					?>
				</div>
			</div>
			<?php
				require_once('wp-content/themes/clean_template/tpl/close_link.php');
			?>
			<a href="<?=$close_link?>" class="main-content__close"></a>
		</div>
	</div>
</main>

<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom_svitcher.js"></script>
