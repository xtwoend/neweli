<div class="header">
            
            <h1 class="dnews-title">Leading Questions</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Questions</li>
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
    <?php echo anchor('admin/questions/add','Tambah Pertanyaan','class="btn btn-primary"')?>
    <div class="block">
        <a href="#dnews-stats" class="block-heading" data-toggle="collapse">Questions</a>
        <div id="dnews-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Lang</th>
                            <th>Question</th> 
                            <th>Starting</th>                        
                            <th>Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						if($questions){ ?>
                        <?php foreach($questions as $question) : ?>
                            <tr>

                                <td><?php echo $question->id ?></td>                               
                                <td><?php echo $question->lang ?></td>
                                <td><?php echo $question->question ?></td>
                                <td><?php echo ($question->starting ==1) ? 'Yes':'No'; ?></td>
                                <td>
                                    <?php $options = $this->mquestionoptions->get('id,option' , $where = array('question_id'=>$question->id)); ?>
                                    <?php $no = 1; foreach($options as $option): ?>
                                        <?php echo $no.') '. $option->option.'<br>'; ?>
                                    <?php $no++; endforeach; ?>
                                </td>
                                <td>
                                    <?php echo anchor('admin/questions/answers/'.$question->id,'Answers','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/questions/edit/'.$question->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/questions/remove/'.$question->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
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