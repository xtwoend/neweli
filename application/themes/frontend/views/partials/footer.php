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
						<li><a href="#">Managerial</a></li>
						<li><a href="#">Strategic</a></li>
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
					<li><a href="#">Sitemap</a></li>
					<li><a href="#">Privacy Policy</a></li>
					<li><a href="<?php echo base_url() ?>">&copy; ELI - Prasetiya Mulya - 2012 - <?php echo date('Y') ?></a></li>
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
