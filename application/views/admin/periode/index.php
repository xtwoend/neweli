<div class="header">
            
            <h1 class="page-title">List Periode</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Periode</li>
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
    <?php echo anchor('admin/periode/add','Tambah User','class="btn btn-primary"')?>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Menu</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Range Periode</th>
                            <th>Active</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($periodes as $periode) : ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $periode->periode; ?></td>
                                <td><?php echo ($periode->actived == 1)? 'Yes' : 'No' ?></td>
                                <td><?php echo anchor('admin/periode/edit/'.$periode->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/periode/remove/'.$periode->id,'Delete','class="btn btn-mini btn-warning"')?>
                                </td>
                            </tr>
                        <?php $no++; endforeach; ?>
                    </tbody>
                </table>            
        </div>
    </div>
</div>
                     
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>

