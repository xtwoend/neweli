		
		<?php 
		$menuheadline = $this->page_lang->gets(array('page.menu_id'=>5, 'page_lang.lang'=> $this->lang->mci_current()));
		
		?>
		<nav id="menu-headline" class="cf">
				
				<ul>
					<?php foreach ($menuheadline as $nav) {
						echo '<li><a href="#'.$nav->url.'">'.$nav->nav_title.'</a></li>';
					}
					?>
				</ul>
		
		</nav>

		</header>

			<div id="menu-select" style="display:none">
				<select name="menu">
					<?php foreach ($menuheadline as $nav) {
						echo '<option value="'.$nav->url.'">'.$nav->nav_title.'</option>';
					}
					?>
				</select>
			</div>

			<!-- ***** slider ***** -->
			<div style="margin: 0 auto; width: 896px;">
				<div id="slider" class="cf">
					<div class="slides_container">
						<?php foreach ($this->msliders_lang->gets(array('sliders_lang.lang'=> $this->lang->mci_current())) as $banner) : ?>
						<div>
							<a href="http://<?php echo $banner->link ?>" target="_blank"><img src="<?php echo base_url().'file/banners/'. $this->lang->mci_current() .'/'.$banner->img_src ?>" height="413" width="896" /></a>
						</div>
						<?php endforeach; ?>
					</div>
				</div><!--slider-->
			</div>

			<ul id="nav-middle">
				<li>
					<input type="button" class="rounded" name="download" value="download brochure" />
					<input type="button" class="rounded" name="contact" value="contact us" />
				</li>
				<li>
					<span><a href="#">register online</a></span>
					<input type="button" name="find" value="Find your programs" />
				</li>
			</ul>
		</header>
		<br><br>
		<?php 
			$homes = $this->page_lang->gets(array('page.is_home' => 1, 'page_lang.lang'=> $this->lang->mci_current()));
		?>
		<?php foreach($homes as $home) : ?>
		<article id="<?php echo $home->url ?>" class="cf">
			<fieldset>
				<legend><?php echo $home->title ?></legend>
				<?php $content = $this->section->findsection(array('sections.page_id'=> $home->page_id , 'section_lang.lang' => $this->lang->mci_current() )); ?>	
				<?php if($content) { ?>
				<h5><?php echo $content->title ?></h5>
				<span class="bottom-title"><?php echo $content->subtitle ?></span>
				<?php echo $content->content ?>
				<?php } ?>
			</fieldset>
		</article><!-- article #who -->
		<?php endforeach; ?>
