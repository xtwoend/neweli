<div class="header">
            
            <h1 class="page-title">List User Registers</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">User Registers</li>
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
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">User Registers</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telp</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($registers as $register) : ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $register->first_name; ?> <?php echo $register->last_name; ?></td>
                                <td><?php echo $register->mobile_phone ?></td>
                                <td><?php echo $register->email ?></td>
                                <td><?php echo anchor('admin/registers/detail/'.$register->id,'Detail','class="btn btn-mini btn-primary"')?>
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

