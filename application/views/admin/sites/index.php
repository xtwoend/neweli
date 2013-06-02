<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Page': 'Edit Setting'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Site</li>
</ul>

<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>
<form class="form-horizontal" method="post">
<div class="container-fluid">
    <div class="row-fluid">   		
          <div class="control-group">
            <label class="control-label" for="layout">Site Name:</label>
            <div class="controls">
              <input type="text" name="sites[1]" id="layout" value="<?php echo ($create) ? '': $sites[0]->value ?>">                 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Description Name:</label>
            <div class="controls">
			  <textarea id="textearea-editor" name="sites[2]" rows="10" cols="50"><?php echo ($create) ? '': $sites[1]->value ?></textarea>
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Phone:</label>
            <div class="controls">
              <input type="text" name="sites[3]" id="layout" value="<?php echo ($create) ? '': $sites[2]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Fax:</label>
            <div class="controls">
              <input type="text" name="sites[12]" id="layout" value="<?php echo ($create) ? '': $sites[11]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Facebook Link:</label>
            <div class="controls">
              <input type="text" name="sites[4]" id="layout" value="<?php echo ($create) ? '': $sites[3]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Twitter Link:</label>
            <div class="controls">
              <input type="text" name="sites[5]" id="layout" value="<?php echo ($create) ? '': $sites[4]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Address:</label>
            <div class="controls">
              <textarea id="textearea-editor" name="sites[6]" rows="10" cols="50"><?php echo ($create) ? '': $sites[5]->value ?></textarea>
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Date Format:</label>
            <div class="controls">
              <input type="text" name="sites[7]" id="layout" value="<?php echo ($create) ? '': $sites[6]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Default Langue:</label>
            <div class="controls">
              <input type="text" name="sites[8]" id="layout" value="<?php echo ($create) ? '': $sites[7]->value ?>"> 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Google Analytics ID:</label>
            <div class="controls">
              <input type="text" name="sites[9]" id="layout" value="<?php echo ($create) ? '': $sites[8]->value ?>"> 
            </div>
          </div>
        
       <button class="btn btn-primary" type="submit">Save</button>
    </div>
    </form>
    <?php echo $template['partials']['footer']; ?>       
    </div>


    
    <script type="text/javascript">
        $(function () {
            <?php foreach($language as $lang) :?>
            $('.url_<?php echo $lang->lang;?>').slugify('#title_<?php echo $lang->lang;?>');
             <?php endforeach; ?>
        });
    </script>
   

