
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="<?php echo site_url('home') ?>">Home</a> &raquo;
				<a href="<?php echo site_url('news') ?>">News & Event's</a> &raquo;
				<?php echo $read->title; ?>
			</div>
		</nav>

		<article id="post" class="cf">
			<div class="left">
				
				<h1><?php echo $read->title; ?></h1>
				<h2><?php echo $read->subtitle; ?></h2>
				<?php echo $read->content; ?>
				
			</div><!--left-->

			<div class="right">
				<ul>
					<li>latest events</li>
					<?php foreach ($news as $new) { ?>
							<li><?php echo lanchor('news/read/'.$new->url, $new->title); ?></li>
						<?php } ?>
					</ul>
			</div><!--right-->
		</article>
