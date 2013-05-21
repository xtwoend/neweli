<div class="navbar">
        <div class="navbar-inner">
                <ul class="nav pull-right">
                    <?php if($this->authentication->is_loggedin()): ?>
                    
                    <li id="fat-menu" class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> <?php echo $this->authentication->get_fullname(); ?>
                            <i class="icon-caret-down"></i>
                        </a>

                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">My Account</a></li>
                            <li class="divider"></li>
                            <li class="divider visible-phone"></li>
                            <li><a tabindex="-1" href="<?php echo site_url('auth/logout')?>">Logout</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <a class="brand" href=""><span class="first">Admin</span> <span class="second">Prasetiya Mulya</span></a>
        </div>
</div>
