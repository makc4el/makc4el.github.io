<?php 
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

require_once('environment.php');

//cached pages
require_once('binboro_wp_cache.php');




ob_start();
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
$output = ob_get_contents();
ob_end_clean();

if(!is_admin_bar_showing()) {
	$bbCache->add_to_cache($output);
}

echo $output;

//$bbCache->add_to_cache($output);


//echo $output;
