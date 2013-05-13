<div class="header">
            
            <h1 class="page-title">List Menu</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Menu</li>
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
    <?php echo anchor('admin/menus/add','Tambah Menu','class="btn btn-primary"')?>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Menu</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Menu</th>
                            <th>Posisi Menu</th>
                            <th>Urutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($menus as $menu) : ?>
                            <tr>
                                <td><?php echo $menu->id ?></td>
                                <td><?php echo $menu->name ?></td>
                                <td><?php echo $menu->layout ?></td>
                                <td><?php echo $menu->ordering ?></td>
                                <td><?php echo anchor('admin/menus/edit/'.$menu->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/menus/remove/'.$menu->id,'Delete','class="btn btn-mini btn-warning"')?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>            
        </div>
    </div>
</div>
                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>