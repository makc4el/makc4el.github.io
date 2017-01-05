<?php
get_header();

if ( have_posts() )
{
  $is_tags = true;
  require_once('wp-content/themes/clean_template/templates/blog-content.tpl.php');
}

get_footer();
?>
