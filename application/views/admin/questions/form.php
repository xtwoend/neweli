<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Question': 'Edit Question'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Questions</li>
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
      <fieldset>
            <legend>Question</legend>

            <div class="control-group">
               <label class="control-label" for="layout">Question</label>
              <div class="controls">
                <input type="text" class="span10" placeholder="Enter your question..." id="question" name="question" value="<?php echo ($create) ? '': $question->question; ?>"> 
              </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="layout">Language</label>
              <div class="controls">
               <?php echo form_dropdown('lang', $optionslang, ($create) ? '': $question->lang); ?>
              </div>
            </div>

            <div class="control-group">
               <label class="control-label" for="layout">Starting Question</label>
              <div class="controls">
                <input type="checkbox" name="starting" id="starting" <?php echo ($create) ? '' : ($question->starting) ? 'checked': '' ?> >
              </div>
            </div> 

    
          </fieldset>
    <hr>
    <center><button class="btn" type="reset">Cancel</button> <button class="btn btn-primary" type="submit">Save</button></center>
    </form>
    <?php echo $template['partials']['footer']; ?>       
    </div>
</div>

   

