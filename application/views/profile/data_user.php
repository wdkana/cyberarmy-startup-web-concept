<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Data User
            <a class="heading-elements-toggle">
                <i class="icon-more"></i>
            </a>
        </h5>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table datatable-show-all">
                <thead>
                    <tr class="bg-teal-400">
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>email</th>
                        <th>score</th>
                        <th class="text-center">Status Aktif</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no= 1; foreach ($get_data['rows'] as $key => $value) {?>
                    <tr>
                        <td>
                            <?php echo $no++; ?>
                        </td>
                        <td>
                            <?php echo $value->first_name;?> &nbsp;  <?php echo $value->last_name;?>
                        </td>
                        <td>
                            <?php echo $value->username;?>
                        </td>
                        <td>
                            <?php echo $value->email;?>
                        </td>
                        <td>
                            <?php echo $value->score;?>
                        </td>
                        <td class="text-center">
                            <span class="<?php if($value->status == 'aktif'){echo "label bg-teal-400";}else{echo "label bg-danger-400";}?>">
                                <?php echo $value->status;?>
                            </span>
                        </td>
                        <td class="text-center" width="20%">
                            <a href="<?php echo site_url('mejadankursi/detail_user').'/'.$value->kd_user;?>" class="btn bg-indigo-400 btn-icon btn-rounded legitRipple"
                                title="Detail Program">
                                <i class="icon icon-eye" aria-hidden="true"></i>
                                </i>
                            </a>
                            <a class="<?php if($value->status == 'aktif'){echo "btn bg-danger-400 btn-icon btn-rounded legitRipple ubah";}else{echo "btn bg-teal-400 btn-icon btn-rounded legitRipple ubah";}?>" data-kd="<?php echo $value->kd_user;?>" title="Ubah Status" data-ac="<?php if($value->status == 'aktif'){echo "tidak";}else{echo "aktif";}?>">
                                <i class="icon <?php if($value->status == 'aktif'){echo "icon-cross2";}else{echo "icon-checkmark3";}?>" aria-hidden="true"></i>
                            </a>
                            <a class="btn bg-danger-600 btn-icon btn-rounded legitRipple hapus" data-kd="<?php echo $value->kd_user;?>" title="Hapus User">
                                <i class="icon icon-trash-alt" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("a.ubah").click(function (e) {
            var kd_user = $(this).attr("data-kd");
            var status = $(this).attr("data-ac");
            swal({
                title: 'Konfirmasi',
                text: "Yakin Akan Mengubah Status Active ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }, function () {
                $.post("<?php echo site_url('mejadankursi/prosess_edit_status_user');?>", {kd_user: kd_user, status: status}, function (data, response) {
                    if (response == "success") {
                        // swal("Status Terubah!", "", "success");
                    } else {
                        // swal("Status Gagal Diubah!", "", "warning");
                    }
                });
                window.location.reload();
            });

        });
    });
    $(document).ready(function () {
        $("a.hapus").click(function (e) {
            var kd_user = $(this).attr("data-kd");
            swal({
                title: 'Konfirmasi',
                text: "Yakin Akan Mengubah Status Active ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }, function () {
                $.post("<?php echo site_url('mejadankursi/hapus_user');?>", {kd_user: kd_user}, function (data, response) {
                    if (response == "success") {
                        swal("Data Terhapus!", "", "success");
                    } else {
                        swal("Data Terhapus!", "", "error");
                    }
                });
                window.location.reload();
            });

        });
    });
</script>