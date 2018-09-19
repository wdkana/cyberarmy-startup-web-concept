<script>
    function validate() {
        $("#file_error").html("");
        $(".demoInputBox").css("border-color", "#F0F0F0");
        var file_size = $('#file')[0].files[0].size;
        if (file_size > 2097152) {
            $("#file_error").html("File size is greater than 2MB");
            $(".demoInputBox").css("border-color", "#FF0000");
            return false;
        }
        return true;
    }
</script>
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
                                                                form_open_multipart('user/prosess_edit_profil',['onSubmit'=>'return validate();']);
                                                                ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" name="kd_user" value="<?php echo $this->session->userdata('kd_user');?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Username</label>
                                                            <input type="text" class="form-control" placeholder="Username" disabled value="<?php echo $value->username;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" class="form-control" placeholder="Email" disabled value="<?php echo $value->email;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>First Name</label>
                                                            <input type="text" class="form-control" placeholder="Company" name="first_name" value="<?php echo $value->first_name;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="<?php echo $value->last_name;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>No Tlp</label>
                                                            <input type="text" class="form-control" placeholder="No Tlp" name="no_tlp" value="<?php echo $value->no_tlp;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Sertifikasi</label> <!-- progress +++field lainnya, cek trello -->
                                                            <input type="text" class="form-control" placeholder="Sertifikasi" name="sertifikasi" value="<?php echo $value->sertifikasi;?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- fungsi baru rekening -->
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Nama Bank</label> <!-- progress +++field lainnya, cek trello -->
                                                            <input type="text" class="form-control" placeholder="Contoh: BCA" name="bank" value="<?php echo $value->bank;?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>No Rekening</label> <!-- progress +++field lainnya, cek trello -->
                                                            <input type="text" class="form-control" placeholder="012346" name="no_rekening" value="<?php echo $value->no_rekening;?>">
                                                        </div>
                                                    </div>

                                                </div>
                                                <!-- belum beres -->

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Biography</label>
                                                            <textarea rows="5" class="form-control" placeholder="Here can be your Biography" name="biografi"><?php echo $value->biografi;?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Pendidikan <small><i>(nama instansi)</i></small></label>
                                                            <input type="text" class="form-control" placeholder="pendidikan" name="pendidikan" value="<?php echo $value->pendidikan;?>">
                                                        </div>
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Jurusan</label>
                                                            <input type="text" class="form-control" placeholder="jurusan" name="jurusan" value="<?php echo $value->jurusan;?>">
                                                        </div>
                                                    </div>
                                                </div>

                                                  <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Ukuran Baju</label>
                                                            <input type="text" class="form-control" placeholder="T-shirt Size" name="no_baju" value="<?php echo $value->no_baju;?>">                                                        </div>
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
                                                <button type="submit" class="btn bg-indigo-400 btn-fill pull-right" id="update">Update Profile</button>
                                                <div class="clearfix"></div>
                                                <?php echo form_close();?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="thumbnail no-padding">
                                            <div class="thumb">
                                                <?php if($value->foto == null){ ?>
                                                <img src="<?php echo base_url();?>assets/img/default-avatar.png" alt="">
                                                <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url();?>assets/img/default-avatar.png" class="btn bg-indigo-400 btn-icon btn-xs" data-popup="lightbox">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <?php }else {  ?>
                                                <img src="<?php echo base_url('assets/img/'.$value->foto);?>" alt="">
                                                <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url('assets/img/'.$value->foto);?>" class="btn bg-indigo-400 btn-icon btn-xs" data-popup="lightbox">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                                <?php } ?>
                            
                                            </div>
                                            <div class="caption text-center">
                                                <h6 class="text-semibold no-margin">
                                                    <?php echo $value->first_name;?>&nbsp;
                                                    <?php echo $value->last_name;?>
                                                    <small class="display-block">
                                                        <?php echo $value->biografi;?>
                                                    </small>
                                                </h6>
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
    
