<div class="header">
            
            <h1 class="dnews-title">Answers of the question</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Answers Question</li>
</ul>

        <div class="container-fluid">
            <div class="row-fluid">
                    

<div class="row-fluid">

<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>

        <h2>The Question : 
          <p><?php echo $question->question ?></p>
        </h2>

        <form class="form-horizontal" method="post">
        <div class="container-fluid">
            <div class="row-fluid">
              <fieldset>
                    <legend>Answer</legend>

                    <div class="control-group">
                       <label class="control-label" for="layout">Answer</label>
                      <div class="controls">
                        <input type="text" class="span10" placeholder="Enter your answer..." id="option" name="option" value="<?php echo ($create) ? '': $option->option; ?>"> 
                      </div>
                    </div>

                    <div class="control-group">
                       <label class="control-label" for="layout">Next Question</label>
                      <div class="controls">
                       <?php echo form_dropdown('next_questions_id', $questions, ($create) ? '': $option->next_questions_id,'class="chzn-select"'); ?>
                      </div>
                    </div>

                    <div class="control-group">
                       <label class="control-label" for="layout">End Question ?</label>
                      <div class="controls">
                        <input type="checkbox" name="end_question" id="end_question" <?php echo ($create) ? '' : ($option->end_question) ? 'checked': '' ?> >
                      </div>
                    </div> 

                    <div class="control-group">
                       <label class="control-label" for="layout">Recommendation Programs</label>
                      <div class="controls">
                       <?php echo form_dropdown('recommendation_id', $programs, ($create) ? '': $option->recommendation_id,'class="chzn-select"'); ?>
                      </div>
                    </div>
                  </fieldset>
            <hr>
            <center><button class="btn" type="reset">Cancel</button> <button class="btn btn-primary" type="submit">Save</button></center>
            </form>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>