<!-- navbar -->
<div class="navbar navbar-default navbar-xs" style="position: relative; z-index: 26;">
    <ul class="nav navbar-nav no-border visible-xs-block">
        <li>
            <a class="text-center collapsed legitRipple" data-toggle="collapse" data-target="#navbar-demo5">
                <i class="icon-circle-down2"></i>
            </a>
        </li>
    </ul>
    <div class="navbar-collapse collapse" id="navbar-demo5">
        <ul class="nav navbar-nav">
            <li class="<?php if($this->uri->segment(1)=="dashboard"){echo 'active';}else{ echo '';}?>">
                <a href="<?php echo site_url('dashboard');?>">
                    <i class="icon-home2 position-left"></i> Dashboard</a>
            </li>
            <li class="<?php if($this->uri->segment(1)=="program"){echo 'active';}else{ echo '';}?>">
                <a href="<?php echo site_url('program');?>">
                    <i class="icon-folder-search position-left"></i> Programs
                </a>
            </li>

            <li class="<?php if($this->uri->segment(2)=="leader"){echo 'active';}else{ echo '';}?>">
                <a href="<?php echo site_url('user/leader');?>">
                    <i class="icon-align-bottom position-left"></i> LeaderBoards
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- navbar -->