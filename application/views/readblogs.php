
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="<?php echo site_url('home') ?>">Home</a> &raquo;
				<a href="<?php echo site_url('what-they-say') ?>">What They Say</a> &raquo;
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
					<li>latest posting</li>
					<?php foreach( $posts as $post ): ?>	
						<li><?php echo lanchor('what-they-say/read/'.$post->url, $post->title); ?></li>
					<?php endforeach ?>
				</ul>
			</div><!--right-->
		</article>
