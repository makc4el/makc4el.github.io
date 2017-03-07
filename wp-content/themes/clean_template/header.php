<?php

if( isset( $_GET['logout'] ) ) {
	wp_logout();
	wp_redirect(home_url());
}
?>


<html>
<head>
	<title>Travel</title>
	<meta charset="UTF-8"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="author" content="NikMax"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery_v3.js"></script>
	<link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/selectric.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.min.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/owl.theme.default.min.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.theme.min.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.structure.min.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/jquery-ui.min.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/layout.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" rel="stylesheet"/>
	<!-- Smartsupp Live Chat script -->
	<script type="text/javascript">
		var _smartsupp = _smartsupp || {};
		_smartsupp.key = '6ec1fd9c9276f63fd58bf9b014471c90400c368b';
		window.smartsupp||(function(d) {
			var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
			s=d.getElementsByTagName('script')[0];c=d.createElement('script');
			c.type='text/javascript';c.charset='utf-8';c.async=true;
			c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
		})(document);
	</script>
</head>
<body>
<?php
if ( ! current_user_can( 'manage_options' ) ) {
	show_admin_bar( false );
}
?>
<div class="svg_all">
	<svg xmlns="http://www.w3.org/2000/svg">
		<symbol id="email-icon">
			<path d="M194 118L209.91 118L209.91 118L209.91 127.18C209.91 128.73000000000002 208.67 130 207.14 130L196.76999999999998 130C195.24999999999997 130 193.99999999999997 128.73 193.99999999999997 127.18L193.99999999999997 118Z " fill-opacity="0" fill="#ffffff" stroke-dasharray="0" stroke-linejoin="miter" stroke-linecap="butt" stroke-opacity="1" stroke="#ffffff" stroke-miterlimit="50" stroke-width="1" transform="matrix(1,0,0,1,-193.5,-117.5)"></path>
			<path id="SvgjsPath1014" d="M196 120L201.95 126L207.92999999999998 120 " fill-opacity="0" fill="#ffffff" stroke-dasharray="0" stroke-linejoin="miter" stroke-linecap="butt" stroke-opacity="1" stroke="#ffffff" stroke-miterlimit="50" stroke-width="1" transform="matrix(1,0,0,1,-193.5,-117.5)"></path>
		</symbol>
	</svg>
</div>
<header id="header">
	<a href="/" class="header_logo">
		<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png"/>
	</a>
	<div class="container">
		<div class="header_search_group">
			<img src="<?php echo get_template_directory_uri(); ?>/images/icons/search.svg" class="header_search-btn"/>
			<input type="text" placeholder="Search country"/>
		</div>
		<ul class="header_login-list">
			<?php if ( !is_user_logged_in() ) { ?>
				<li class="header_login-item">
					<a href="<?= get_permalink(2054) ?>" class="header_login-link">LOG IN</a>
				</li>
				<li class="header_login-item">
					<a href="<?= get_permalink(2052) ?>" class="header_login-link">SIGN UP</a>
				</li>
			<?php }else{ ?>
				<li class="header_login-item">
					<a href="<?php echo $_SERVER['REQUEST_URI'].'?logout=true'; ?>" class="header_login-link">Log out</a>
				</li>
			<?php } ?>

		</ul>
		<ul class="header_lenguage_list">
			<li class="header_lenguage-item header_lenguage-item_active">
				<a href="#" class="heder_lenguage-link">ENG</a>
			</li>
			<li class="header_lenguage-item">
				<a href="#" class="heder_lenguage-link">ARAB</a>
			</li>
		</ul>
	</div>
</header>
<?php wp_head();  ?>

