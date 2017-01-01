<?php
/*
Template Name: All posts categories
*/
?>
<?php get_header(); ?>
<header class="header-boats" id="header">
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
  	<div class="main-menu__wrapper">
		<nav class="main-menu" id="main-menu">
			<ul class="main-menu__list">
				<?php
						if(ICL_LANGUAGE_CODE=='en'){
							$menu_header=14;
						}
						if(ICL_LANGUAGE_CODE=='fr'){
							$menu_header=40;
						}
						if(ICL_LANGUAGE_CODE=='de'){
							$menu_header=41;
						}
						if(ICL_LANGUAGE_CODE=='it'){
							$menu_header=42;
						}
						if(ICL_LANGUAGE_CODE=='ru'){
							$menu_header=43;
						}
						if(ICL_LANGUAGE_CODE=='es'){
							$menu_header=44;
						}
						if(ICL_LANGUAGE_CODE=='pl'){
							$menu_header=46;
						}
						if(ICL_LANGUAGE_CODE=='zh-hans'){
							$menu_header=39;
						}
						if(ICL_LANGUAGE_CODE=='ar'){
							$menu_header=45;
						}
				?>
					<?php
					wp_nav_menu( array(
						'theme_location'  => '',
						'container'       => false,
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => $menu_header,
						'echo'            => true,
						'fallback_cb'     => 'wp_page_menu',
						'before'          => '',
						'after'           => '',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '%3$s',
						'depth'           => 0,
						'walker'          => new headerMenuWalker,
					) );
					?>
			</ul>
		</nav>

		<div class="menu-close">
	      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 15.642 15.642" enable-background="new 0 0 15.642 15.642">
	       <path fill-rule="evenodd" d="M8.882,7.821l6.541-6.541c0.293-0.293,0.293-0.768,0-1.061  c-0.293-0.293-0.768-0.293-1.061,0L7.821,6.76L1.28,0.22c-0.293-0.293-0.768-0.293-1.061,0c-0.293,0.293-0.293,0.768,0,1.061  l6.541,6.541L0.22,14.362c-0.293,0.293-0.293,0.768,0,1.061c0.147,0.146,0.338,0.22,0.53,0.22s0.384-0.073,0.53-0.22l6.541-6.541  l6.541,6.541c0.147,0.146,0.338,0.22,0.53,0.22c0.192,0,0.384-0.073,0.53-0.22c0.293-0.293,0.293-0.768,0-1.061L8.882,7.821z"></path>
	      </svg>
	    </div>
	  </div>

	  <div class="burger-menu">
	    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="512px" height="512px" viewBox="0 0 459 459"  xml:space="preserve">
	    <g id="burger-menu">
	      <path d="M0,382.5h459v-51H0V382.5z M0,255h459v-51H0V255z M0,76.5v51h459v-51H0z"></path>
	    </g>
	    </svg>
	  </div>
	<?php
		require_once('wp-content/themes/clean_template/tpl/switch.php');
	?>
