<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">
					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo base_url();?>assets/img/default-avatar.png" class="img-circle img-sm" alt=""></a>
								<div class="media-body">
									<span class="media-heading text-semibold"><?php echo strtoupper($this->session->userdata('username'));?></span>
									<div class="text-size-mini text-muted">
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">
								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php if($this->uri->segment(2)==''){ echo 'active';}?>"><a href="<?php echo site_url('mejadankursi');?>"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href=""><i class="icon-list-unordered"></i><span>Program</span></a>
									<ul>
										<li class="<?php if($this->uri->segment(2)=='daftar_submit'){echo 'active';}?>"><a href="<?php echo site_url('mejadankursi/daftar_submit');?>">Program Report Submit</a></li>
									</ul>
								</li>
								<li class="<?php if($this->uri->segment(2)=='data_user'){echo 'active';}else if($this->uri->segment(2)=='detail_user'){echo 'active';}?>"><a href="<?php echo site_url('mejadankursi/data_user');?>"><i class="icon-user"></i> <span>Akun User</span></a></li>
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>