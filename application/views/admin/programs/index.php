<div class="header">
            
            <h1 class="page-title">List Programs</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Programs</li>
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
     <?php echo anchor('admin/programs/add','Add Program','class="btn btn-primary"')?>
    <div class="block">  
    <a href="#page-stats" class="block-heading" data-toggle="collapse">Programs</a> 
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                           <!-- <th>Lang</th> -->
                            <th>Program</th>
                            <th>Parent</th>      
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($programs){ ?>
                        <?php foreach($programs as $result) : ?>
                            <tr>
                                <td><?php echo $result->program ?></td>
                                <td><?php echo $result->parent ?></td>
                                <td><?php echo $result->price ?></td>
                                <td><?php echo anchor('admin/programs/edit/'.$result->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/programs/remove/'.$result->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
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