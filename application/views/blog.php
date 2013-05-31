
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				What they say
			</div>
		</nav>

		<article id="blog" class="cf">
			<div class="left">
				<h1>What They Say</h1>
				<?php if($posts): ?>
					<?php foreach( $posts as $post ): ?>
					<div class="item">
						<div class="subitem">
						<?php echo date('M j, Y ',strtotime($post->created_at)) ?> | by:  <?php echo $this->authentication->get_fullname($post->created_by) ?>  
						</div>
						<h2><?php echo lanchor('what-they-say/read/'.$post->url, $post->title); ?></h2>
						
						<?php echo word_limiter($post->content, 20); ?> 
						<?php echo lanchor('what-they-say/read/'.$post->url, 'detail'); ?> &gt;&gt;
						<div class="cf"></div>
						
					</div><!--item-->
					<?php endforeach; ?>
				<br>
		
				<?php endif; ?>


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