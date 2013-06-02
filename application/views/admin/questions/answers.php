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

    <?php echo anchor('admin/questions/addanswer/'.$question->id,'Tambah Pertanyaan','class="btn btn-primary"')?>
    <div class="block">
        <a href="#dnews-stats" class="block-heading" data-toggle="collapse">Questions</a>
        <div id="dnews-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Options</th>
                            <th>Next Question</th>
                            <th>End Question</th> 
                            <th>Recommenation id</th>                        
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
            if($options){ ?>
                        <?php foreach($options as $option) : ?>
                            <tr>

                                <td><?php echo $option->option ?></td>                               
                                <td><?php 
                                $q = $this->mquestions->find(array('id'=>$option->next_questions_id));
                                echo ($q) ? $q->question : ''; ?></td>
                                <td><?php echo ($option->end_question ==1) ? 'Yes':'No'; ?></td>
                                <td><?php echo $option->recommendation_id ?></td>
                                <td>
                                    <?php echo anchor('admin/questions/editanswer/'.$option->id.'/'.$question->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/questions/removeanswer/'.$option->id.'/'.$question->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php }else{ ?>
                        <tr>
                                <td colspan="5">empty</td>
                                
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>            
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>