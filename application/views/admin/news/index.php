<div class="header">
            
            <h1 class="dnews-title">News & Event</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">News</li>
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
    <?php echo anchor('admin/news/add','Tambah Event','class="btn btn-primary"')?>
    <div class="block">
        <a href="#dnews-stats" class="block-heading" data-toggle="collapse">Events</a>
        <div id="dnews-stats" class="block-body collapse in">
            <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Article Title</th>
                            <th>Start Event's</th>
                            <th>End Event</th>
                            <th>Full Day Event</th>                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
						// print_r($news); 
						if($news){ ?>
                        <?php foreach($news as $dnews) : ?>
                            <tr>

                                <td><?php echo $dnews->news_title ?></td>                               
                                <td><?php echo $dnews->start_date ?></td>
                                <td><?php echo $dnews->end_date ?></td>
                                <td><?php echo $dnews->fullday ? "Yes" : "No"; ?></td>
                                <td><?php echo anchor('admin/news/edit/'.$dnews->id,'Edit','class="btn btn-mini btn-primary"')?>
                                    <?php echo anchor('admin/news/remove/'.$dnews->id,'Delete',array('class' => "btn btn-mini btn-warning", 'onclick' => "return confirm('yakin data mau dihapus??')"))?>
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