</header>
<main class="blog">
	<section class="blog-content">
		<div class="blog-slogan">
			<h1 class="home__title">
				<?php the_field('title') ?>
				<span><?php the_field('title_continued') ?></span>
			</h1>
		</div>
	</section>
	<section class="blogs-article">
		<div class="boats__inner">
			<div class="posts-filter">
				<div class="posts-filter__search">
					<?php if (function_exists('relevanssi_the_excerpt')) { relevanssi_the_excerpt(); }; ?>

					<?php dynamic_sidebar("search"); ?>
				</div>
				<div class="posts-filter__container posts-filter__categories">
					<h2 class="posts-filter__caption posts-filter__caption--categories">
						<?php
										if(ICL_LANGUAGE_CODE=='en'){
											$link_Regulamin=973;
										}
										if(ICL_LANGUAGE_CODE=='fr'){
											$link_Regulamin=977;
										}
										if(ICL_LANGUAGE_CODE=='de'){
											$link_Regulamin=978;
										}
										if(ICL_LANGUAGE_CODE=='it'){
											$link_Regulamin=979;
										}
										if(ICL_LANGUAGE_CODE=='ru'){
											$link_Regulamin=980;
										}
										if(ICL_LANGUAGE_CODE=='es'){
											$link_Regulamin=981;
										}
										if(ICL_LANGUAGE_CODE=='pl'){
											$link_Regulamin=983;
										}
										if(ICL_LANGUAGE_CODE=='zh-hans'){
											$link_Regulamin=976;
										}
										if(ICL_LANGUAGE_CODE=='ar'){
											$link_Regulamin=982;
										}
										?>
						<?php the_field('text_categories', $link_Regulamin); ?>
					</h2>
					<ul class="posts-filter__lists posts-filter__lists--categories">
						<li class="posts-filter__item">
							<a href="<?php the_permalink($link_Regulamin) ?>">ALL</a>
						</li>
						<?php
						$args = array(
							'number' => 4,
						);
						$categories = get_categories( $args );
						foreach ($categories as $k=>$category){
							?>
							<li class="posts-filter__item">
								<a href="<?= get_category_link( $category->cat_ID ); ?>">
									<?= $category->name ?>
								</a>
							</li>
						<?php } wp_reset_postdata(); ?>
					</ul>
				</div>
				<div class="posts-filter__container posts-filter__authuors">
					<h2 class="posts-filter__caption posts-filter__caption--authuors">
						<?php
										if(ICL_LANGUAGE_CODE=='en'){
											$link_Regulamin=673;
										}
										if(ICL_LANGUAGE_CODE=='fr'){
											$link_Regulamin=896;
										}
										if(ICL_LANGUAGE_CODE=='de'){
											$link_Regulamin=898;
										}
										if(ICL_LANGUAGE_CODE=='it'){
											$link_Regulamin=900;
										}
										if(ICL_LANGUAGE_CODE=='ru'){
											$link_Regulamin=905;
										}
										if(ICL_LANGUAGE_CODE=='es'){
											$link_Regulamin=908;
										}
										if(ICL_LANGUAGE_CODE=='pl'){
											$link_Regulamin=911;
										}
										if(ICL_LANGUAGE_CODE=='zh-hans'){
											$link_Regulamin=1032;
										}
										if(ICL_LANGUAGE_CODE=='ar'){
											$link_Regulamin=1148;
										}
										?>
						<?php the_field('text_authors', $link_Regulamin); ?>
					</h2>
					<ul class="posts-filter__lists posts-filter__lists--authuors">
            <?php
            $posts = get_posts();
            foreach($posts as $post){
              setup_postdata($post);
              $id_authors[] =$post->post_author;
            }
            $id_authors = array_unique($id_authors);
            wp_reset_postdata();
            foreach ($id_authors as $id_author){
              $name_user=get_userdata($id_author);
              $name_users['name'][] = $name_user->user_login;
              $name_users['id'][] = $id_author;
            }
						wp_reset_postdata();
            ?>
            <li class="posts-filter__item">
              <a href="<?php the_permalink($link_Regulamin) ?>">ALL</a></li>
            <?php for($i=0; $i<count($name_users); $i++){ ?>
              <li class="posts-filter__item">
                <a href="<?= get_author_posts_url($name_users['id'][$i]); ?>">
                  <?= $name_users['name'][$i]; ?>
                </a>
              </li>
            <?php } ?>
          </ul>
				</div>
			</div>
			<div class="posts-container">
				<div class="posts-container__item posts-container__item--two">
					<?php
					$ch=0;
					$ids_kn='';
					$myposts = get_posts(array('post_status' => 'publish', numberposts=>-1 ));
					// print_r($myposts);
					foreach ($myposts as $k=>$post){
						$id_post = $post->ID;
						$wpml_language_cod_post = wpml_get_language_information($post->ID)['language_code'];

						if($wpml_language_cod_post==ICL_LANGUAGE_CODE){
							if($ch<=1){
								$ids_kn.=$post->ID. ' ';
							$ch++;
						$cat = wp_get_post_categories( $id_post, array('fields' => 'all') );
						?>
						<a href="<?php the_permalink($id_post); ?>" class="posts-container__block">
							<div class="posts__bg posts__bg--1" style="background: url(<?php echo get_the_post_thumbnail_url( $id_post, 'full' ); ?>) no-repeat center; background-size: cover;" >
								<header class="posts__header">
									<?php $author_email = get_the_author_email();?>
									<?php
											// Retrieve The Post's Author ID
											$user_id = get_the_author_meta('user_id');
											// Set the image size. Accepts all registered images sizes and array(int, int)
											$size = 'thumbnail';

											// Get the image URL using the author ID and image size params
											$imgURL = get_cupp_meta($user_id, $size);

											// echo '<img src="'. $imgURL .'" alt="">';
									?>
									<img src="<?php echo $imgURL; ?>" alt="" class="photo-name"/>
									<p class="human-name">
										<?php $user_info = get_userdata($post->post_author); echo $user_info->display_name;  ?>
									</p>
									<div class="posts-date">
										<p class="posts-date__month"><?php echo get_the_date('M'); ?></p>
										<p class="posts-date__date"><?php echo get_the_date('j, Y'); ?></p>
									</div>
								</header>
								<div class="posts__content">
									<h1 class="posts__content-title">
										<p>
											<?php the_field('title', $id_post) ?>
										</p>
									</h1>
									<p class="posts__content-rubric"><?php print_r($cat[0]->name); ?></p>
									<p class="posts__content-text"><?php the_field('short_description_for_our_blog', $id_post) ?></p>
								</div>
							</div>
						</a>
					<?php }} } ?>
				</div>
				<?php
				$myposts = get_posts(array('post_status' => 'publish', numberposts=>-1, 'exclude' => $ids_kn ));
				?>
				<div class="posts-container__item posts-container__item--three">
					<?php
					foreach ($myposts as $k=>$post){
						$id_post = $post->ID;
						$wpml_language_cod_post = wpml_get_language_information($post->ID)['language_code'];
						if($wpml_language_cod_post==ICL_LANGUAGE_CODE){
						$cat = wp_get_post_categories( $id_post, array('fields' => 'all') );
						?>
						<a href="<?php the_permalink($id_post); ?>" class="posts-container__block">
							<div class="posts__bg posts__bg--1" style="background: url(<?php echo get_the_post_thumbnail_url( $id_post, 'full' ); ?>) no-repeat center; background-size: cover;">
								<header class="posts__header">
									<?php $author_email = get_the_author_email();?>
									<?php
											$user_id = get_the_author_meta('user_id');
											$size = 'thumbnail';
											$imgURL = get_cupp_meta($user_id, $size);
									?>
									<img src="<?php echo $imgURL; ?>" alt="" class="photo-name"/>
									<p class="human-name">
										<?php the_author(); ?>
									</p>
									<div class="posts-date">
										<p class="posts-date__month"><?php echo get_the_date('M'); ?></p>
										<p class="posts-date__date"><?php echo get_the_date('j, Y'); ?></p>
									</div>
								</header>
								<div class="posts__content">
									<h1 class="posts__content-title">
										<p>
											<?php the_field('title', $id_post) ?>
										</p>
									</h1>
									<p class="posts__content-rubric"><?php print_r($cat[0]->name); ?></p>
									<p class="posts__content-text"><?php the_field('short_description_for_our_blog', $id_post) ?> </p>
								</div>
							</div>
						</a>
					<?php } }?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php get_footer('kn'); ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/custom_svitcher.js"></script>
<script>
$(document).ready(function() {
		var numbers= $('ul.main-menu__list li a sup');
		// var numbers= $('ul.main-menu__list li a sup').text();
		$.each(numbers, function( index, value ) {
				var number = index+1;
				$(this).text('0'+number);
		});

});
</script>
