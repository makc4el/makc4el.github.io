<?php
/*
PostType Page Template: Article
*/
?>
<?php get_header(); ?>
<?php
  $category = get_the_category();
  $cat_id=$category[0]->cat_ID;
  $idkn=$post->ID;
  wp_reset_postdata();
?>

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
    <nav class="main-menu">
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
  <section class="blog-content"></section>
  <div class="simple-article">
    <div class="boats__inner">
      <div class="blog-slogan">
        <h1 class="home__title"><?php the_field('title'); ?></h1>
        <p class="article__rubric"><?php  echo $category[0]->cat_name; ?></p>
      </div>
      <div class="article__autors">
        <div class="article__autors-photo">
          <?php $author_email = get_the_author_email();?>
          <?php
              $user = get_user_by('email', $author_email);
              $user_id = get_the_author_meta('user_id');
              $size = 'thumbnail';
              $imgURL = get_cupp_meta($user_id, $size);
          ?>
          <img src="<?php echo $imgURL; ?>" alt="" class="photo-name"/>
        </div>
        <p class="article__autors-name"><?php the_author(); ?></p>
      </div>
      <div class="article__date">
        <div class="calendar"></div>
        <p class="article__date-text"><?php echo get_the_date('M j, Y'); ?></p>
      </div>
      <div class="article-inside">
        <div class="article__inner">
        <img src="<?php the_field('big_image'); ?>" alt=""/>
          <p class="article__txt">
            <?php the_field('text'); ?>
          </p>
          <div class="social">
        <div class="addthis_inline_share_toolbox"></div>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-581a16bfa9cfe987"></script>
        </div>

        </div>
        <div class="similar-posts">
          <h1 class="similar-posts__title">SIMILAR POSTS</h1>
          <?php
          $n=4;
          $recent = new WP_Query("cat=$cat_id&showposts=$n&category__not_in=$category");
          while($recent->have_posts()) : $recent->the_post();
          if($idkn!=$post->ID){
          ?>
          <a href="<?php the_permalink($id_post); ?>" class="posts-container__block">
            <div class="posts__bg posts__bg--1">
              <header class="posts__header">
                <?php $author_email = get_the_author_email();?>
                <?php
                    $user = get_user_by('email', $author_email);
                    $user_id = get_the_author_meta('user_id');
                    $size = 'thumbnail';
                    $imgURL = get_cupp_meta($user_id, $size);

                ?>
                <img src="<?php echo $imgURL; ?>" alt="" class="photo-name"/>


                <p class="human-name">
                  <?php $user_info = get_userdata($post->post_author); echo $user_info->display_name;  ?>
                </p>
                <div class="posts-date">
                  <p class="posts-date__month"><?php the_date('M' ); ?> </p>
                  <p class="posts-date__date"><?php echo get_the_date('j, Y' ); ?></p>
                </div>
              </header>
              <div class="posts__content">
                <p class="posts__content-title"><?php the_field('title', $post->ID) ?></p>
                <p class="posts__content-rubric"><?php  echo $category[0]->cat_name; ?></p>
                <p class="posts__content-text"><?php echo wp_trim_words(get_field('short_description', $post->ID), 6, '') ?></p>
              </div>
            </div>
          </a>
          <?php }?>
          <?php endwhile; wp_reset_postdata();?>
        </div>

      </div>
    </div>
  </div>
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
