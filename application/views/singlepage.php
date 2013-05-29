		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				<?php echo $page->title; ?>
			</div>
		</nav>

		<article class="cf">
			<div>
			<?php $content = $this->section->findsection(array('sections.page_id'=> $page->page_id , 'section_lang.lang' => $this->lang->mci_current() )); ?>	
				<?php if($content) { ?>
				<h2><?php echo $content->title ?></h2>
				<h5><?php echo $content->subtitle ?></h5>
				<?php echo $content->content ?>
				<?php } ?>
			</div>
		</article>
