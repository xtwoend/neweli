<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/lib/jquery-ui/css/base/jquery-ui.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/lib/elfinder/css/theme.css'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/lib/elfinder/css/elfinder.min.css'); ?>" />
<script type="text/javascript" src="<?php echo base_url('assets/admin/lib/elfinder/js/elfinder.min.js'); ?>"></script>
    
<div class="header">
            
            <h1 class="page-title">File Manager</h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Filemanager</li>
</ul>

<div class="container-fluid">
    <div class="row-fluid">
   
        <div id="body">
            <div id="elfinder-tag"></div>
        </div>
                    
        <?php echo $template['partials']['footer']; ?>
    </div>
</div>

<script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#elfinder-tag').elfinder({
                url: '<?php echo site_url('admin/filemanager/elfinder_init'); ?>',
            }).elfinder('instance');
        });
</script>
