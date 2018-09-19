<div class="panel panel-flat border-left-lg border-left-danger">
    <div class="panel-heading">
        <h5 class="panel-title">
            <?php echo strtoupper($tittle);?>
        </h5>
    </div>
    <script>
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
            $('#tinggi').blur(function () {
                var tinggi = $(this).val();
                var len = tinggi.length;
                if (len > 3) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Maximal 3 karakter");
                    return apply_feedback_error(this);
                }
            });
            $('#nik').blur(function () {
                var nik = $(this).val();
                var len = nik.length;
                if (len > 0 && len < 16) {
                    $(this).parent().find('.text-warning').text("");
                    $(this).parent().find('.text-warning').text("Minimal 16 karakter");
                    return apply_feedback_error(this);
                } else {
                    if (len > 0) { //jika ada isinya
                        if (!valid_nik(nik)) { //jika username tidak valid
                            $(this).parent().find('.text-warning').text("");
                            $(this).parent().find('.text-warning').text("No Sim Tidak Valid");
                            return apply_feedback_error(this);
                        } else {
                            if (len > 16) { //jika karakter >30
                                $(this).parent().find('.text-warning').text("");
                                $(this).parent().find('.text-warning').text("Maximal Karakter 16");
                                return apply_feedback_error(this);
                            }
                            else {
                                var valid = false;
                                $.ajax({
                                    url: "<?php echo site_url('verifikasi/ceknik');?>",
                                    type: "POST",
                                    data: "nik=" + nik,
                                    dataType: "text",
                                    success: function (data) {
                                        if (data == 0) { //pada file check email.php, apabila email sudah ada di database makan akan mengembalikan nilai 0
                                            $('#nik').parent().find('.text-warning').text("");
                                            $('#nik').parent().find('.text-warning').text("No SIM sudah ada");
                                            return apply_feedback_error('#nik');
                                        }
                                    }
                                });
                            }
                        }
                    }
                }
            });
            $('#tempat').blur(function () {
                var tempat = $(this).val();
                var len = tempat.length;
                    if (!valid_tempat(tempat)) {
                        $(this).parent().find('.text-warning').text("");
                        $(this).parent().find('.text-warning').text("Karakter tidak valid");
                        return apply_feedback_error(this);
                    }
            });
            $('#formInput').submit(function (e) {
                e.preventDefault();
                var valid = true;
                $(this).find('.textbox').each(function () {
                    if (!$(this).val()) {
                        get_error_text(this);
                        valid = false;
                        $('html,body').animate({ scrollTop: 100 }, "slow");
                    }
                    if ($(this).hasClass('no-valid')) {
                        valid = false;
                        $('html,body').animate({ scrollTop: 100 }, "slow");
                    }
                });
                if (valid) {
                    swal({
                        title: "Konfirmasi Simpan Data",
                        text: "Data KTP akan di Simpan Ke Database, Apakah data Sudah Benar?",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonColor: "#1da1f2",
                        confirmButtonText: "Iya,Data Sudah Benar",
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    }, function () { //apabila sweet alert d confirm maka akan mengirim data ke simpan.php melalui proses ajax
                        $.ajax({
                            url: "<?php echo site_url('verifikasi/prosess_ktp');?>",
                            type: "POST",
                            data: $('#formInput').serialize(), //serialize() untuk mengambil semua data di dalam form
                            dataType: "html",
                            success: function () {
                                setTimeout(function () {
                                    swal({
                                        title: "Data Berhasil Disimpan",
                                        type: "success"
                                    }, function () {
                                        window.location.reload();
                                    });
                                }, 1000);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                setTimeout(function () {
                                    swal("Error", "Data Registrasi Gagal Disimpan", "error");
                                }, 1000);
                            }
                        });
                    });
                }
            });
        });
        function valid_nik(nik) {
            var pola = new RegExp(/^[0-9-+]+$/);
            return pola.test(nik);
        }
        function valid_tempat(tempat) {
            var pola = new RegExp(/^[a-z A-Z]+$/);
            return pola.test(tempat);
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
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <?php if(($get_data['total']) > 0): ?>
                                    <div class="row">
                                        <div class="alert alert-info alert-styled-right alert-arrow-right alert-bordered">
                                            <span class="text-semibold">Data Sudah Terkirim</span> Mohon Tunggu Verifikasi Dari Admin untuk mengaktifkan Akun
                                        </div>
                                    </div>
                                    <?php else  :?>
                                    <?php echo form_open_multipart('verifikasi/prosess_ktp',['id'=>'formInput']);?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="kd_user" value="<?php echo $this->session->userdata('kd_user');?>">
                                            </div>
                                        </div>
                                    </di`v>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-group-lg has-feedback">
                                                <label>NIK</label>
                                                <input type="number" class="form-control nik textbox" required="required" id="nik" name="nik" placeholder="NIK">
                                                <i class="form-control-feedback"></i>
                                                <span class="text-warning"></span>
                                            </div>
                                        </div>
                                  
                                    </div>
                                  
                                         <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="file" name="foto" id="file" class="file-styled demoInputBox">
                                                            <br>
                                                            <span id="file_error"></span>
                                                        </div>
                                                    </div>
                                                </div>
                                    <span class="text-danger">
                                        <i class="icon-info22"></i>&nbsp;Peringatan: Di Usahakan Data Ktp Sesuai dengan Ktp Asli , agar akun terverifikasi
                                        </span>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Verifikasi Ktp</button>
                                    <div class="clearfix"></div>
                                    <?php echo form_close();?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".nik").keyup(function () {
        var maxChars = 16;
        if ($(this).val().length > maxChars) {
            $(this).val($(this).val().substr(0, maxChars));
        }
    });
</script>