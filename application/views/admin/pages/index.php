<div class="header">
            
            <h1 class="page-title">List Pages</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Page</li>
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
    <?php echo anchor('admin/pages/add','Tambah Halaman','class="btn btn-primary"')?>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Pages</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Menu</th>
                            <th>Order</th>
                            <th>View</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($pages){ ?>
                        <?php foreach($pages as $page) : ?>
                            <tr>

                                <td><?php echo $page->page_name ?></td>
                                <td><?php echo $this->menu->find(array('id'=>$page->menu_id))->name ?></td>
                                <td><?php echo $page->order ?></td>
                                <td><?php echo $page->layout ?></td>
                                <td><?php echo anchor('admin/pages/edit/'.$page->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/pages/remove/'.$page->id,'Delete','class="btn btn-mini btn-warning"')?>
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