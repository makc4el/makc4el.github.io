
				<?php
        //languages switch
        do_action('wpml_add_language_selector');
      ?>
			<?php
          if(ICL_LANGUAGE_CODE=='en'){
            $menu_footer=9;
          }
          if(ICL_LANGUAGE_CODE=='fr'){
            $menu_footer=32;
          }
          if(ICL_LANGUAGE_CODE=='de'){
            $menu_footer=33;
          }
          if(ICL_LANGUAGE_CODE=='it'){
            $menu_footer=34;
          }
          if(ICL_LANGUAGE_CODE=='ru'){
            $menu_footer=35;
          }
          if(ICL_LANGUAGE_CODE=='es'){
            $menu_footer=36;
          }
          if(ICL_LANGUAGE_CODE=='pl'){
            $menu_footer=38;
          }
          if(ICL_LANGUAGE_CODE=='zh-hans'){
            $menu_footer=31;
          }
          if(ICL_LANGUAGE_CODE=='ar'){
            $menu_footer=37;
          }
      ?>
			<?php
			wp_nav_menu( array(
				'theme_location'  => '',
				'container'       => false,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'menu',
				'menu_id'         => $menu_footer,
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul class="footer-menu__list">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
			) );
			?>

<!-- <?php echo get_template_directory_uri(); ?> -->

<?php wp_footer();  ?>
