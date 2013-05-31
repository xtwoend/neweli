<div class="header">
            
            <h1 class="dnews-title">Blogs</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Blogs</li>
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
    <?php echo anchor('admin/posts/add','Tambah Posting','class="btn btn-primary"')?>
    <div class="block">
        <a href="#dnews-stats" class="block-heading" data-toggle="collapse">Blogs</a>
        <div id="dnews-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Posting Name</th>
                            <th>Create by</th>
                            <th>Create at</th>                       
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						// print_r($news); 
						if($posts){ ?>
                        <?php foreach($posts as $post) : ?>
                            <tr>

                                <td><?php echo $post->post_name ?></td>                               
                                <td><?php echo $this->authentication->get_fullname($post->created_by); ?></td>
                                <td><?php echo $post->created_at ?></td>
                                <td><?php echo anchor('admin/posts/edit/'.$post->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/posts/remove/'.$post->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
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