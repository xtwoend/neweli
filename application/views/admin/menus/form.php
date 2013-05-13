<div class="header">
            
            <h1 class="page-title">List Menu</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Menu</li>
</ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Menu</a>
        <div id="page-stats" class="block-body collapse in">
           	<?php 
				$idvalue = ($create) ? '': $menu->id ; 
				$namevalue = ($create) ? '': $menu->name ; 
				$layoutvalue = ($create) ? '': $menu->layout ;
				$orderingvalue = ($create) ? '': $menu->ordering ; 
			?>

			<?php echo form_open(current_url()); ?>

			<?php echo form_hidden('id', $idvalue ); ?>

			Menu : <?php echo form_input(array('name'=>'name', 'value' => $namevalue )); ?> <br>
			Layout : <?php echo form_input(array('name'=>'layout', 'value' => $layoutvalue )); ?> <br>
			Ordering : <?php echo form_input(array('name'=>'ordering', 'value' => $orderingvalue )); ?><br>

			<?php echo form_submit('mysubmit', 'save'); ?>
			<?php echo form_close(); ?>
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>

