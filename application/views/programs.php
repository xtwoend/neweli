
		<nav id="breadcrumb" class="cf">
			<div>
				<a href="#">Home</a> &raquo;
				Programs
			</div>
		</nav>
			

<?php
		$menus = $programs;

       	$hash = array();
		foreach($menus as $object)
		{
		    $hash[$object->id] = array('object' => $object);
		}
		

		$tree = array();
		foreach($hash as $id => &$node)
		{
		   	if($parent = $node['object']->parent){
		   		$hash[$parent]['children'][] =& $node;
		   	}else{
		   		$tree[] =& $node;
		   	}
		}
		unset($node, $hash);

		function render_tree($tree)
		{
		    echo '<ul>';
		    $no = 1;
		    foreach($tree as $node)
		    {	
		        render_node($node,0, $no++ );
		    }
		    echo '</ul>';
		}

		// render tree node
		function render_node($node, $level = 0, $no = 1)
		{	
			
		    $inset = str_repeat('    ', $level);

		    if($level==0){
		    	$listprograms = '<div class="line">
												<span class="dropcap">'.$no.'</span>'.
												$node['object']->program_name .	
											'</div>';
		    }else if($level==1){
		    	$listprograms = '<h5>'.$node['object']->program_name . '</h5>';
		    }else
		    {	$slug = str_replace(' ', '-', $node['object']->program_name);
		    	$listprograms = '<li>'.lanchor('programs/read/'.$node['object']->id.'/'.$slug, $node['object']->program_name);
		    }
		    
		    echo $listprograms;

		   	if (isset($node['children']))
		    {
		        echo $inset. '  <ul>'; 
		        foreach($node['children'] as $node)
		        {
		            render_node($node, $level+1);
		        }
		        echo $inset.'</ul>'.$inset;
		    }
		    echo '</li>';
		}
?>

<article id="program" class="cf">
			
			<div class="left">
				<h2>Our Recommendation</h2>
				
				
				
				
				<?php echo render_tree($tree) ?>
				
			</div><!--left-->



			<div class="right">
				<?php if($content): ?>
					<h1><?php echo $content->program_name; ?></h1>

					<?php echo $content->content; ?>

				<?php endif ?>
			</div>
		</article>
		