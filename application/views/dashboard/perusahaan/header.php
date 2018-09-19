<div class="navbar navbar-inverse bg-indigo-800">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo site_url('dashboard/costumer');?>"><img src="<?php echo base_url();?>assets/material/images/logo.png" alt=""></a>
		<ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
		</div>
		<div class="navbar-collapse collapse" id="navbar-mobile">
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="btn bg-indigo-600 dropdown-toggle btn-icon" data-toggle="dropdown">
                            Pilih Program
                            </button>
                            <ul class="dropdown-menu">
                            <?php if($get_data['total']==0){echo '<li><a> Tidak Ada Program </a></li>';}else{?>
                                <?php foreach ($get_data['rows'] as $key => $value) { ?>
                                <li><a href="<?php echo site_url('program/detail_program').'/'.$value->kd_program;?>"><?php echo $value->nama_aplikasi?><?php if($value->status == 'tolak'){echo '<i class="icon icon-hand text-danger pull-right"></i>';}?></a></li>
                                <?php }?>
                            <?php } ?>
                            </ul>
                        </div>
                        <div class="input-group-btn">
                            <a href="<?php echo site_url('dashboard/leader');?>" class="btn bg-indigo-600 btn-icon">
                            Leaderboard
                            </a>
                        </div>
                    </div>
                </div>
            </form>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url();?>assets/img/default-avatar.png" alt="">
                        <i class="caret"></i>
					</a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user"></i> <?php echo $this->session->userdata('username');?></a></li>
                        <li><a href="<?php echo site_url('dashboard/profile');?>"><i class="icon-cog5"></i> Account settings</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="icon-office"></i> <?php echo $this->session->userdata('perusahaan');?></a></li>
                        <li><a href="#"><i class="icon-users4"></i> Team</a></li>
                        <li><a href="<?php echo site_url('dashboard/logout_cos');?>"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
    </div>
</div>