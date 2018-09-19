<div class="navbar navbar-inverse navbar-fixed-top bg-indigo">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo site_url('mejadankursi');?>">
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

		<ul class="nav navbar-nav">
			<li>
				<a class="sidebar-control sidebar-main-toggle hidden-xs">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
			<li class="dropdown">
				<!--
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="icon-bell2"></i>
					<?php if ($belum_baca['total']== 0 && $belum_baca_u['total']== 0){}else{?>
					<span class="visible-xs-inline-block position-right">Notifikasi</span>
					<span class="badge badge-warning pull-right">
						<?php echo $belum_baca['total'] + $belum_baca_u['total'];?> 
					</span>
					<?php } ?>
				</a>
				-->
				<div class="dropdown-menu dropdown-content">
					<div class="dropdown-content-heading">
						Notifikasi
						<ul class="icons-list">
							<li>
								<a href="#">
									<i class="icon-sync"></i>
								</a>
							</li>
						</ul>
					</div>
					<ul class="media-list dropdown-content-body width-350">
						<form action="">
						<?php if ($belum_baca['total']==0 && $belum_baca_u['total']==0){echo 'Tidak Ada Notifikasi';}else{?>
							<?php foreach ($belum_baca['rows'] as $key => $value) { ?>
							<li class="media">
								<div class="media-left">
									<a href="<?php echo site_url('');?>/mejadankursi/detail/<?php echo $value->kd_program;?>" id="baca" data-kd="<?php echo $value->kd_program;?>" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm">
										<i class="icon-paperplane"></i>
									</a>
								</div>
								<div class="media-body">
									<?php echo $value->nama_aplikasi?>&nbsp;&nbsp;
									<?php echo $value->nama_organisasi;?>
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>
							<?php } ?>
							<?php foreach ($belum_baca_u['rows'] as $key => $value) { ?>
							<li class="media">
								<div class="media-left">
									<a href="<?php echo site_url('');?>/mejadankursi/detail_user/<?php echo $value->kd_user;?>" id="baca_u" data-kd="<?php echo $value->kd_user;?>" class="btn border-success text-success btn-flat btn-rounded btn-icon btn-sm">
										<i class="icon-mention"></i>
									</a>
								</div>
								<div class="media-body">
									New Account <span class="text-bold"><?php echo $value->username?></span>
									Email <span class="text-bold"><?php echo $value->email;?></span>
									<div class="media-annotation">4 minutes ago</div>
								</div>
							</li>
							<?php } ?>
						</form>
							<?php } ?>
					</ul>

					<div class="dropdown-content-footer">
						<a href="#" data-popup="tooltip" title="All activity">
							<i class="icon-menu display-block"></i>
						</a>
					</div>
				</div>
			</li>
		</ul>

		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown dropdown-user">
				<a class="dropdown-toggle" data-toggle="dropdown">
					<img src="<?php echo base_url();?>assets/img/default-avatar.png" alt="">
					<span>
						<?php echo $this->session->userdata('username');?>
					</span>
					<i class="caret"></i>
				</a>

				<ul class="dropdown-menu dropdown-menu-right">
					<li>
						<a href="#">
							<i class="icon-user-plus"></i> My profile</a>
					</li>
					<li class="divider"></li>
					<li>
						<a href="#">
							<i class="icon-cog5"></i> Account settings</a>
					</li>
					<li>
						<a href="<?php echo site_url('mejadankursi/logout');?>">
							<i class="icon-switch2"></i> Logout</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</div>

<script>
	$("#baca").click(function () {
		var kd_program = $(this).attr("data-kd");
		$.ajax({
			url: "<?php echo site_url('mejadankursi/baca_belum');?>",
			type: "POST",
			data: "kd_program=" + kd_program,
			dataType: "text",
			success: function (data) {

			}
		});
	});
	$("#baca_u").click(function () {
		var kd_user = $(this).attr("data-kd");
		$.ajax({
			url: "<?php echo site_url('mejadankursi/baca_belum_u');?>",
			type: "POST",
			data: "kd_user=" + kd_user,
			dataType: "text",
			success: function (data) {
			}
		});
	});
</script>