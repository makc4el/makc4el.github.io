
<?php

//languages switch
//do_action('wpml_add_language_selector');
?>
	<?php
//  if(ICL_LANGUAGE_CODE=='en'){
//	$menu_footer=9;
//  }
//  if(ICL_LANGUAGE_CODE=='fr'){
//	$menu_footer=32;
//  }
?>
<?php
//wp_nav_menu( array(
//	'container'       => false,
//	'container_class' => '',
//	'container_id'    => '',
//	'menu_class'      => 'menu',
//	'menu_id'         => $menu_footer,
//	'echo'            => true,
//	'fallback_cb'     => 'wp_page_menu',
//	'before'          => '',
//	'after'           => '',
//	'link_before'     => '',
//	'link_after'      => '',
//	'items_wrap'      => '%3$s',
//	'depth'           => 0,
//	'walker'          => '',
//) );
?>
<script>
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var path = "<?php echo get_template_directory_uri(); ?>/";
	var page_available_tours = "<?php echo get_permalink('2123'); ?>";
	var start_paning = "<?php echo get_permalink('2169'); ?>";
</script>

<script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.selectric.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-ui.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/script.js"></script>

<script src="<?php echo get_template_directory_uri(); ?>/js/ajax.js"></script>
<footer id="footer"></footer>
<?php wp_footer();  ?>
</body>
</html>
