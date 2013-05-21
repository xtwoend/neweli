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
              <input type="text" placeholder="Enter News Title..." name="news_title" id="layout" value="<?php echo ($create) ? '': $page->parent ?>"> 
            </div>
          </div>
          <div class="control-group">
              <label for="start_date" class="control-label">Start Event's</label>              
              <div class="controls">
                <input placeholder="Enter start event" id="start_date" class="input-medium hasDatepicker" type="text" name="start_date">           -
              
                <input placeholder="Enter start event" id="end_date" class="input-medium hasDatepicker" type="text" name="end_date">   
              </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="is_home">Full Day Event</label>
            <div class="controls">
              <input type="checkbox" name="fullday" id="is_home">
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
              <label class="control-label" for="layout">Article Title</label>
              <div class="controls">
                <input type="text" placeholder="Enter Article Title Content..." name="article_title_<?php echo $lang->lang;?>" id="article_title_<?php echo $lang->lang;?>" value="<?php echo ($create) ? '': $page->parent ?>"> 
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="online">Sub Article Title</label>
              <div class="controls">
                <input type="text" name="sub_article_<?php echo $lang->lang;?>" id="online" placeholder="Enter Sub Article Content..." >
              </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="content_<?php echo $lang->lang;?>">Title</label>
                <div class="controls">                 
                  <textarea placeholder="Enter Article Content..." class="span12" rows="10" cols="50"  name="content_<?php echo $lang->lang;?>" id="content_<?php echo $lang->lang;?>"></textarea>
                </div>
            </div>

            <hr>
            <h4>SEO</h4>
            <div class="control-group">
                <label class="control-label" for="meta_title_<?php echo $lang->lang;?>">Title</label>
                <div class="controls">
                  <input type="text" name="meta_title_<?php echo $lang->lang;?>" id="meta_title_<?php echo $lang->lang;?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_description_<?php echo $lang->lang;?>">Description</label>
                <div class="controls">
                  <input type="text" name="meta_description_<?php echo $lang->lang;?>" id="meta_description_<?php echo $lang->lang;?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_keywords_<?php echo $lang->lang;?>">Keywords</label>
                <div class="controls">
                  <input type="text" name="meta_keywords_<?php echo $lang->lang;?>" id="meta_keywords_<?php echo $lang->lang;?>">
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
   

