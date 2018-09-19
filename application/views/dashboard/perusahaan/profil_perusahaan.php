<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FixBug - Application</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/material/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/material/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/material/css/core.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/material/css/components.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/material/css/colors.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/dropify-master/dist/css/dropify.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url();?>assets/toash/bootoast.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet-alert/sweetalert2.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/tables/datatables/datatables.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/sweet-alert/sweetalert2.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/form_inputs.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/jquery_ui/interactions.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/selects/select2.min.js"></script>
    
    
    
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/datatables_advanced.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/user_pages_team.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/notifications/jgrowl.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/pickers/anytime.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/pickers/pickadate/picker.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/editors/summernote/summernote.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>assets/dropify-master/dist/js/dropify.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/editor_summernote.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/picker_date.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/form_select2.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/ui/ripple.min.js"></script>
    <!-- /theme JS files -->

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url();?>assets/material/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url();?>assets/material/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/material/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url();?>assets/material/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/material/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo base_url();?>assets/material/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo base_url();?>assets/material/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>

<body style="background:white;">

    <!-- Main navbar -->
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
    <!-- Page container -->
    <div class="page-container">

        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">

                <div class="content">










<div class="panel panel-flat border-left-lg border-left-indigo">
        <div class="panel-heading">
            <h5 class="panel-title">
                <?php echo strtoupper($tittle);?>
            </h5>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                <div class="row">
                        <div class="col-md-12">
                                <div class="panel-body">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title">Edit Profile</h4>
                                            </div>
                                            <div class="content">
                                                <?php foreach ($get_data['rows'] as $key => $value){?>
                                                <?php echo 
                                                                form_open_multipart('user/prosess_edit_profil_perusahaan',['onSubmit'=>'return validate();']);
                                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="kd_costumer" value="<?php echo $this->session->userdata('kd_costumer');?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" disabled class="form-control" placeholder="Username" value="<?php echo $value->username;?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="alamat">No TLP</label>
                                                            <input type="text" class="form-control" name="no_tlp" placeholder="Nomor Telepon Perusahaan" value="<?php echo $value->no_tlp;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                      <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="alamat">Alamat</label>
                                                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="<?php echo $value->alamat;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                      
                                                <button type="submit" class="btn bg-indigo-400 btn-fill pull-right" id="update">Update Profile</button>
                                                <div class="clearfix"></div>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <?php } ?>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    

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
