<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create News': 'Edit News'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">News</li>
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
            <label class="control-label" for="layout">News Title</label>
            <div class="controls">
              <input type="text" placeholder="Enter News Title..." name="news_title" id="layout" value="<?php echo ($create) ? '': $news->news_title; ?>"> 
            </div>
          </div>
          <div class="control-group">
              <label for="start_date" class="control-label">Start Event's</label>              
              <div class="controls">
			  <div id="datetimepicker1" class="input-append">
				<input data-format="yyyy-MM-dd HH:mm:ss" size="3" type="text" placeholder="Enter start event" name="start_date" value="<?php echo ($create) ? '': $news->start_date ?>" style="width: 160px;"></input>
				<span class="add-on">
				  <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
				</span>
			  </div> -	
			  <div id="datetimepicker2" class="input-append" >
				<input data-format="yyyy-MM-dd HH:mm:ss" type="text" placeholder="Enter End event" name="end_date" value="<?php echo ($create) ? '': $news->end_date ?>" style="width: 160px;"></input>
				<span class="add-on">
				  <i data-time-icon="icon-time" data-date-icon="icon-calendar"> </i>
				</span>
			  </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="is_home">Full Day Event</label>
            <div class="controls">
              <input type="checkbox" name="fullday" id="is_home" <?php echo ($create) ? '' : ($news->fullday) ? 'checked': '' ?> >
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
              <label class="control-label" for="article-title">Article Title</label>
              <div class="controls">
                <input type="text" placeholder="Enter Article Title Content..." name="article_title_<?php echo $lang->lang;?>" id="title_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->title : $news_all[0]->title) ?>"> 
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="sub-article-title">Sub Article Title</label>
              <div class="controls">
                <input type="text" name="sub_article_<?php echo $lang->lang;?>" id="online" placeholder="Enter Sub Article Content..." value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->subtitle : $news_all[0]->subtitle) ?>">
              </div>
            </div>
			
			<div class="control-group">
                <label class="control-label" for="url_id">Url</label>
                <div class="controls">
                  <input type="text" name="url_<?php echo $lang->lang;?>" id="url_<?php echo $lang->lang;?>" class="url_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': (($lang->lang)== 'id' ? $news_all[1]->url : $news_all[0]->url) ?>">
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
            <?php foreach($language as $lang) :?>
                $('.url_<?php echo $lang->lang;?>').slugify('#title_<?php echo $lang->lang;?>');	
            <?php endforeach; ?>
        });
    </script>
	<script type="text/javascript">
	$(document).ready(function(){	  
	  $('#datetimepicker1, #datetimepicker2 ').datetimepicker();
	});
  </script>

   

