<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Page': 'Edit Page'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Page</li>
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
            <label class="control-label" for="menu">Menu</label>
            <div class="controls">
              <?php echo form_dropdown('menu_id', $optionmenus, ($create) ? '': $page->menu_id,'id="menu"'); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="parent">Parent</label>
            <div class="controls">
              <?php echo form_dropdown('parent', $optionparents,  ($create) ? '': $page->parent ,'id="parent" class="chzn-select"'); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="title">Page Name</label>
            <div class="controls">
              <input type="text" name="title" id="page_title" value="<?php echo ($create) ? '': $page->title ?>"> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="url">Url Page</label>
            <div class="controls">
              <input type="text" name="url" id="url" class="url" value="<?php echo ($create) ? '': $page->url ?>"> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="layout">View</label>
            <div class="controls">
              <input type="text" name="layout" id="layout" value="<?php echo ($create) ? '': $page->layout ?>"> 
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="online">Page Online ?</label>
            <div class="controls">
              <?php echo form_checkbox('publish', '1', ($create) ? '': ($page->publish == 1)? TRUE: FALSE ); ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="is_home">Home ?</label>
            <div class="controls">
              <?php echo form_checkbox('is_home', '1', ($create) ? '': ($page->is_home == 1)? TRUE: FALSE ); ?>
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
        <?php 
          if(!$create){
            $pagelang = $this->page_lang->find(array('page_id'=> $page->id, 'lang' => $lang->lang )); 
          }
        ?>
        
        <div class="tab-pane <?php echo ($lang->default == 1) ? 'active': ''; ?> in" id="<?php echo $lang->lang;?>">
        
        <h4>Page in <?php echo $lang->language;?></h4>
        
            <div class="control-group">
                <label class="control-label" for="title_<?php echo $lang->lang;?>">Title</label>
                <div class="controls">
                  <input type="text" name="title_<?php echo $lang->lang;?>" id="title_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->title ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="subtitle_<?php echo $lang->lang;?>">Subtitle</label>
                <div class="controls">
                  <input type="text" name="subtitle_<?php echo $lang->lang;?>" id="subtitle_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->subtitle ?>">
                </div>
            </div>
            <!--
            <div class="control-group">
                <label class="control-label" for="url_<?php echo $lang->lang;?>">Url</label>
                <div class="controls">
                  <input type="text" name="url_<?php echo $lang->lang;?>" id="url_<?php echo $lang->lang;?>" class="url_<?php echo $lang->lang;?>">
                </div>
            </div>
            -->
            <div class="control-group">
                <label class="control-label" for="nav_title_<?php echo $lang->lang;?>">Navigation title</label>
                <div class="controls">
                  <input type="text" name="nav_title_<?php echo $lang->lang;?>" id="nav_title_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->nav_title ?>">
                </div>
            </div>
            <hr>
            <h4>SEO</h4>
            <div class="control-group">
                <label class="control-label" for="meta_title_<?php echo $lang->lang;?>">Title</label>
                <div class="controls">
                  <input type="text" name="meta_title_<?php echo $lang->lang;?>" id="meta_title_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->meta_title ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_description_<?php echo $lang->lang;?>">Description</label>
                <div class="controls">
                  <input type="text" name="meta_description_<?php echo $lang->lang;?>" id="meta_description_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->meta_description ?>">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="meta_keywords_<?php echo $lang->lang;?>">Keywords</label>
                <div class="controls">
                  <input type="text" name="meta_keywords_<?php echo $lang->lang;?>" id="meta_keywords_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $pagelang->meta_keywords ?>">
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
            
            $('.url').slugify('#page_title');
        });
</script>