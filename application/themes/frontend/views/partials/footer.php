		<?php 
		$footerlefts = $this->page_lang->gets(array('page.menu_id'=>6, 'page_lang.lang'=> $this->lang->mci_current(), 'page.parent' => 0), array('order'=>'asc'));
		$footerrights = $this->page_lang->gets(array('page.menu_id'=>7, 'page_lang.lang'=> $this->lang->mci_current(), 'page.parent' => 0), array('order'=>'asc'));
		?>
		<footer class="cf">
			<div id="footer-top">
				<div class="left">
					<h4>customized programs</h4>
					Customized Programs: Programs of business management capabilities and leadership development that are specifically designed, systematic, integrative, and contextual in transforming ways of thinking and develop the capability of the businesses, and formulate solutions for business leaders which are related to Organization Development, Performance Management, Human Capital Development, Leadership Transition, and Grooming Leaders through various forms of design and method of solution.
				</div><!--left-->
				<div class="right">
					<h4>public programs</h4>
					<ul>
						<li><a href="#">Short Course</a></li>
						<li><a href="#" class="indent">- Managerial</a></li>
						<li><a href="#" class="indent">- Strategic</a></li>
						<li><a href="#">Certificate Programs</a></li>
						<li><a href="#">International Certificate Program</a></li>
					</ul>
				</div><!--right-->
			</div><!--footer-top-->
			<div id="footer-bottom">
				<ul class="left">
					<?php foreach ($footerlefts as $footerleft) {
							echo '<li>';
							echo lanchor($footerleft->url, $footerleft->nav_title); 
							echo '</li>';
						}
						?>				
				</ul>
				<ul class="right">
					<?php foreach ($footerrights as $footerright) {
							echo '<li>';
							echo lanchor($footerright->url, $footerright->nav_title); 
							echo '</li>';
						}
						?>	
					<li><a href="">&copy; ELI - Prasetiya Mulya - 2012</a></li>			
				</ul>
			</div><!--footer-bottom-->
		</footer>

    </body>

	<!-- Grab Google CDN's jQuery. fall back to local if necessary -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script>window.jQuery || document.write("<script src='<?php echo $this->config->item('js') ?>jquery-1.8.2.min.js'>\x3C/script>")</script>

	<script src="<?php echo $this->config->item('js') ?>jquery.hoverscroll.js"></script>
	<script src="<?php echo $this->config->item('js') ?>slides.min.jquery.js"></script>
	<script src="<?php echo $this->config->item('js') ?>jquery.dropkick.js"></script>
	<script src="<?php echo $this->config->item('js') ?>functions.js"></script>

	<!-- Asynchronous google analytics; this is the official snippet.
		 Replace UA-XXXXXX-XX with your site's ID and uncomment to enable.
		 
	<script>
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-XXXXXX-XX']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>
	-->

</html>