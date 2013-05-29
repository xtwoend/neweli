
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				<?php echo $page->title; ?>
			</div>
		</nav>

		<article id="blog" class="cf">
			<div class="left">
				<h1>News & Event's</h1>
				@if($posts)
					@foreach( $posts->results as $post )
					<div class="item">
						
						<h2>{{HTML::link('news/'.$post->slug, $post->title) }}</h2>
						<?php
							if($post->uploads){
								foreach($post->uploads as $up){
									echo '<img class="section_image" src="'.asset('uploads/').$up->thumb_filename.'" />';
								}
							}
						?>
						<p>
							{{Str::words(strip_tags($post->content), 50)}}
						</p>
						{{HTML::link('news/'.$post->slug, 'detail',  array('class' => 'readmore')) }}&gt;
						<div class="cf"></div>
						
					</div><!--item-->
					@endforeach
				<br>
					{{ $posts->links(); }}
				@endif


			</div><!--left-->

			<div class="right">
				<ul>
					<li>latest news</li>
					@foreach( $lastposts as $post )	
						<li>{{HTML::link('news/'.$post->slug, $post->title);}}</li>
					@endforeach
				</ul>
			</div><!--right-->
		</article>