<div class="header">        
    <h1 class="page-title"><?php echo ($create) ? 'Create Section': 'Edit Section'; ?> </h1>
</div>
        
<ul class="breadcrumb">
    <li><a href="<?php echo site_url('admin/dashboard'); ?>">Home</a> <span class="divider">/</span></li>
    <li class="active">Section</li>
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
            <label class="control-label" for="page_id">Parent</label>
            <div class="controls">
              <?php echo form_dropdown('page_id', $optionpages,  ($create) ? '': $section->page_id ,'id="page_id" class="chzn-select"'); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="section_name">Section Name</label>
            <div class="controls">
              <input type="text" name="section_name" id="section_name" value="<?php echo ($create) ? '': $section->section_name ?>"> 
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
            $sectionlang = $this->section_lang->find(array('section_id'=> $section->id, 'lang' => $lang->lang )); 
          }
        ?>
        
        <div class="tab-pane <?php echo ($lang->default == 1) ? 'active': ''; ?> in" id="<?php echo $lang->lang;?>">
        
        <h4>Section Content in <?php echo $lang->language;?></h4>
        
            <div class="control-group">
                <label class="control-label" for="title_<?php echo $lang->lang;?>">Title</label>
                <div class="controls">
                  <input type="text" name="title_<?php echo $lang->lang;?>" id="title_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $sectionlang->title ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="subtitle_<?php echo $lang->lang;?>">Subtitle</label>
                <div class="controls">
                  <input type="text" name="subtitle_<?php echo $lang->lang;?>" id="subtitle_<?php echo $lang->lang;?>" value="<?php echo ($create)? '': $sectionlang->subtitle ?>">
                </div>
            </div>
            
            <div class="control-group">
                <label class="control-label" for="content_<?php echo $lang->lang;?>">Article</label>
                <div class="controls">
                  <textarea rows="10" name="content_<?php echo $lang->lang;?>" id="textearea-editor_<?php echo $lang->lang;?>" class="span12"><?php echo ($create)? '': $sectionlang->content ?></textarea>
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
                $('#textearea-editor_<?php echo $lang->lang;?>').wysihtml5({
                  "html": true, //Button which allows you to edit the generated HTML. Default false
                });
             <?php endforeach; ?>
            
            $('.url').slugify('#page_title');
        });
</script>