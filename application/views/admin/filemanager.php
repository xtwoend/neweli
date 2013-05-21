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
       <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                var elf = $("#elfinder").elfinder({
                    // lang: 'ru',             // language (OPTIONAL)
                    url : "<?php echo site_url('admin/filemanager/elfinder_init'); ?>"  // connector URL (REQUIRED)
                }).elfinder("instance");            
            });
        </script>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>



    </div>

                
   



                    
                    <?php echo $template['partials']['footer']; ?>
                    
            </div>
        </div>
    </div>
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url() ?>assets/admin/lib/css/elfinder.min.css">
<script type="text/javascript" src="<?php echo base_url() ?>assets/admin/lib/elfinder/js/elfinder.min.js"></script>
