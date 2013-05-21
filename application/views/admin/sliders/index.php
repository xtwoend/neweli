<div class="header">
            
            <h1 class="page-title">List Sliders</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Sliders</li>
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
    <?php echo anchor('admin/sliders/add','Add Slide','class="btn btn-primary"')?>
    <div class="block">
	<a href="#page-stats" class="block-heading" data-toggle="collapse">Sliders</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <!--<th>Links</th>
                            <th>lang</th> -->
                            <th>Created</th>
                            <th>Update</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($sliders){ ?>
                        <?php foreach($sliders as $result) : ?>
                            <tr>
                                <td><?php echo $result->title ?></td>
                                <!--<td><?php echo $result->link ?></td>
                                <td><?php echo $result->lang ?></td>-->
                                <td><?php echo $result->created_at ?></td>
                                <td><?php echo $result->updated_at ?></td>
                                <td><?php echo anchor('admin/sliders/edit/'.$result->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/sliders/remove/'.$result->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
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