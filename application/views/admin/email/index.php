<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Page': 'Edit Email'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Email</li>
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
            <label class="control-label" for="layout">Server SMTP:</label>
            <div class="controls">
              <input type="text" name="sites[13]" id="layout" value="<?php echo ($create) ? '': $sites[12]->value ?>">                 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="layout">SMTP Port:</label>
            <div class="controls">
              <input type="text" name="sites[14]" id="layout" value="<?php echo ($create) ? '': $sites[13]->value ?>">                 
            </div>
          </div>   		
          <div class="control-group">
            <label class="control-label" for="layout">Email :</label>
            <div class="controls">
              <input type="text" name="sites[10]" id="layout" value="<?php echo ($create) ? '': $sites[9]->value ?>">                 
            </div>
          </div>
		  <div class="control-group">
            <label class="control-label" for="layout">Password:</label>
            <div class="controls">
				<input type="password" name="sites[11]" id="layout" value="<?php echo ($create) ? '': $sites[10]->value ?>">      
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
   

