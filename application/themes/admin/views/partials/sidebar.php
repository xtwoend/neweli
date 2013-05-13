
<div class="sidebar-nav">
        <a href="#main-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>CMS</a>
        
        <ul id="main-menu" class="nav nav-list collapse in">
              <li class="<?php echo ( $this->uri->segment(2) == 'dashboard'  ? 'active' : false )?>"><a href="<?php echo site_url('admin/dashboard')?>"><i class="icon-home"></i> Dashboard</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'menus' ? 'active' : false )?>"><a href="<?php echo site_url('admin/menus')?>"><i class="icon-align-justify"></i> Menu</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'pages' ? 'active' : false )?>"><a href="<?php echo site_url('admin/pages')?>"><i class="icon-list-alt"></i> Page</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'sections' ? 'active' : false )?>"><a href="<?php echo site_url('admin/sections')?>"><i class="icon-file"></i> Section</a></li>
        </ul>

        <a href="#modul-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Module</a>
        <ul id="modul-menu" class="nav nav-list collapse in">
              <li class="<?php echo ( $this->uri->segment(2) == 'news' ? 'active' : false )?>"><a href="<?php echo site_url('admin/news')?>"><i class="icon-calendar"></i> News & Events </a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'sliders' ? 'active' : false )?>"><a href="<?php echo site_url('admin/sliders')?>"><i class="icon-th-large"></i> Banner Slider</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'programs' ? 'active' : false )?>"><a href="<?php echo site_url('admin/programs')?>"><i class="icon-th-large"></i> Programs</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'questions' ? 'active' : false )?>"><a href="<?php echo site_url('admin/questions')?>"><i class="icon-th-large"></i> Leading Questions</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'registers' ? 'active' : false )?>"><a href="<?php echo site_url('admin/registers')?>"><i class="icon-th-large"></i> User Registers</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'posts' ? 'active' : false )?>"><a href="<?php echo site_url('admin/posts')?>"><i class="icon-list-alt"></i> Posts</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'galleries' ? 'active' : false )?>"><a href="<?php echo site_url('admin/galleries')?>"><i class="icon-camera"></i> Galleries</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'images' ? 'active' : false )?>"><a href="<?php echo site_url('admin/images')?>"><i class="icon-picture"></i> Images</a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'filemanager' ? 'active' : false )?>"><a href="<?php echo site_url('admin/filemanager')?>"><i class="icon-folder-open"></i> File Managers</a></li>
              
        </ul>

              

        <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account</a>
        <ul id="accounts-menu" class="nav nav-list collapse in">
              <li class="<?php echo ( $this->uri->segment(2) == 'users' ? 'active' : false )?>"><a href="<?php echo site_url('admin/users')?>"><i class="icon-user"></i> Users</a></li>
        </ul>
        <a href="#setting-menu" class="nav-header" data-toggle="collapse"><i class="icon-wrench"></i></i>Setting</a>
        <ul id="setting-menu" class="nav nav-list collapse in">
              <li class="<?php echo ( $this->uri->segment(2) == 'sites' ? 'active' : false )?>"><a href="<?php echo site_url('admin/sites')?>"><i class="icon-user"></i> Site </a></li>
              <li class="<?php echo ( $this->uri->segment(2) == 'email' ? 'active' : false )?>"><a href="<?php echo site_url('admin/email')?>"><i class="icon-user"></i> Email</a></li>
        </ul>
    </div>