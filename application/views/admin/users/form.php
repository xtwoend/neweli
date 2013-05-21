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
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Users</a>
        <div id="page-stats" class="block-body collapse in">
           
      <?php echo form_open(current_url()); ?>

      <?php echo form_hidden('id', ($create)?'': $user->id ); ?>

        <div class="control-group">
            <label class="control-label" for="menu">Username</label>
            <div class="controls">
              <?php echo form_input(array('name'=>'username', 'value' => ($create)?'': $user->username )); ?> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="menu">Email</label>
            <div class="controls">
              <?php echo form_input(array('name'=>'email', 'value' => ($create)?'': $user->email )); ?> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="menu">First Name</label>
            <div class="controls">
              <?php echo form_input(array('name'=>'first_name', 'value' => ($create)?'': $user->first_name )); ?> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="menu">Last Name</label>
            <div class="controls">
              <?php echo form_input(array('name'=>'last_name', 'value' => ($create)?'': $user->last_name )); ?> 
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="menu">Password</label>
            <div class="controls">
              <?php echo form_password(array('name'=>'password', 'value' => '' )); ?> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="menu">Confirme Password</label>
            <div class="controls">
              <?php echo form_password(array('name'=>'confrim', 'value' => '')); ?> 
            </div>
          </div>
      <?php echo form_submit('mysubmit', 'save'); ?>
      <?php echo form_close(); ?>
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>

