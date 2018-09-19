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
    <link href="<?php echo base_url();?>assets/css/password.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url();?>assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/sweet-alert/sweetalert2.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/sweet-alert/sweetalert2.css">
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/js/password.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/core/app.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/material/js/pages/login.js"></script>
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
    <script type="text/javascript">
        $(document).ready(function () {
            //semua element dengan class text-warning akan di sembunyikan saat load
            $('.text-warning').hide();
            //untuk mengecek bahwa semua textbox tidak boleh kosong
            $('input').each(function () {
                $(this).blur(function () { //blur function itu dijalankan saat element kehilangan fokus
                    if (!$(this).val()) { //this mengacu pada text box yang sedang fokus
                        return get_error_text(this); //function get_error_text ada di bawah
                    } else {
                        $(this).removeClass('no-valid');
                        $(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
                        $(this).closest('div').removeClass('has-warning');
                        $(this).closest('div').addClass('has-success');
                        $(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
                        $(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
                    }
                });
            });
            //mengecek textbox username Valid Atau Tidak
            $('#username').blur(function () {
                var username = $(this).val();
                var len = username.length;
                if (len > 0) { //jika ada isinya
                    if (!valid_username(username)) { //jika username tidak valid
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("username Tidak Valid");
                        return apply_feedback_error(this);
                    } else {
                        if (len > 30) { //jika karakter >30
                            $(this).parent().find('.text-warning').text("");
                            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
                            return apply_feedback_error(this);
                        }
                        else {
                            var valid = false;
                            $.ajax({
                                url: "<?php echo site_url('user/cekusername');?>",
                                type: "POST",
                                data: "username=" + username,
                                dataType: "text",
                                success: function (data) {
                                    if (data == 0) { //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                        $('#username').parent().find('.text-warning').text("");
                                        $('#username').parent().find('.text-warning').text("username sudah digunakan");
                                        return apply_feedback_error('#username');
                                    }
                                }
                            });
                        }
                    }
                }
            });
            //mengecek text box email
            $('#email').blur(function () {
                var email = $(this).val();
                var len = email.length;
                if (len > 0) {
                    if (!valid_email(email)) {
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("E-mail Tidak Valid (ex: aaaa@yahoo.co.id)");
                        return apply_feedback_error(this);
                    } else {
                        if (len > 30) {
                            $(this).parent().find('.text-warning').text("");
                            $(this).parent().find('.text-warning').text("Maximal Karakter 30");
                            return apply_feedback_error(this);
                        } else {
                            var valid = false;
                            $.ajax({
                                url: "<?php echo site_url('user/cekmail');?>",
                                type: "POST",
                                data: "email=" + email,
                                dataType: "text",
                                success: function (data) {
                                    if (data == 0) { //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                        $('#email').parent().find('.text-warning').text("");
                                        $('#email').parent().find('.text-warning').text("email sudah digunakan");
                                        return apply_feedback_error('#email');
                                    }
                                }
                            });
                        }
                    }
                }
            });
            //mengecek password
            $('#password').blur(function () {
                var password = $(this).val();
                var len = password.length;
                if (len > 0 && len < 8) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("password minimal 8 karakter");
                    return apply_feedback_error(this);
                } else {
                    if (len > 35) {
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("password maximal 35 karakter");
                        return apply_feedback_error(this);
                    }
                }
            });
            //mengecek konfirmasi password
            $('#conf_password').blur(function () {
                var pass = $("#password").val();
                var conf = $(this).val();
                var len = conf.length;
                if (len > 0 && pass !== conf) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Konfirmasi Password tidak sama dengan password");
                    return apply_feedback_error(this);
                }
            });
            //mengecek konfirmasi captcha
            $('#captcha').blur(function () {
                var captcha2 = $("#captcha2").val();
                var captcha = $(this).val();
                var len = captcha.length;
                if (len > 0 && captcha2 !== captcha) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Captcha Tidak Valid");
                    return apply_feedback_error(this);
                }
            });
            $('#submit').attr('disabled', true);
                $('#password').password({showPercent: true,minimumLength:8}).on('password.score', function (e, score) {
                if (score >= 68) {
                    $(this).removeClass('no-valid');
                    $(this).parent().find('.text-warning').hide();//cari element dengan class has-warning dari element induk text yang sedang focus
                    $(this).closest('div').removeClass('has-warning');
                    $(this).closest('div').addClass('has-success');
                    $(this).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-warning-sign');
                    $(this).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-ok');
                    $('#submit').removeAttr('disabled');
                } else if(score < 68) {
                    $('#submit').attr('disabled', true);
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("please make the password Strong");
                    return apply_feedback_error(this);
                }
            });
            //submit form validasi
            $('#formInput').submit(function (e) {
                e.preventDefault();
                var valid = true;
                $(this).find('.textbox').each(function () {
                    if (!$(this).val()) {
                        get_error_text(this);
                        valid = false;
                        $('html,body').animate({ scrollTop: 0 }, "slow");
                    }
                    if ($(this).hasClass('no-valid')) {
                        valid = false;
                        $('html,body').animate({ scrollTop: 0 }, "slow");
                    }
                });
                if (valid) {
                    swal({
                        title: "Konfirmasi Simpan Data",
                        text: "Data Akan di Simpan Ke Database",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#1da1f2",
                        confirmButtonText: "Iya Saya Yakin",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
                        $.ajax({
                            url: "<?php echo site_url('user/prosess_sign_up');?>",
                            type: "POST",
                            data: $('#formInput').serialize(), //serialize() untuk mengambil semua data di dalam form
                            dataType: "html",
                            success: function () {
                                setTimeout(function () {
                                    swal({
                                        title: "Data Berhasil Disimpan",
                                        type: "success"
                                    }, function () {
                                        window.location = "<?php echo site_url('user/verifikasi');?>";
                                    });
                                },0);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                setTimeout(function () {
                                    swal("Error", "Data Registrasi Gagal Disimpan", "error");
                                }, 0);
                            }
                        });
                    });
                }
            });
        });

        //fungsi cek username
        function valid_username(username) {
            var pola = new RegExp(/^[a-z A-Z]+$/);
            return pola.test(username);
        }
        //fungsi cek email
        function valid_email(email) {
            var pola = new RegExp(/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]+$/);
            return pola.test(email);
        }
        //menerapkan gaya validasi form bootstrap saat terjadi eror
        function apply_feedback_error(textbox) {
            $(textbox).addClass('no-valid'); //menambah class no valid
            $(textbox).parent().find('.text-warning').show();
            $(textbox).closest('div').removeClass('has-success');
            $(textbox).closest('div').addClass('has-warning');
            $(textbox).parent().find('.form-control-feedback').removeClass('glyphicon glyphicon-ok');
            $(textbox).parent().find('.form-control-feedback').addClass('glyphicon glyphicon-warning-sign');
        }

        //untuk mendapat eror teks saat textbox kosong, digunakan saat submit form dan blur fungsi
        function get_error_text(textbox) {
            $(textbox).parent().find('.text-warning').text("");
            $(textbox).parent().find('.text-warning').text("Text Box Ini Tidak Boleh Kosong");
            return apply_feedback_error(textbox);
        }
    </script>
    <style>
    .page-container{
        background-image: url('<?php echo base_url();?>assets/img/bg12.jpg');
        background-size: cover;
        background-position: top center;
    }
    </style>
