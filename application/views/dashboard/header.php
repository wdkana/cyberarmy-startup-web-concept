<div class="navbar navbar-inverse bg-indigo-700">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url();?>assets/material/images/logo.png" alt="">
        </a>
        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li>
                <a data-toggle="collapse" data-target="#navbar-mobile">
                    <i class="icon-tree5"></i>
                </a>
            </li>
            <li>
                <a class="sidebar-mobile-main-toggle">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <?php if($this->session->userdata('foto')==null){ ?>
                    <img src="<?php echo base_url();?>assets/img/default-avatar.png" alt="">
                    <?php } else { ?>
                    <img src="<?php echo base_url('assets/img/'.$this->session->userdata('foto'));?>" alt="">
                    <?php }?>
                    <span>
                        <?php echo strtoupper($this->session->userdata('username'));?>
                    </span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a href="<?php echo site_url('user/profile');?>">
                            <i class="icon-cog5"></i> Account settings</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('dashboard/logout');?>">
                            <i class="icon-switch2"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>