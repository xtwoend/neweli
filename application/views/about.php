	<?php 
						$leftmenu = $this->page_lang->gets(array('page.parent'=> 3, 'page_lang.lang'=> $this->lang->mci_current()));

					?>
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				About Us
				<select id="menu-about" name="about">
					<option>ABOUT US</option>
					<?php foreach($leftmenu as $mleft) : ?>
					<option value="<?php echo $mleft->url?>"><?php echo $mleft->nav_title ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</nav>
					
		<article id="aboutus" class="cf">
			<div class="left">
				<ul>
					<li>about us</li>
					<?php foreach($leftmenu as $mleft) : ?>
					<li><?php echo lanchor($mleft->url, $mleft->nav_title);  ?></li>
					<?php endforeach; ?>
				</ul>
			</div><!--left-->

			<div class="right">
				<h1><?php echo $page->title ?></h1>

				<?php $content = $this->section->findsection(array('sections.page_id'=> $page->page_id , 'section_lang.lang' => $this->lang->mci_current() )); ?>	
				<?php if($content) { ?>
				<h2><?php echo $content->title ?></h2>
				<h5><?php echo $content->subtitle ?></h5>
				<?php echo $content->content ?>
				<?php } ?>

				
			</div>
		</article>
		