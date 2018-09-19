
<style>
    .bounty-section{
        margin-bottom: 2rem;
    }
    .bc-link-list{
        display: block;
        list-style-type: none;
        background: #d6e0f1;
        padding: 15px;
    }
</style>
<div class="panel panel-flat border-left-lg border-left-indigo">
    <div class="panel-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                <h1 class="text-bold">Buat program baru</h1>
                                <br>
                                <?php echo form_open_multipart('program/prosess_tambah')?>
                                <div class="row">
                                    <div class="form-group form-group-lg has-feedback">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="text-bold">Nama Organisasi</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control nama_organisasi textbox" required="required" value="<?php echo $this->session->userdata('perusahaan');?>"
                                                id="nama_organisasi" name="nama_organisasi" placeholder="Nama Organisasi">
                                            <i class="form-control-feedback"></i>
                                            <span class="text-warning"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group form-group-lg has-feedback">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="text-bold">Logo Brand</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="file" class="form-control logo textbox dropify-fr" data-min-width="100" data-max-width="1000" data-min-height="255" data-max-file-size="2M"
                                                 data-allowed-file-extensions="png" name="foto" placeholder="Logo Organisasi">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <!--
                                <div class="row">
                                    <div class="form-group form-group-lg has-feedback">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="text-bold">Backround Brand</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="color" class="form-control" name="warna">
                                        </div>
                                    </div>
                                </div>
                                -->
                                <br>
                                <div class="row">
                                    <div class="form-group form-group-lg has-feedback">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="text-bold">Nama Aplikasi</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" value="<?php echo $this->session->userdata('perusahaan');?>" class="form-control nama_organisasi textbox"
                                                required="required" id="nama_aplikasi" name="nama_aplikasi" placeholder="Nama Aplikasi atau Nama Organisasi">
                                            <i class="form-control-feedback"></i>
                                            <span class="text-warning"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="form-group form-group-lg has-feedback">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                            <label class="text-bold">Deskripsi Singkat</label>
                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control textbox deskripsi_singkat" required="required" id="deskripsi_singkat" name="deskripsi_singkat"
                                                placeholder="Deskripsi Singkat Aplikasi">
                                            <i class="form-control-feedback"></i>
                                            <span class="text-warning"></span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                            <label class="text-bold">Target</label>
                                    </div>
                                     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <input type="text" class="form-control textbox target" required="required" id="informasi_target" name="informasi_target"
                                                placeholder="informasi target">
                                            <i class="form-control-feedback"></i>
                                            <span class="text-warning"></span>
                                        </div>

                                        <br/>
                                        <br/>

                                    <br>
                                    <div class="row">
                                        <div class="form-group form-group-lg has-feedback">

                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                <label class="text-bold">Deskripsi</label>
                                            </div>

                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <textarea class="form-control summernote" placeholder="deskripsi" name="deskripsi">
                                            <p>
                                                <font color="#424242">
    Gunakan ruang ini untuk membicarakan tentang program dan target - cobalah untuk membingkai konteks dari apa yang akan diuji oleh peneliti. Bayangkan Anda adalah penguji, melihat halaman ini (dan target Anda) untuk pertama kalinya - informasi apa yang ingin / perlu Anda lihat? (misalnya "Untuk program ini, kami mengundang para peneliti untuk menguji aplikasi front-end store dan back-end management kami. Aplikasi ini dibangun di atas teknologi XYZ dan digunakan oleh pengguna untuk melakukan ABC. Tujuan kami dengan program ini adalah memastikan bahwa pelanggan dan karyawan kami menggunakan platform aman yang bebas dari kerentanan keamanan. ")
                                            </p>
    <br>
    ------
    <br>
    <b>Hadiah</b>
    <br>
    ```<br>
    P1: 500 - 1000 Point<br>
    P2: 350 - 450 Point<br>
    P3: 100 - 300 Point<br>
    P4: 15 - 80 Point<br>
    P5: 1 - 10 Point <br>
    ```</font>
    </textarea>
                                                <i class="form-control-feedback"></i>
                                                <span class="text-warning"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group form-group-lg has-feedback">
                                            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                                                <label class="text-bold">Reward</label>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                                <textarea class="form-control summernote" placeholder="reward yang diberikan" name="reward">
                                                    Reward Yang Akang diberikan:
                                                    <ul>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                </textarea>
                                                <i class="form-control-feedback"></i>
                                                <span class="text-warning"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

                                        </div>
                                        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <button type="submit" class="btn bg-indigo-600">Jalankan Aplikasi</button>
                                        </div>
                                    </div>
                                    <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Seret dan lepaskan file di sini atau klik',
                    replace: 'Seret dan lepaskan file atau klik untuk mengganti',
                    remove: 'Hapus',
                    error: 'Maaf, file terlalu besar'
                }
            });
            $(".deskripsi_singkat").keyup(function () {
                var maxChars = 75;
                if ($(this).val().length > maxChars) {
                    $(this).val($(this).val().substr(0, maxChars));
                }
            });
            $(".add_cart").click(function() {
                var baris_baru = $();
                var jumlah =  $("ul li").length;
                for(x = 0; x < jumlah; x++) {
                 baris_baru = '<li><div class="row"><div class="col-md-6"><input type="text" class="form-control textbox target" required="required" name="target[]" placeholder="Target"></div><div class="col-md-5"><div class="form-group"><select class="select form-control" name="platform[]"><optgroup label="Platfrom"><option value="Android">Android</option><option value="IOS">IOS</option><option value="API">API</option></optgroup></select></div></div><div class="col-md-1"><button type="button" class="btn btn btn-danger btn-icon btn-rounded hapus_cart" data-dt="'+x+'"><i class="icon-trash"></i></button></div></div></li>';
                }
                $("#targets").append(baris_baru);
            });
        });
    </script>