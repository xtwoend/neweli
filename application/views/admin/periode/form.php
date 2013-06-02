<div class="header">
            
            <h1 class="page-title">List Menu</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">User</li>
</ul>

        <div class="container-fluid">
            <div class="row-fluid">
<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>             

<div class="row-fluid">
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Periode Courses</a>
        <div id="page-stats" class="block-body collapse in">
           <br>
      <?php echo form_open(current_url(),array('class'=>'form-horizontal')); ?>

      <?php echo form_hidden('id', ($create)?'': $periode->id ); ?>

        <div class="control-group">
            <label class="control-label" for="menu">Periode Range</label>
            <div class="controls">
              <?php echo form_input(array('name'=>'periode', 'value' => ($create)?'': $periode->periode )); ?> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="menu">Periode Actived</label>
            <div class="controls">
              <input type="checkbox" name="actived" id="actived" <?php echo ($create) ? '' : ($periode->actived) ? 'checked': '' ?> >
            </div>
          </div>
 
      <center><button class="btn" type="reset">Cancel</button> <button class="btn btn-primary" type="submit">Save</button></center>
      <?php echo form_close(); ?>
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>

