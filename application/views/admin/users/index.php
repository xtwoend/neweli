<div class="header">
            
            <h1 class="page-title">List Users</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Users</li>
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
    <?php echo anchor('admin/users/add','Tambah User','class="btn btn-primary"')?>
    <div class="block">
        <a href="#page-stats" class="block-heading" data-toggle="collapse">Menu</a>
        <div id="page-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Admin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user) : ?>
                            <tr>
                                <td><?php echo $user->username ?></td>
                                <td><?php echo $user->first_name. ' ' . $user->last_name ?></td>
                                <td><?php echo ($user->admin == 1)? 'admin' : 'user' ?></td>
                                <td><?php echo anchor('admin/users/edit/'.$user->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/users/remove/'.$user->id,'Delete','class="btn btn-mini btn-warning"')?>
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

