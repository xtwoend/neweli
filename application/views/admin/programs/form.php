<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Program': 'Edit Program'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Programs</li>
</ul>

<?php if($this->session->flashdata('message')){ ?>
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <?php echo $this->session->flashdata('message') ?>
</div>
<?php } ?>

<form class="form-horizontal" method="post">
<div class="container-fluid">
    <div class="row-fluid">            
          <div class="control-group">
            <label class="control-label" for="layout">Program Name</label>
            <div class="controls">
              <input type="text" placeholder="Enter Program name..." id="program" name="program" id="layout" value="<?php echo ($create) ? '': $news->program; ?>"> 
            </div>
          </div>
          <div class="control-group">
                <label class="control-label" for="url">Url</label>
                <div class="controls">
                  <input type="text" name="url" id="url" class="url" value="<?php echo ($create) ? '': $news->url ?>">
                </div>
          </div> 
    </div>
    <div class="row-fluid">

    <ul class="nav nav-tabs">
        <?php foreach($language as $lang) :?>
        <li <?php echo ($lang->default == 1) ? 'class="active"': ''; ?> >  <a href="#<?php echo $lang->lang;?>" data-toggle="tab"><?php echo $lang->language;?></a></li>
        <?php endforeach; ?>
    </ul>
    <div id="myTabContent" class="tab-content">
        <?php foreach($language as $lang) :?>
        <div class="tab-pane <?php echo ($lang->default == 1) ? 'active': ''; ?> in" id="<?php echo $lang->lang;?>">
        
        <h4>Page in <?php echo $lang->language;?></h4>
            <div class="control-group">
              <label class="control-label" for="article-title">Post Title</label>
              <div class="controls">
                <input type="text" placeholder="Enter Article Title Content..." name="article_title_<?php echo $lang->lang;?>" id="title_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->title : $news_all[0]->title) ?>"> 
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="sub-article-title">Sub Post Title</label>
              <div class="controls">
                <input type="text" name="sub_article_<?php echo $lang->lang;?>" id="online" placeholder="Enter Sub Article Content..." value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->subtitle : $news_all[0]->subtitle) ?>">
              </div>
            </div>
			
			
			
            <div class="control-group">
                <label class="control-label" for="content_<?php echo $lang->lang;?>">Content</label>
                <div class="controls">                 
                  <textarea placeholder="Enter Article Content..." class="ckeditor span12"rows="10" cols="50"  name="content_<?php echo $lang->lang;?>" id="textearea-editor_<?php echo $lang->lang;?>"><?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->content : $news_all[0]->content) ?></textarea>
                </div>
            </div>

            <hr>
            <h4>SEO</h4>
            <div class="control-group">
                <label class="control-label" for="meta_title_<?php echo $lang->lang;?>">Meta Title</label>
                <div class="controls">
                  <input type="text" name="meta_title_<?php echo $lang->lang;?>" id="meta_title_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->meta_title : $news_all[0]->meta_title) ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_description_<?php echo $lang->lang;?>">Meta Description</label>
                <div class="controls">
                  <input type="text" name="meta_description_<?php echo $lang->lang;?>" id="meta_description_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->meta_description : $news_all[0]->meta_description) ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_keywords_<?php echo $lang->lang;?>">Meta Keywords</label>
                <div class="controls">
                  <input type="text" name="meta_keywords_<?php echo $lang->lang;?>" id="meta_keywords_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->meta_keywords : $news_all[0]->meta_keywords) ?>">
                </div>
            </div>

           

        </div>
        <?php endforeach; ?>
    </div>
    <hr>
    <center><button class="btn" type="reset">Cancel</button> <button class="btn btn-primary" type="submit">Save</button></center>
    </form>
    <?php echo $template['partials']['footer']; ?>       
    </div>
</div>


    
    <script type="text/javascript">
        $(function () {
            $('.url').slugify('#news_title');	
        });
    </script>
	<script type="text/javascript">
	$(document).ready(function(){	  
	  $('#datetimepicker1, #datetimepicker2 ').datetimepicker();
	});
  </script>

   

