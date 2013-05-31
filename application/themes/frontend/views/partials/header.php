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
		<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src='<?php echo $this->config->item('js') ?>jquery-1.8.2.min.js'>\x3C/script>")</script>
    </head>
    <body>

    	<a href="<?php lecho('news'); ?>" id="event">
    		<img src="<?php echo $this->config->item('images') ?>curl.png" height="144" width="148" />
    	</a>

    	<?php 
		$topmenus = $this->page_lang->gets(array('page.menu_id'=>4, 'page_lang.lang'=> $this->lang->mci_current(), 'page.parent' => 0), array('order'=>'asc'));
		?>

		<header class="cf">
			<div id="header" class="cf">
				<img id="logo" src="<?php echo $this->config->item('images') ?>logo-grey.jpg" title="Prasetiya Mulya Business School" alt="Prasetiya Mulya Business School" />
				<hr class="top cf" />
				<nav id="menu-top">
					<ul>
						<!--<li><?php echo lanchor('', 'Home'); ?></li>-->
						<?php foreach ($topmenus as $topmenu) {
							echo '<li>';
							if($topmenu->page_name == 'programs') {
								echo lanchor('#', $topmenu->nav_title, 'id="programs"');
							} else {
								echo lanchor($topmenu->url, $topmenu->nav_title); 
							}
							echo '</li>';
						}
						?>
						<!--
						<li>
							<a href="#" >
								<input type="button" id="register"  name="register" value="register" />
							</a>
						</li>
						<li><a href="#">news &amp; events</a></li>
						<li><a href="#">blog</a></li>
						-->
					</ul>
					<style type="text/css">
					#nav_programs {
						background: #fff;
						border: 1px solid #ccc;
						padding: 5px;
						position: absolute;
						margin-top: -25px;
						margin-left: 190px;
					}
					#menu-top #nav_programs li { border-right: none; display: block; width: 120px; }
					#nav_programs li:hover { background: #ccc; }
					</style>
					<ul id="nav_programs" style="display:none">
						<?php //$programs = $this->mprogram_lang->gets(array('program_lang.lang'=>$this->lang->mci_current()), array('order'=>'asc')); ?>
						<?php //foreach($programs as $program): ?>
						<li><a href="#"><?php //echo $program->program ?>try</a></li>
						<li><a href="#"><?php //echo $program->program ?>try</a></li>
						<?php //endforeach ?>
					</ul>
					<script type="text/javascript">
					$('#programs').click(function() {
						$('#nav_programs').toggle()
					})
					</script>
				</nav>
				<select name="menu" id="select" class="dk">
					<?php foreach ($topmenus as $topmenu) { ?>
					<option value="<?php lecho($topmenu->url); ?>"><?php echo $topmenu->nav_title ?></option>
					<?php } ?>
				</select>
				<div id="login" class="rounded">
					<div class="item" style="float:left">
						<?php if($this->lang->mci_current() == 'id') {?>
						<a href="<?php echo base_url() . lchange('en') ?>">
							<img id="flag" src="<?php echo $this->config->item('images') ?>flag/uk.png" width="25" />
						</a>
						<?php }else{ ?>
						<a href="<?php echo base_url() . lchange('id') ?>">
							<img id="flag" src="<?php echo $this->config->item('images') ?>flag/id.png"  width="25" />
						</a>
						<?php } ?>

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