</head>
<body class="login-container">
    <!-- Page container -->
    <div class="page-container">
        <!-- Page content -->
        <div class="page-content">
            <!-- Main content -->
            <div class="content-wrapper">
                <!-- Content area -->
                <div class="content">
                    <!-- Advanced login -->
                    <form role="form" id="formInput">
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-indigo text-indigo">
                                    <i class="icon-plus3"></i>
                                </div>
                                <h5 class="content-group">Create account
                                    <small class="display-block">All fields are required</small>
                                </h5>
                            </div>
                            <div class="form-group form-group-lg has-feedback">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control textbox">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
                            </div>
                            <div class="form-group form-group-lg has-feedback">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" class="form-control textbox">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
                            </div>
                            <div class="form-group form-group-lg has-feedback">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control textbox">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
                            </div>
                            <div class="form-group form-group-lg has-feedback">
                                <label for="password">Konfirmasi Password</label>
                                <input type="password" name="conf_password" id="conf_password" class="form-control textbox">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
                            </div>
                            <div class="form-group">
								<div class="row">
									<div class="col-md-9 image">
									<?php echo $image;?>
									</div>
									<div class="col-md-3">
										<a class="refresh" href="javascript:;"><i class="icon icon-sync"></i></a>
									</div>
								</div>
							</div>
							<input type="hidden" class="form-control" id="captcha2" value="<?php echo $word;?>" placeholder="Captcha">
							<div class="form-group form-group-lg has-feedback">
								<input type="text" class="form-control textbox" id="captcha" placeholder="Captcha">
                                <i class="form-control-feedback"></i>
                                <span class="text-warning"></span>
							</div>
                            <div class="form-group">
                                <button type="submit" name="btn-simpan" id="submit" class="btn bg-indigo-600 btn-block">Register</button>
                            </div>
                            <div class="content-divider text-muted form-group"><span>You already have an account?</span></div>
							<a href="<?php echo site_url('user/sign_in');?>" class="btn bg-indigo-300 btn-block content-group">Sign In</a>
							<span class="help-block text-center no-margin">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
                        </div>
                    </form>
                    <!-- /advanced login -->
                    <!-- Footer -->
                    <div class="footer text-muted text-center">
                        <ol class="breadcrumb">
                                <li>
                                    <a href="<?php echo site_url('');?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo site_url('user/sign_in');?>">Login Researcher</a>
                                </li>
                                <li class="active">Daftar Researcher</li>
						</ol>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->
<script>
 $(function(){
        $('.refresh').click(function(){
            $.ajax({
                type: 'POST',
                url: '<?php echo site_url('user/refresh_captcha')?>',
                success: function(res){
                    if(res){
                        var gambar = res.split('^','1');
                        var word = res.split('^','2')['1'];
                        $('.image').html(gambar);
                        $("#captcha2").val(word);
                    }
                }
            })
        });
    });
</script>
</body>

</html>