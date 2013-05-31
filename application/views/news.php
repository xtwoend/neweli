

		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				News & Events
			</div>
		</nav>

		<article id="blog" class="cf">
			<div class="left">
				<h1>News & Events</h1>

				<?php foreach ($news as $new) { ?>
					

				<div class="item">
					<div class="subitem">
						start: <?php echo date('M j, Y ',strtotime($new->start_date)) ?> | end: <?php echo date('M j, Y ',strtotime($new->end_date)) ?> 
					</div>
					<h2><?php echo lanchor('news/read/'.$new->url, $new->title); ?></h2>
					
					<?php echo word_limiter($new->content, 20); ?>
					<?php echo lanchor('news/read/'.$new->url, 'detail'); ?> &gt;&gt;
				</div><!--item-->
				<?php } ?>
				<!--
				<ul id="pagination">
					<li><a href="#">&lt; Prev : </a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">6</a></li>
					<li><a href="#">...</a></li>
					<li><a href="#">10</a></li>
					<li><a href="#">Next : &gt;</a></li>
				</ul>
				-->
			</div><!--left-->

			<div class="right">
				<div class="first">
					<h4>latest event's</h4>
					<ul>
						<?php foreach ($news as $new) { ?>
							<li><?php echo lanchor('news/read/'.$new->url, $new->title); ?></li>
						<?php } ?>
					</ul>
				</div>
				
			</div><!--right-->
		</article>
