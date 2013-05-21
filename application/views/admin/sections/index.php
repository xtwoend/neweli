<div class="header">
            
            <h1 class="page-title">List Section</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Section</li>
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
    <?php echo anchor('admin/sections/add','Tambah Halaman','class="btn btn-primary"')?>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Section</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Section Name</th>
                            <th>Page Name</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($sections){ ?>
                        <?php foreach($sections as $section) : ?>
                            <tr>

                                <td><?php echo $section->section_name ?></td>
                                <td><?php echo $this->page->find(array('id'=>$section->page_id))->title ?></td>
                                
                                <td><?php echo anchor('admin/sections/edit/'.$section->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/sections/remove/'.$section->id,'Delete','class="btn btn-mini btn-warning"')?>
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