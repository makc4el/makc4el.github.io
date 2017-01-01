<html>
<head>
	<title>Travel</title>
	<meta charset="UTF-8"/>
	<meta name="keywords" content=""/>
	<meta name="description" content=""/>
	<meta name="author" content="NikMax"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/reset.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/selectric.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/layout.css" rel="stylesheet"/>
	<link href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" rel="stylesheet"/>
</head>
<body><div class="svg_all">
	<svg xmlns="http://www.w3.org/2000/svg">
		<symbol id="email-icon">
			<path d="M194 118L209.91 118L209.91 118L209.91 127.18C209.91 128.73000000000002 208.67 130 207.14 130L196.76999999999998 130C195.24999999999997 130 193.99999999999997 128.73 193.99999999999997 127.18L193.99999999999997 118Z " fill-opacity="0" fill="#ffffff" stroke-dasharray="0" stroke-linejoin="miter" stroke-linecap="butt" stroke-opacity="1" stroke="#ffffff" stroke-miterlimit="50" stroke-width="1" transform="matrix(1,0,0,1,-193.5,-117.5)"></path><path id="SvgjsPath1014" d="M196 120L201.95 126L207.92999999999998 120 " fill-opacity="0" fill="#ffffff" stroke-dasharray="0" stroke-linejoin="miter" stroke-linecap="butt" stroke-opacity="1" stroke="#ffffff" stroke-miterlimit="50" stroke-width="1" transform="matrix(1,0,0,1,-193.5,-117.5)"></path>
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
			<li class="header_login-item"><a href="<?= get_permalink(2054) ?>" class="header_login-link">LOG IN</a></li>
			<li class="header_login-item"><a href="<?= get_permalink(2052) ?>" class="header_login-link">SIGN UP</a></li>
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
