<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Banner Slider': 'Edit Banner Slider'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Slide</li>
</ul>

<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>

<form class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="container-fluid">    
    <div class="row-fluid">

    <ul class="nav nav-tabs">
        <?php foreach($language as $lang) :?>
        <li <?php  echo ($lang->default == 1) ? 'class="active"': ''; ?> >  <a href="#<?php echo $lang->lang;?>" data-toggle="tab"><?php echo $lang->language;?></a></li>
        <?php endforeach; ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <?php $index = 0; foreach($language as $lang) :?>
        <div class="tab-pane <?php echo ($lang->default == 1) ? 'active': ''; ?> in" id="<?php echo $lang->lang;?>">
        
        <h4>Slide in <?php echo $lang->language;?></h4>
            <div class="control-group">
                <label class="control-label" for="title_<?php echo $lang->lang;?>">Banner Title</label>
                <div class="controls">
                  <input type="text" name="title_<?php echo $lang->lang;?>" id="title_<?php echo $lang->lang;?>"  value="<?php echo ($create) ? '': $slide_all[$index]->title ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="link_<?php echo $lang->lang;?>">Banner link</label>
                <div class="controls">
                  <input type="text" name="link_<?php echo $lang->lang;?>" id="link_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': $slide_all[$index]->link ?>">
                </div>
            </div>
        </div>
        <?php $index++;  endforeach; ?>
		<div class="control-group">
			<label class="control-label" for="expire_<?php echo $lang->lang;?>">Expire</label>
				<div class="controls">
					<div class="input-append date" >
						<input data-format="yyyy-MM-dd HH:mm:ss" type="text" placeholder="Enter Expired Image" name="expired_at" value="<?php echo ($create) ? '': $slide->expired_at ?>" style="width: 175px;"></input>
							<span class="add-on">
							<i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
							</span>
					</div>
                </div>
		</div>
			
    </div>
    <?php  $indexx = 0;  foreach($language as $lang) :?>
	<hr>
            <h4>Upload Image <?php  echo $lang->language;?></h4>
            <div class="row">
              <div class="span5">
                <div class="control-group">
                  <label for="content" class="control-label">Upload Image</label>              
                  <div class="controls">
                    <?php echo form_upload('banner_'.$lang->lang) ?>
                  </div>
                </div>
              </div>
              <div class="span7">
                <?php if(!$create){ ?>
                <img width="30%" src="<?php echo base_url() ?>file/banners/<?php echo $lang->lang;?>/<?php echo $slide_all[$indexx]->img_src ?>">
                <?php } ?>
                </div>
            </div>
    			
    <?php $indexx++;  endforeach; ?>
    <hr>
    <center><button class="btn" type="reset">Cancel</button> <button class="btn btn-primary" type="submit">Save</button></center>
    </form>
    <?php echo $template['partials']['footer']; ?>       
    </div>
</div>


    
    <script type="text/javascript">
        $(function () {
            <?php foreach($language as $lang) :?>
            $('.url_<?php echo $lang->lang;?>').slugify('#title_<?php echo $lang->lang;?>');
             <?php endforeach; ?>
			$('.date').datetimepicker();
        });
    </script>

