
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/material/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/material/css/core.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/material/css/components.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/material/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/uniform.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/login.js"></script>

	<script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/ui/ripple.min.js"></script>
	<!-- /theme JS files -->

</head>

<style>
.page-container{
    background-image: url('<?php echo base_url();?>assets/img/bg16.jpg');
    background-size: cover;
    background-position: top center;
}
</style>
<body class="login-container">
	<!-- Page container -->
	<div class="page-container" style=" ">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Advanced login -->
				<?php echo form_open('mejadankursi/prosess_sign_in');?>
						<div class="panel panel-body login-form">
						<?php if (validation_errors() || $this->session->flashdata('result_login')) { ?>
						<div class="alert alert-warning alert-styled-left animated fadeInDown">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
							<span class="text-semibold">Peringatan!</span>
							<?php echo validation_errors(); ?>
							<?php echo $this->session->flashdata('result_login'); ?>
						</div>
						<?php } ?>
							<div class="text-center">
								<div class="icon-object border-indigo-600 text-indigo-600"><i class="icon-users"></i></div>
								<h5 class="content-group">LOGIN</h5>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn bg-indigo-600 btn-block">Login <i class="icon-arrow-right14 position-right"></i></button>
							</div>
						</div>
                        <?php echo form_close(); ?>
					<!-- /advanced login -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
</body>
</html>

