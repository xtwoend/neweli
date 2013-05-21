<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Prasetya Mulya</title>
		
		<meta name="title" content="meta-title">
		<meta name="description" content="description">
 		<meta name="google-site-verification" content="google-site-verification">
		<meta name="author" content="Elvis Sonatha">
		<meta name="copyright" content="Copyright Prasetya Mulya 2011. All Rights Reserved.">

        <!--[if lt IE 9]> HTML5Shiv
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

		<link rel="shortcut icon" href="<?php echo $this->config->item('images') ?>images/favicon.ico">

		<link rel="shortcut icon" href="<?php echo $this->config->item('images') ?>images/favicon.ico">
		<!-- This is the traditional favicon.
			 - size: 16x16 or 32x32
			 - transparency is OK
			 - see wikipedia for info on browser support: http://mky.be/favicon/ -->
			 
		<link rel="apple-touch-icon" href="<?php echo $this->config->item('images') ?>images/apple-touch-icon.png">
		<!-- The is the icon for iOS's Web Clip.
			 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one)
			 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
			 - Transparency is not recommended (iOS will put a black BG behind the icon) -->

		<link rel="stylesheet" href="<?php echo $this->config->item('css') ?>reset.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo $this->config->item('css') ?>style.css">
		<link rel="stylesheet" href="<?php echo $this->config->item('css') ?>jquery.hoverscroll.css">
		<link rel="stylesheet" href="<?php echo $this->config->item('css') ?>dropkick.css">
    </head>
    <body>
    	<a href="#" id="event">
    		<img src="<?php echo $this->config->item('images') ?>curl.png" height="144" width="148" />
    	</a>

		<header class="cf">
			<div id="header" class="cf">
				<img id="logo" src="<?php echo $this->config->item('images') ?>logo-grey.jpg" title="Prasetiya Mulya Business School" alt="Prasetiya Mulya Business School" />
				<hr class="top cf" />
				<nav id="menu-top">
					<ul>
						<li><a href="#" class="active">home</a></li>
						<li><a href="about.html">about us</a></li>
						<li><a href="#">contact us</a></li>
						<li>
							<a href="#">
								<input type="button" id="register" class="rounded" name="register" value="register" />
							</a>
						</li>
						<li><a href="#">news &amp; events</a></li>
						<li><a href="#">blog</a></li>
					</ul>
				</nav>
				<select name="menu" id="select" class="dk">
					<option value="about-us" selected>ABOUT US</option>
					<option value="contact-us">CONTACT US</option>
					<option value="news">NEWS &amp; EVENTS</option>
					<option value="blog">BLOG</option>
				</select>
				<div id="login" class="rounded">
					<div class="item" style="float:left">
						<a href="#">
							<!-- <img id="flag" src="<?php echo $this->config->item('images') ?>flag/<?php echo $this->lang->mci_current(); ?>.png" />-->
							<?php echo langbar(); ?>
						</a>
					</div>
					<div id="search-field" class="item" style="display:none;float:left">
						<form method="post" action="">
							<input type="text" name="search" value="" style="margin-top:10px">
						</form>
					</div>
					<div class="item" style="float:left">
						<a id="search">
							<img src="<?php echo $this->config->item('images') ?>loop.png" style="cursor:pointer" />
						</a>
					</div>
				</div><!--login-->
			</div><!--header-->

